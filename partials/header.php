<!-- connect file -->
<?php 
  include 'categories.php';
  include 'includes/connect.php';
 ?>
<div class="topnav">
      <a class="logo" href="hopemarketplace.php"><img src="images/icons/logo.svg" width="400px" /></a>
      <form class="search-form" method="post" action="">
        <div class="search_box">
          <input name="search" type="text" class="mySearch" id="search" autocomplete="off" placeholder="Search.." src="images/icons/search.svg">
          <div>
            <button class="search_btn" type="submit"><img src="images/icons/search.svg" alt="search button" width="25px"
                height="20px"></button>
          </div>
        </div>
      </form>
      <div class="personal">
        <a href="account.php"><img src="images/icons/person-circle.svg" width="30px"></a>
        <div class="dropdown">
        <a id="account" class="dropbtn"href="account.php">Account</a>
          <div class="dropdown-content1 ">
            <a href="?logout">Log Out</a>
          </div>
        </div>
        <div class="cart">
          <h3 id="item-counter">0</h3>
          <a class="cart" href="cart.php"><img src="images/icons/cart.svg" width="30px" height="30px" /></a>
        </div>
      </div>
    </div>
    <div class="nav-menu">
      <div class="nav-item">
        <form class="nav_moblie" method="post" action="">
          <div class="searchbox_moblie">
            <input name="search" type="text" class="mySearch" placeholder="Search.." id="search" autocomplete="off" src="images/icons/search.svg">
            <div>
              <button class="search_btn" type="submit"><img src="images/icons/search.svg" alt="search button"
                  width="25px" height="20px"></button>
            </div>
          </div>
        </form>
        <a class="nav-link" href="hopemarketplace.php?category=academics"><img src=images/icons/book-icon.svg> Academics</a>
        <a class="nav-link" href="hopemarketplace.php?category=health"><img src=images/icons/Weights.svg>Health</a>
        <a class="nav-link" href="hopemarketplace.php?category=fashion"><img src=images/icons/Cloth.svg>Fashion</a>
        <a class="nav-link" href="hopemarketplace.php?category=room"><img src=images/icons/Lamp.svg>Room</a>
        <a class="nav-link" href="hopemarketplace.php?category=entertainment"><img src=images/icons/TV.svg>Entertainment</a>
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
<?php
foreach($categories as $category){
     echo '<div class="dropdown">';
     $query = http_build_query(['category' => $category['category']]);
     echo '<a id="category" href="hopemarketplace.php?'.$query.'">'.ucfirst($category['category']) .'</a>';
     echo '<div class="dropdown-content">';
        $titles = array();
        $titles = array_keys($category['subcategories']);
 foreach($titles as $title){
        echo '<div>';
        echo '<h3>'.$title.'</h3>';
 foreach($category['subcategories'][$title] as $subcategory){
        $query = http_build_query(['subcategory' => $subcategory]);
         echo '<a href="hopemarketplace.php?'.$query.'">'.$subcategory .'</a>';
       }
         echo '</div>';
     }
     echo '</div>';
   echo '</div>';
  }
  ?>

    </div>