
<!DOCTYPE php>

<php lang="en">

  <head>
    
    <?php
    session_start();
    include "includes/common_functions.php";
    
    include './partials/head.php' ;
    require_once('config.php');

    include 'categories.php';
    try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    
    <title>Hope Marketplace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

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
          if (isset($_POST['search'])) {
            $name = $_POST['search'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Name LIKE CONCAT('%', :name, '%')");
            $stmt->bindParam(':name', $name);
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
          } elseif (isset($_GET['subcategory'])) {
            $name = $_GET['subcategory'];
            $stmt = $pdo->prepare("SELECT * FROM items WHERE Subcategory = ?");
            $stmt->bindParam(1,$name, PDO::PARAM_STR);
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
              // echo '<a href="#" class="add">Add Item</a>';
              // echo '<a href="index.php?subcategory='.$_GET['subcategory']. '" class="add">Add Item</a>';
              echo '<a href="index.php?subcategory='.$_GET['subcategory'] . '&add_to_cart='. $item['ID'] . '" class="add">Add Item</a>';
              echo '</div>';
              cart();

            }
           }else {
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
            
            // $ip = getIPAddress();  
            // echo 'User Real IP Address - '.$ip;  

          } else {
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