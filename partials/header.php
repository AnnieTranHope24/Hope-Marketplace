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
      <a id="account" href="#" class="dropbtn">Account</a>
      <div class="dropdown-content1">
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

          <!-- look at <a> here -->
          <?php 
          $select_cat = "select * from categories";
          $result_cat = mysqli_query($con, $select_cat);
          // $row_data = mysqli_fetch_assoc($result_cat);

          // fix the link of the category page
          while($row_data = mysqli_fetch_assoc($result_cat)){
            $cat_title = $row_data['cat_title'];
            $cat_id = $row_data['cat_id'];
            if($cat_title == "Academic"){
              echo '<a class="nav-link" href="academics.php"><img src=images/icons/book-icon.svg>'.$cat_title.'</a>';
            }
            elseif($cat_title == "Health"){
              echo '<a class="nav-link" href="health.php"><img src=images/icons/Weights.svg>Health</a>';
            }
            elseif($cat_title == "Fashion"){
              echo '<a class="nav-link" href="fashion.php"><img src=images/icons/Cloth.svg>Fashion</a>';
            }
            elseif($cat_title == "Room"){
              echo '<a class="nav-link" href="room.php"><img src=images/icons/Lamp.svg>Room</a>';
            }
            elseif($cat_title == "Entertainment"){
              echo '<a class="nav-link" href="entertainment.php"><img src=images/icons/TV.svg>Entertainment</a>';
            } 
            else{
              echo '<a class="nav-link" href="academics.php"><img src=images/icons/book-icon.svg>'.$cat_title.'</a>';
            }           
            
          }
        ?>              
        <!-- <a class="nav-link" href="academics.php"><img src=images/icons/book-icon.svg> Academics</a>
        <a class="nav-link" href="health.php"><img src=images/icons/Weights.svg>Health</a>
        <a class="nav-link" href="fashion.php"><img src=images/icons/Cloth.svg>Fashion</a>
        <a class="nav-link" href="room.php"><img src=images/icons/Lamp.svg>Room</a>
        <a class="nav-link" href="entertainment.php"><img src=images/icons/TV.svg>Entertainment</a> -->
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
        <!-- look at <a> here -->
        <?php 
          $select_cat = "select * from categories";
          $result_cat = mysqli_query($con, $select_cat);
          // $row_data = mysqli_fetch_assoc($result_cat);
          while($row_data = mysqli_fetch_assoc($result_cat)){
            $cat_title = $row_data['cat_title'];
            $cat_id = $row_data['cat_id'];
            if($cat_title == "Academic"){
              echo '      <div class="dropdown">        
              <a id="category" href="academics.php">'.$cat_title.'</a>
              <div class="dropdown-content">
                <div>
                  <img src="images/icons/resources.png" alt="">
                  <h3>Resources</h3>
                  <a href="/academics.php#textbooks"> Textbooks</a>
                  <a href="/academics.php#books"> Books</a>
                  <a href="/academics.php#testprep"> Test Prep</a>
                </div>
                <div>
                  <img src="images/icons/supplies.png" alt="">
                  <h3>Supplies</h3>
                  <a href="#"> Folder</a>
                  <a href="#"> Pens & Pencils</a>
                  <a href="#"> Binders</a>
                  <a href="#"> Note Cards</a>
                </div>
              </div>
            </div>';
            }
            elseif ($cat_title == "Health"){
              echo '      <div class="dropdown">
              <a id="category" href="health.php">'.$cat_title.'</a>
              <div class="dropdown-content">
                <div>
                  <img class="catagory-img" src="images/icons/gym.png" alt="">
                  <h3>Gym Equipment</h3>
                  <a href="#"> Home Workout Equipment</a>
                  <a href="#"> Fitness Clothes</a>
                  <a hrer="#"> Weightlifting Belts</a>
                  <a href="#"> Foam Rollers</a>
                  <a href="#"> Sport Equipment</a>
                </div>
                <div>
                  <img src="images/icons/yoga.png" alt="">
                  <h3>Recovery</h3>
                  <a href="#"> Yoga Matts</a>
                  <a href="#"> Waterbottles</a>
                  <a hrer="#"> Bodyweight Scales</a>
                  <a href="#"> Massage Guns</a>
                </div>
              </div>
            </div>';
            }
  
            elseif($cat_title == 'Room'){
              echo '      <div class="dropdown">
              <a id="category" href="room.php">Room</a>
              <div class="dropdown-content">
                <div>
                  <img src="images/icons/sofa.png" alt="">
                  <h3>Room Decorations</h3>
                  <a href="#"> Plants</a>
                  <a href="#"> Lights</a>
                  <a href="#"> Rugs</a>
                  <a href="#"> Art</a>
                </div>
                <div>
                  <img src="images/icons/cutlery.png" alt="">
                  <h3>Essientals</h3>
                  <a href="#">Plates & Bowls</a>
                  <a href="#"> Utensils</a>
                  <a href="#"> Water Heaters</a>
                  <a href="#"> Coffee Machines</a>
                  <a href="#"> Pots & Pans</a>
                </div>
              </div>
            </div>';
            }
  
            elseif($cat_title == 'Fashion'){
              echo '      <div class="dropdown">
              <a id="category" href="fashion.php">Fashion</a>
              <div class="dropdown-content">
                <div>
                  <h3>Mens</h3>
                  <a href="#"> Clothing</a>
                  <a href="#"> Sports Fan Shop</a>
                  <a href="#"> Shoes</a>
                </div>
                <div>
                  <h3>Womens</h3>
                  <a href="#"> Clothing</a>
                  <a href="#"> Sports Fan Shop</a>
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
            </div>';
            }
  
            elseif($cat_title == 'Entertainment'){
              echo '      <div class="dropdown">
              <a id="category" href="entertainment.php">Entertainment</a>
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
            </div>';
            }
            else{
              echo '      <div class="dropdown">
              <a id="category" href="health.php">'.$cat_title.'</a>
              <div class="dropdown-content">
                <div>
                  <img class="catagory-img" src="images/icons/gym.png" alt="">
                  <h3>Gym Equipment</h3>
                  <a href="#"> Home Workout Equipment</a>
                  <a href="#"> Fitness Clothes</a>
                  <a hrer="#"> Weightlifting Belts</a>
                  <a href="#"> Foam Rollers</a>
                  <a href="#"> Sport Equipment</a>
                </div>
                <div>
                  <img src="images/icons/yoga.png" alt="">
                  <h3>Recovery</h3>
                  <a href="#"> Yoga Matts</a>
                  <a href="#"> Waterbottles</a>
                  <a hrer="#"> Bodyweight Scales</a>
                  <a href="#"> Massage Guns</a>
                </div>
              </div>
            </div>';
            }
          }


        ?> 
        
      <!-- <div class="dropdown">        




 --> 
    </div>