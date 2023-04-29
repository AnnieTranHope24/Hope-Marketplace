
<!DOCTYPE php>

<php lang="en">

  <head>
    <?php
    /* Bereket Bessie - Both session.php and config.php files are requried as they contain information to connect 
					to the database and provide user authentication. */
    session_start();
    require 'session.php';
    require_once('config.php');
    include 'categories.php';
    include './partials/head.php';
    ?>
    <title>Hope Marketplace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

  </head>

  <body>

    <header>
      <?php include './partials/header.php' ?>
    </header>

    <div class="maincontainer">
      <div class="maincontent">
        <main>
          <?php

          try {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
          }
            /* Bereket Bessie - If the search parameter is set, then it is sanitized and items in a database that match the query are searched using a LIKE operator. 
                                It then displays the results on the page along with their corresponding images, prices, and an "Add Item" button that allows users to add items to their cart. 
                                If there are no search results, it displays a "No Results" message.*/
          if (isset($_POST['search'])) {
            $name = $_POST['search'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Name LIKE CONCAT('%', :name, '%')");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="wrapper2">';
            if (!empty($items)) {
            foreach ($items as $item) {
              echo '<div class="item" onclick="fill(\'' . $item['Name'] . $item['Price'] . $item['Image'] . '\')">' . '<a href="#">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
              echo '<p class="itemname">' . $item['Name'] . '</p>';
              echo '<p class="itemprice">$' . $item['Price'] . '</p>';
              echo '<a href="index.php?add_to_cart="' . $item['ID'] . ' class="add">Add Item</a>';
              echo '</div>';
            }}else {
              echo '<h1>No Results</h1>';
            }
            echo '</div>';
          }
          /*Bereket Bessie - If a user clicks on a subcategory link, all items from the database that have the selected subcategory are retrieved and displays them on the page along with their corresponding images, names, and prices.
                             and an "Add Item" button that allows users to add the item to their cart. */
           elseif (isset($_GET['subcategory'])) {
            $name = $_GET['subcategory'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Subcategory = ?");
            $stmt->bindParam(1, $name, PDO::PARAM_STR);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($items)) {
              echo '<h1>' . $_GET['subcategory'] . '</h1>';
              echo '<div class="wrapper2">';
              foreach($items as $item){
              echo '<div class="item">';
              echo '<a href="#">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
              echo '<p class="itemname">' . $item['Name'] . '</p>';
              echo '<p class="itemprice">$' . $item['Price'] . '</p>';
              echo '<a href="index.php?subcategory='.$_GET['subcategory'] . '&add_to_cart='. $item['ID'] . '" class="add">Add Item</a>';
              echo '</div>';
              cart();
            }
           }else {
              echo '<h1>No Results</h1>';
            }
            echo '</div>';
          } 
          /* Bereket Bessie - If the category parameter is set, then it retrieves the subcategories of items from a database using prepared statements. 
                              It then displays the retrieved items on the page along with their corresponding images, prices, and an "Add Item" button that allows users to add items to their cart. 
                              The subcategories and items are obtained by iterating through the categories array that is included "categories".*/
          elseif (isset($_GET['category'])) {
            foreach ($categories as $category) {
              if ($category['category'] == $_GET['category']) {
                foreach ($category['subcategories'] as $sub) {
                  foreach ($sub as $subcategory) {
                    $stmt = $pdo->prepare("SELECT * FROM items Where Subcategory= ?");
                    $stmt->bindParam(1, $subcategory, PDO::PARAM_STR);
                    $stmt->execute();
                    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($items)) {
                      echo '<a class="not-white" href="?subcategory=';
                      echo $subcategory;
                      echo '"><h1>' . $subcategory . '</h1></a>';
                      echo '<div class="wrapper">';
                      foreach($items as $item){
                      echo '<div class="item">';
                      echo '<a href="#">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
                      echo '<p class="itemname">' . $item['Name'] . '</p>';
                      echo '<p class="itemprice">$' . $item['Price'] . '</p>';
                      echo '<a href="index.php?category='.$_GET['category'] . '&add_to_cart='. $item['ID'] . '" class="add">Add Item</a>';
                      echo '</div>';
                      cart();
                    }
                  }
                    echo '</div>';            
                  }
                }
              }
            }
          }
          /*Bereket Bessie - If the "item" parameter is set, then sanitizes and uses it to search for items in the database that match the name. 
                             If any matching items are found, it displays their image, name, price, and quantity selector along with "Add to Cart" and "Add to Wishlist" buttons. 
                             It also displays a section for ratings and reviews, which shows a default message if there are no reviews available for the item.
                             If no matching items are found, it displays a "No Results" message.*/
           elseif (isset($_GET['item'])) {
            $name = $_GET['item'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Name = ?");
            $stmt->bindParam(1, $name, PDO::PARAM_STR);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($items)) {
              echo '<div class="itemclass">';
              foreach ($items as $item) {
                echo '<div class="item-pic">';
                echo '<img src="UPLOADS/' . $item['Image'] . '"> </div>';
                echo '<div class="description">';
                echo '<h1>' . $item["Name"] . '</h1>';
                echo '<h2>$' . $item['Price'] . '.00</h2>
                      <div class="review-row">
                      <img src="images/icons/446618-200.png" width="100px" />
                      <p>No reviews yet</p>
                      </div>
                      <div id="text">Quantity</div>
                      <select class="quality-sel" name="quantity">
                      <option value="1">1</option>
                      <option value="1">2</option>
                      <option value="1">3</option>
                      <option value="1">4</option>
                      <option value="1">5</option>
                      </select>
                      <button class="add-button">Add to Cart</button>
                      <button class="add-button">Add to Wishlist</button>
                      <div class="rating">
                      <h1>Ratings and Reviews</h1>
                      <hr>
                      <p>No Reviews Available</p>
                      </div>
                      </div>
                      </div>';
              }
            } else {
              echo '<h1>No Results</h1>';
            }
          } else {
            /* Annie Tran - Main display items */
            /* Annie Tran - Carousel using Tiny Slider */
            include 'carousel.html';
          }

          ?>

        </main>
      </div>
      <div class="mainfooter">
        <footer>
          <?php include './partials/footer.php' ?>
        </footer>
      </div>
    </div>
    <script src="js/hamburger.js"></script>
    <script src="js/index.js"></script>
  </body>
</php>