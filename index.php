
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
    <?php include './partials/header.php'?>
  </header>

  <!-- Annie Tran - Main display items -->
  <main>
    <!-- Annie Tran - Carousel using Tiny Slider  -->

    <div class="slider-wrapper">
      <br>
      <div class="slider-cover">
        <button class="slide-prev" id="slide-prev-cover">&#10094;</button>
        <button class="slide-next" id="slide-next-cover">&#10095;</button>
      </div>

      <div class="my-slider-cover">
      <div>
          <div class="slide">
            <div class="slide-img cover">
              <a href="#"><img src="images/cover-theme.jpg" ></a>
            </div>


          </div>

        </div>

        <div>
          <div class="slide">
            <div class="slide-img cover">
              <a href="academics.php"><img src="images/cover-theme-academic.jpg" ></a>
            </div>


          </div>

        </div>

        <div>
          <div class="slide">
            <div class="slide-img cover">
              <a href="health.php"><img src="images/cover-theme-academic.jpg" ></a>
            </div>


          </div>
        </div>

        <div>
          <div class="slide">
            <div class="slide-img cover">
              <a href="room.php"><img src="images/room/cozyroom.gif" ></a>
            </div>


          </div>
        </div>

        <div>
          <div class="slide">
            <div class="slide-img cover">
              <a href="entertainment.php"><img src="images/entertainment/techcover.gif" ></a>
            </div>


          </div>
        </div>

        <div>
          <div class="slide">
            <div class="slide-img cover">
              <a href="fashion.php"><img src="images/fashion/fashioncover.gif" ></a>
            </div>

          </div>
        </div>
        
      </div>  
    </div>  

  <!-- Annie Tran - The cover-photo-carousel -->
    <div class="slideshow-container" >

      <!-- Annie Tran - Full images -->
      <div class="Containers" id="item1">
        <img class="slideImage" src="images/academics/academicscover.gif" style="width:40%">
      </div>

      <div class="Containers" id="item2">
        <img class="slideImage" src="images/health/healthfitnesscover.gif" style="width:40%">
      </div>

      <div class="Containers" id="item3">
        <img class="slideImage" src="images/entertainment/techcover.gif" style="width:40%">
      </div>

      <div class="Containers" id="item4">
        <img class="slideImage" src="images/room/cozyroom.gif" style="width:40%" >
      </div>

      <div class="Containers" id="item5">
        <img class="slideImage" src="images/fashion/fashioncover.gif" style="width:40%">
      </div>

      <!-- Annie Tran - Back and forward buttons -->
      <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
      <a class="forward" onclick="plusSlides(1)">&#10095;</a>
    </div>


    <!-- Annie Tran - The circles/dots -->
    <div style="text-align:center">
      <span class="dots" onclick="currentSlide(1)"></span>
      <span class="dots" onclick="currentSlide(2)"></span>
      <span class="dots" onclick="currentSlide(3)"></span>
      <span class="dots" onclick="currentSlide(4)"></span>
      <span class="dots" onclick="currentSlide(5)"></span>
      <div class="toggle">
        <h1 class="switch-title">Request Board
        <label class="switch">
          <input type="checkbox">
          <span class="slider"></span>
        </h1>
        </div> 
        <div class="card-container">
          <h1 class="req">Request Board <img src="images/icons/window-plus.svg" width="30px"> </h1>
          <div class="card">
            <div class="card-image">
              <img src="https://via.placeholder.com/50x50" alt="User Profile Image">
              <h3 class="card-username">John Doe</h3>
            </div>
            <div class="card-content">
              <h2 class="card-title">Lamp</h2>
              <p class="card-description">Anything that I could use to study or read on book on my book shelf. </p>
            <button class="card-contact"><img src="images/icons/send-plus.svg"></button>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
              <img src="https://via.placeholder.com/50x50" alt="User Profile Image">
              <h3 class="card-username">Jane Doe</h3>
            </div>
            <div class="card-content">
              <h2 class="card-title">Dress</h2>
              <p class="card-description">Something to wear to a form event on campus.  </p>
            <button class="card-contact"><img src="images/icons/send-plus.svg"></button>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
              <img src="https://via.placeholder.com/50x50" alt="User Profile Image">
              <h3 class="card-username">John Doe</h3>
            </div>
            <div class="card-content">
              <h2 class="card-title">Plant</h2>
              <p class="card-description">A small house plant to keep in my dorm for decoration. </p>
            <button class="card-contact"><img src="images/icons/send-plus.svg"></button>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
              <img src="https://via.placeholder.com/50x50" alt="User Profile Image">
              <h3 class="card-username">Jane Doe</h3>
            </div>
            <div class="card-content">
              <h2 class="card-title">iPhone Charger</h2>
              <p class="card-description">Preferably with a long cord and fast charging. </p>
            <button class="card-contact"><img src="images/icons/send-plus.svg"></button>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
              <img src="https://via.placeholder.com/50x50" alt="User Profile Image">
              <h3 class="card-username">John Doe</h3>
            </div>
            <div class="card-content">
              <h2 class="card-title">Small TV</h2>
              <p class="card-description">Looking for a TV to have in the dorms. </p>
            <button class="card-contact"><img src="images/icons/send-plus.svg"></button>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
              <img src="https://via.placeholder.com/50x50" alt="User Profile Image">
              <h3 class="card-username">Jane Doe</h3>
            </div>
            <div class="card-content">
              <h2 class="card-title">TI84 Calculator</h2>
              <p class="card-description">Any version of the TI84 that has come out that past few years will do.  </p>
            <button class="card-contact"><img src="images/icons/send-plus.svg"></button>
            </div>
          </div>
        </div> 
          
  <section id="slider">
    <div class="container">
      <div class="subcontainer">
        <div class="slider-wrapper">
          <div>
            <br>
            <h1>Best Sellers in Academics</h1>
          </div>
          <br>
          <div>
            <button class="slide-prev" id="slide-prev1">&#10094;</button>
            <button class="slide-next" id="slide-next1">&#10095;</button>
          </div>
          <div class="my-slider">
            <div>
              <div class="slide">
                <div class="slide-img img-1 catslider">
                  <a href="chemistrybook.php"><img src="images/academics/Chemtextbook.jpg"></a>
                </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-2 catslider">
                      <a href="chemistrybook.php"><img src="images/academics/EconTextbook.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-3 catslider">
                      <a href="chemistrybook.php"><img src="images/academics/physics.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-4 catslider">
                      <a href="chemistrybook.php"><img src="images/academics/stattextbook.jpg"></a>
                    </div>


                  </div>
                </div>

                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/academics/testprep2.jpg"></a>
                    </div>


                  </div>
                </div>
              </div>



            </div>

            <div class="slider-wrapper">
              <div>
                <br>
                <h1>Best Sellers in Health</h1>
              </div>
              <br>
              <div>
                <button class="slide-prev" id="slide-prev2">&#10094;</button>
                <button class="slide-next" id="slide-next2">&#10095;</button>
              </div>
              <div class="my-slider2">
                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/health/band.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-2 catslider">
                      <a href="chemistrybook.php"><img src="images/health/jumprope.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-3 catslider">
                      <a href="chemistrybook.php"><img src="images/health/pushupboard.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-4 catslider">
                      <a href="chemistrybook.php"><img src="images/health/waterbottle.png"></a>
                    </div>


                  </div>
                </div>

                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/health/yogamatt.jpg"></a>
                    </div>


                  </div>
                </div>
              </div>



            </div>



            <div class="slider-wrapper">
              <div>
                <br>
                <h1>Best Sellers in Room</h1>
              </div>
              <br>
              <div>
                <button class="slide-prev" id="slide-prev3">&#10094;</button>
                <button class="slide-next" id="slide-next3">&#10095;</button>
              </div>
              <div class="my-slider3">
                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/room/desklamp.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-2 catslider">
                      <a href="chemistrybook.php"><img src="images/room/plant.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-3 catslider">
                      <a href="chemistrybook.php"><img src="images/room/desklamp.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-4 catslider">
                      <a href="chemistrybook.php"><img src="images/health/waterbottle.png"></a>
                    </div>


                  </div>
                </div>

                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/health/yogamatt.jpg"></a>
                    </div>


                  </div>
                </div>
              </div>



            </div>

            <div class="slider-wrapper">
              <div>
                <br>
                <h1>Best Sellers in Fashion</h1>
              </div>
              <br>
              <div>
                <button class="slide-prev" id="slide-prev4">&#10094;</button>
                <button class="slide-next" id="slide-next4">&#10095;</button>
              </div>
              <div class="my-slider4">
                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/fashion/jackect.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-2 catslider">
                      <a href="chemistrybook.php"><img src="images/fashion/shirt.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-3 catslider">
                      <a href="chemistrybook.php"><img src="images/fashion/Sweater.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-4 catslider">
                      <a href="chemistrybook.php"><img src="images/fashion/sweatpants.jpg"></a>
                    </div>


                  </div>
                </div>

                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/fashion/Sweatshirt.jpg"></a>
                    </div>


                  </div>
                </div>
              </div>



            </div>

            <div class="slider-wrapper">
              <div>
                <br>
                <h1>Best Sellers in Entertainment</h1>
              </div>
              <br>
              <div>
                <button class="slide-prev" id="slide-prev5">&#10094;</button>
                <button class="slide-next" id="slide-next5">&#10095;</button>
              </div>
              <div class="my-slider5">
                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/entertainment/appletv.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-2 catslider">
                      <a href="chemistrybook.php"><img src="images/entertainment/headphones.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-3 catslider">
                      <a href="chemistrybook.php"><img src="images/entertainment/laptop.jpg"></a>
                    </div>


                  </div>
                </div>
                <div>
                  <div class="slide">
                    <div class="slide-img img-4 catslider">
                      <a href="chemistrybook.php"><img src="images/entertainment/headphones.jpg"></a>
                    </div>


                  </div>
                </div>

                <div>
                  <div class="slide">
                    <div class="slide-img img-1 catslider">
                      <a href="chemistrybook.php"><img src="images/entertainment/appletv.jpg"></a>
                    </div>


                  </div>
                </div>
              </div>         
        </div> 
      </div>
    </div>
  </section>

  </main>
  <!-- Annie Tran - The footer of the page -->
  <footer>
    <?php include './partials/footer.php'?>
  </footer>
  <script src="js/hamburger.js"></script>
  <script src="js/index.js"></script>
</body>


</php>