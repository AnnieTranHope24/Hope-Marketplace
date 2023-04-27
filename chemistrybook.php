<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './partials/head.php';

  ?>

<?php
    require 'session.php';
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
  <title>chemistrybook</title>
  <link rel="stylesheet" href="css/chemistrybook.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Merriweather&display=swap"
    rel="stylesheet">
</head>

<body>
  <header>
    <?php include './partials/header.php'?>
  </header>

  <main>
    <div class="itemclass">
      <div class="item-pic">
        <img src="images/academics/Chemtextbook.jpg" />
      </div>
      <div class="description">

        <h1>General Chemistry 4.0026: Chemistry 132 - Laboratory Manual 6E</h1>
        <h2>Christiana A.M Guest, Ph.D</h2>
        <h2>$28.99</h2>
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
          <option value="1">6</option>
          <option value="1">7</option>
          <option value="1">8</option>
          <option value="1">9</option>
          <option value="1">10</option>
        </select>

        <button class="add-button">Add to Cart</button>
        <button class="add-button">Add to Wishlist</button>

      </div>
    </div>
    <div class="rating">
      <h1>Ratings and Reviews</h1>
      <hr>
      <p>No Reviews Available</p>
    </div>


  </main>




  <footer>
    <?php include './partials/footer.php'?>
  </footer>
</body>