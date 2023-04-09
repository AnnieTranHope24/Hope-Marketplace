<?php require_once('config.php');
try {
  $dbh = new PDO(DBCONNSTRING,DBUSER,DBPASS);
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
    <div class="topnav">
      <a class="logo" href="index.html"><img src="images/icons/logo.svg" width="400px" /></a>
      <form class="search-form" method="get" action="http://www.randyconnolly.com/tests/process.php">
        <div class="search_box">
          <input name="search" type="text" class="mySearch" placeholder="Search.." src="images/icons/search.svg">
          <div>
            <button class="search_btn" type="submit"><img src="images/icons/search.svg" alt="search button" width="25px"
                height="20px"></button>
          </div>
        </div>
      </form>
      <div class="personal">
        <a href="account.html"><img src="images/icons/person-circle.svg" width="30px"></a>
        <a id="account" href="account.html">Account</a>
        <div class="cart">
           <h3 id="item-counter">0</h3>
          <a  class="cart" href="cart.html"><img src="images/icons/cart.svg" width="30px" height="30px" /></a>
        </div>
      </div>
    </div>
    <div class="nav-menu">
      <div class="nav-item">
          <form class="nav_moblie" method="get" action="http://www.randyconnolly.com/tests/process.php">
            <div class="searchbox_moblie">
              <input name="search" type="text" class="mySearch" placeholder="Search.." src="images/icons/search.svg">
              <div>
                <button class="search_btn" type="submit"><img src="images/icons/search.svg" alt="search button" width="25px"
                    height="20px"></button>
              </div>
            </div>
          </form>
        <a class="nav-link" href="academics.html"><img src=images/icons/book-icon.svg> Academics</a>
        <a  class="nav-link" href="health.html"><img src=images/icons/Weights.svg>Health</a>
        <a  class="nav-link" href="fashion.html"><img src=images/icons/Cloth.svg>Fashion</a>
        <a  class="nav-link" href="room.html"><img src=images/icons/Lamp.svg>Room</a>
        <a  class="nav-link" href="entertainment.html"><img src=images/icons/TV.svg>Entertainment</a>
        <hr>
        <p id="log-in"> <img src="images/icons/person-add.svg"> sign-up | log-in</p>
      </div>
    </div>
    <div class="navbar">
      <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
       </div>
      <div class="dropdown">
        <a id="category" href="academics.html"> Academics </a>
        <div class="dropdown-content">
          <div>
            <h3>Resources</h3>
            <a href="/academics.html.textbooks"> Textbooks</a>
            <a href="/academics.html.books"> Books</a>
            <a href="/academics.html.testprep"> Test Prep</a>
          </div>
          <div>
            <h3>Supplies</h3>
            <a href="#"> Folder</a>
            <a href="#"> Pens & Pencils</a>
            <a href="#"> Binders</a>
            <a href="#"> Note Cards</a>
          </div>
        </div>
      </div>
      <div class="dropdown">
        <a id="category" href="health.html"> Health </a>
        <div class="dropdown-content">
          <div>
            <h3>Gym Equipment</h3>
            <a href="#"> Home Workout Equipment</a>
            <a href="#"> Fitness Clothes</a>
            <a hrer="#"> Weightlifting Belts</a>
            <a href="#"> Foam Rollers</a>
            <a href="#"> Sport Equipment</a>
          </div>
          <div>
          <h3>Personal Care</h3>
          <a href="#"> Yoga Matts</a>
          <a href="#"> Waterbottles</a>
          <a hrer="#"> Bodyweight Scales</a>
          <a href="#"> Massage Guns</a>
        </div>
        </div>
      </div>
      <div class="dropdown">
        <a id="category" href="room.html">Room</a>
        <div class="dropdown-content">
          <div>
            <h3>Room Decorations</h3>
            <a href="#"> Plants</a>
            <a href="#"> Lights</a>
            <a href="#"> Rugs</a>
            <a href="#"> Art</a>
          </div>
          <div>
            <h3>Essientals</h3>
            <a href="#">Plates & Bowls</a>
            <a href="#"> Utensils</a>
            <a href="#"> Water Heaters</a>
            <a href="#"> Coffee Machines</a>
            <a href="#"> Pots & Pans</a>
          </div>
        </div>
      </div>
      <div class="dropdown">
        <a id="category" href="fashion.html">Fashion</a>
        <div class="dropdown-content">
            <div>
              <h3>Mens</h3>
              <a href="#">  Clothing</a>
              <a href="#">  Sports Fan Shop</a>
              <a href="#"> Shoes</a>
            </div>
            <div>
              <h3>Womens</h3>
              <a href="#">  Clothing</a>
              <a href="#">  Sports Fan Shop</a>
              <a href="#"> Shoes</a>
            </div>
              <div>
                <h3>Accessories</h3>
                <a href="#"> Handbagsn & BackPacks</a>
                <a href="#"> Sunglassess</a>
                <a href="#"> Hats</a>
                <a href="#"> Jewelery & Watches</a>
              </div>
        </div>
      </div>
      <div class="dropdown">
        <a id="category" href="entertainment.html">Entertainment</a>
        <div class="dropdown-content">
            <div>
              <h3>Technology</h3>
                <a href="#"> Computers & Tablets</a>
                <a href="#"> TV & Home Theater</a>
                <a href="#"> Cameras</a>
                <a href="#"> Speakers</a>
            </div>
            <div>
              <h3>Wearable Tech</h3>
              <a href="#"> Smart Watches</a>
              <a href="#"> Headphones</a>
              <a href="#"> Phones</a>
            </div>
            <div>
              <h3>Entertainment</h3>
              <a href="#"> Video Games</a>
              <a href="#"> Movies & Music</a>
              <a href="#"> Collectibles</a>
            </div>
          </div>
      </div>
    </div>
  </header>
  <body>
    <main>
      <h1 id="textbook">Textbooks</h1>
      <div class="wrapper">
        <?php
        $stmt = $dbh->prepare("SELECT * FROM items Where Subcategory='textbook'");
				$stmt->execute();
				$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

				// Display items
				foreach ($items as $item) {
          echo '<div class="item">';
          echo '<a href="#">'. '<img src="UPLOADS/' . $item['Image'] . '"></a>';
          echo '<p class="itemname">'.$item['Name'].'</p>';
          echo '<p class="itemprice">$'.$item['Price'].'</p>';
          echo '<button class="add">Add Item</button>';
          echo '</div>';
         }
        ?>
      </div>
      <h1 id="testprep">Test Preparation</h1>
      <div class="wrapper">
      <?php
        $stmt = $dbh->prepare("SELECT * FROM items Where Subcategory='testprep'");
				$stmt->execute();
				$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

				// Display items
				foreach ($items as $item) {
         echo '<div class="item">';
         echo '<a href="#">'. '<img src="UPLOADS/' . $item['Image'] . '"></a>';
         echo '<p class="itemname">'.$item['Name'].'</p>';
         echo '<p class="itemprice">$'.$item['Price'].'</p>';
         echo '<button class="add">Add Item</button>';
         echo '</div>';
        }
        ?>
      </div>
      <h1  class="books">Books</h1>
      <div class="wrapper">
      <?php
        $stmt = $dbh->prepare("SELECT * FROM items Where Subcategory='book'");
				$stmt->execute();
				$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

				// Display items
				foreach ($items as $item) {
          echo '<div class="item">';
          echo '<a href="#">'. '<img src="UPLOADS/' . $item['Image'] . '"></a>';
          echo '<p class="itemname">'.$item['Name'].'</p>';
          echo '<p class="itemprice">$'.$item['Price'].'</p>';
          echo '<button class="add">Add Item</button>';
          echo '</div>';
         }
        ?>
      </div>
    </main>
    <footer>
      <div class="footer-nav">
        <div class="footer-item">
          <h3>Get to Know Us</h3>
          <a href="about.html"> About Us</a><br>
          <div class="links">
            <a href="mailto:ngoc.tran@hope.edu"> <img src="images/icons/envelope.svg"></a>
            <a href=""> <img src="images/icons/linkedin.svg"></a>
            <a href=""> <img src="images/icons/instagram.svg"></a>
            <a href=""> <img src="images/icons/twitter.svg"></a>
            <a href=""> <img src="images/icons/snapchat.svg"></a>
          </div>
        </div>
        <div class="footer-item">
          <h3>Make Money with Us</h3>
          <a href="#"> Sell products</a>
          <a href="#"> Advertis Your Products</a>
          <a href="#"> Get paid </a>
        </div>
        <div class="footer-item">
          <h3>Frequently Asked Questions</h3>
          <a href="#"> How to find products</a>
          <a href="#"> What is the condition of products</a>
          <a href="#"> How to contact seller </a>
          <a href="#"> Help</a>
        </div>
      </div>
      <span id="copyRight"><small>&copy; 2022 Hope Marketplace. All Rights Reserved</small></span>
    </footer>
    <script src="js/hamburger.js"></script>
  </body>

</html>