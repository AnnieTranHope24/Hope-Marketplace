<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}

if (isset($_GET['logout'])) {
  session_unset(); // Unset all session variables
  session_destroy(); // Destroy the session
  header('Location: login.php'); // Redirect to the login page or any other desired page
  exit;
}
require_once('config.php');

include 'categories.php';

try {
  $dbh = new PDO(DBCONNSTRING, DBUSER, DBPASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

?>

<!DOCTYPE php>

<php lang="en">

  <head>
    <?php include './partials/head.php' ?>
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
            $stmt = $dbh->prepare("SELECT * FROM items Where Name LIKE '%$name%'");
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="wrapper2">';
            foreach ($items as $item) {
              echo '<div class="item" onclick="fill(\'' . $item['Name'] . $item['Price'] . $item['Image'] . '\')">' . '<a href="#">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
              echo '<p class="itemname">' . $item['Name'] . '</p>';
              echo '<p class="itemprice">$' . $item['Price'] . '</p>';
              echo '<button class="add">Add Item</button>';
              echo '</div>';
            }
            echo '</div>';
          } elseif (isset($_GET['subcategory'])) {
            $name = lcfirst($_GET['subcategory']);
            $stmt = $dbh->prepare("SELECT * FROM items Where Subcategory= '$name'");
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<h1>' . $_GET['subcategory'] . '</h1>';
            echo '<div class="wrapper2">';
            // Display items
            foreach ($items as $item) {
              echo '<div class="item">';
              echo '<a href="#">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
              echo '<p class="itemname">' . $item['Name'] . '</p>';
              echo '<p class="itemprice">$' . $item['Price'] . '</p>';
              echo '<button class="add">Add Item</button>';
              echo '</div>';
            }
            echo '</div>';
          } elseif (isset($_GET['category'])) {
            foreach ($categories as $category) {
              if ($category['category'] == $_GET['category']) {
                foreach ($category['subcategories'] as $sub) {
                  foreach ($sub as $subcategory) {
                    $name = lcfirst($subcategory);
                    $stmt = $dbh->prepare("SELECT * FROM items Where Subcategory= '$name'");
                    $stmt->execute();
                    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<h1>' . $subcategory . '</h1>';
                    echo '<div class="wrapper">';
                    // Display items
                    foreach ($items as $item) {
                      echo '<div class="item">';
                      echo '<a href="#">' . '<img src="UPLOADS/' . $item['Image'] . '"></a>';
                      echo '<p class="itemname">' . $item['Name'] . '</p>';
                      echo '<p class="itemprice">$' . $item['Price'] . '</p>';
                      echo '<button class="add">Add Item</button>';
                      echo '</div>';
                    }
                    echo '</div>';
                  }
                }
              }
            }
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