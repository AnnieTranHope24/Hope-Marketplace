<!DOCTYPE php>
<php lang="en">

  <head>
            <?php 
            session_start();
            require 'session.php';
            include './partials/head.php'; 
            ?>
    <title>Hope Marketplace</title>
  </head>

  <body>

    <header>
      <?php include './partials/header.php' ?>
    </header>

    <!-- Annie Tran - Main display items -->
    <div class="maincontainer">
      <div class="maincontent">
        <main>
          <!-- Annie Tran - Carousel using Tiny Slider  -->
          <?php
          require_once('config.php');

          include 'categories.php';
          
          try {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
          }
          if (isset($_POST['search'])) {
            $name = $_POST['search'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Name LIKE CONCAT('%', :name, '%') OR Subcategory LIKE CONCAT('%', :name, '%')");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<div class="wrapper2">';
            if (!empty($items)) {
            foreach ($items as $item) {
              $query = http_build_query(['item' => $item['Name']]);
              echo '<div class="item" onclick="fill(\'' . $item['Name'] . $item['Price'] . $item['Image'] . '\')">' . '<a href="index.php?'.$query.'">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
              echo '<p class="itemname">' . $item['Name'] . '</p>';
              echo '<p class="itemprice">$' . $item['Price'] . '</p>';
              echo '<button class="add">Add Item</button>';
              echo '</div>';
            }}else {
              echo '<h1>No Results</h1>';
            }
            echo '</div>';
          } elseif (isset($_GET['subcategory'])) {
            $name = $_GET['subcategory'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Subcategory = ?");
            $stmt->bindParam(1,$name, PDO::PARAM_STR);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($items)) {
              echo '<h1 class="title">' . $_GET['subcategory'] . '</h1>';
              echo '<div class="wrapper2">';
              foreach($items as $item){
              $query = http_build_query(['item' => $item['Name']]);
              echo '<div class="item">';
              echo '<a href="index.php?'.$query.'">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
              echo '<p class="itemname">' . $item['Name'] . '</p>';
              echo '<p class="itemprice">$' . $item['Price'] . '</p>';
              echo '<button class="add">Add Item</button>';
              echo '</div>';
            } }else {
              echo '<h1>No Results</h1>';
            }
            echo '</div>';            
          } elseif (isset($_GET['category'])) {
            foreach ($categories as $category) {
              if ($category['category'] == $_GET['category']) {
                foreach ($category['subcategories'] as $sub) {
                  foreach ($sub as $subcategory) {
                    $stmt = $pdo->prepare("SELECT * FROM items Where Subcategory= ?");
                    $stmt->bindParam(1,$subcategory, PDO::PARAM_STR);
                    $stmt->execute();
                    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($items)) {
                      echo '<a class="not-white" href="?subcategory=';
                      echo $subcategory;
                      echo '"><h1 class="title">' . $subcategory . '</h1></a>';
                      echo '<div class="wrapper">';
                      foreach($items as $item){
                      $query = http_build_query(['item' => $item['Name']]);
                      echo '<div class="item">';
                      echo '<a href="index.php?'.$query.'">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
                      echo '<p class="itemname">' . $item['Name'] . '</p>';
                      echo '<p class="itemprice">$' . $item['Price'] . '</p>';
                      echo '<button class="add">Add Item</button>';
                      echo '</div>';
                    }
                  }
                    echo '</div>';            
                  }
                }
              }
            }
          } elseif (isset($_GET['item'])) {
            $name = $_GET['item'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Name = ?");
            $stmt->bindParam(1,$name, PDO::PARAM_STR);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($items)) {
              echo '<div class="itemclass">';
              foreach($items as $item){
      echo '<div class="item-pic">';
       echo '<img src="UPLOADS/' . $item['Image']. '"> </div>';
       echo '<div class="description">';
       echo '<h1>'.$item["Name"].'</h1>';
        echo '<h2>$'.$item['Price'].'.00</h2>
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
            } }else {
              echo '<h1>No Results</h1>';
            }
          }else {
            include 'carousel.html';
          }

          $ip = getIPAddress();  
          echo 'User Real IP Address - '.$ip;  
          
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