<?php 
require_once('config.php');
include 'categories.php';
try {
  $dbh = new PDO(DBCONNSTRING, DBUSER, DBPASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Acedemics</title>
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="about.html" />
  <link rel="stylesheet" href="css/academics.css" />
  <style>
.itemname {
  font-size: 16px;
  white-space: nowrap;
  width: 200px;
  overflow: hidden;
  text-overflow: ellipsis;
  line-height: 1.5;
}
</style>
</head>
<body>
  <header>
    <?php
    include "partials/header.php" ;
    ?>
  </header>
  <body>
    <main>
      <h1 id="textbook">Textbooks</h1>
      <div class="wrapper">
      <?php
      if (isset($_GET['subcategory'])) {
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
      } else {
        foreach ($categories as $category) {
          if ($category['category'] == 'academics') {
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
      }
        ?>
      </div>
    </main>
    <footer>
         <?php
          include "partials/footer.php";
         ?>
    </footer>
    <script src="js/hamburger.js"></script>
  </body>

</html>