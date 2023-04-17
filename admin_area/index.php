<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php include 'partials/head.php' ?>
  <title>Admin</title>
  
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <header>
    <?php include 'partials/header.php'?>
  </header>
  
  <main>
    <div class="container-fluid p-0">
      <!-- first child -->
      <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
      </div>
      <!-- second child -->
      <div class="row">
        <div class="col-md-12 bg-secondary p-1">
          <div>
            <p class="text-light text-center">Admin Name</p>
          </div>
          <!-- button*8>a.nav-link.text-light.bg-info.my-1 -->
          <div class="button text-center">
            <button><a href="" class="nav-link text-light bg-info my-1">Insert Products</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
            <button><a href="index.php?insert_cat" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">Log out</a></button>

          </div>
          
        </div>
      </div>
      <!-- third child -->
      <div class="container my-3">
        <?php
          if(isset($_GET['insert_cat'])){
            include "insert_cat.php";
          }
        ?>
        
      </div>

    </div>

  </main>
  <footer>
    <?php include 'partials/footer.php'?>
  </footer>
  <script src="../js/hamburger.js"></script>
  
</body>

</html>