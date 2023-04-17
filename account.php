<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './partials/head.php' ?>
  <title>Account</title>
  <link rel="stylesheet" href="css/account.css" />
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
    <div class="mainBox">
      <h1>Your Account</h1>

      <ul class="acc-row">
        <li class="accItem" id="accItem1">
          <a href="#">
            <div>

              <h2>Your Order</h2>
              <p>Track, return, and cancel an order</p>

            </div>
          </a>
        </li>

        <li class="accItem" id="accItem2">
          <a href="#">
            <div>

              <h2>Your Addresses</h2>
              <p>Edit, remove, or set default address</p>

            </div>
          </a>
        </li>

      </ul>

      <ul class="acc-row">
        <div class="accItem" id="accItem3">
          <a href="#">
            <div>

              <h2>Your Profile</h2>
              <p>Edit your profile for personalized experience</p>

            </div>
          </a>
        </div>

        <div class="accItem" id="accItem4">
          <a href="sellItem.php">
            <div>

              <h2>Sell items</h2>
              <p>Post and sell your items </p>

            </div>
          </a>
        </div>

      </ul>

    </div>


    <br>
    <br>
  </main>
  <footer>
    <?php include './partials/footer.php'?>
  </footer>
  <script src="js/account.js"></script>
</body>




</html>