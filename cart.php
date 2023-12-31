<!DOCTYPE html>
<html lang="en">

<head>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="css/bootstrap.min.css" rel="stylesheet">  
<link rel="stylesheet" href="css/reset.css" />
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- font awesome link -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   -->
  <!-- <?php include './partials/head.php' ?> -->
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/academics.css" />
  <link href="about.php" />
  <link rel="stylesheet" href="css/moblie-index.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <link rel="stylesheet" href=".css/cart.css">
    
  <title>Cart</title>

  <?php
  session_start();
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
</head>

<body>
<?php 
	//Annie Tran: function to remove cart item from the database. If both remove button and checkbox are clicked, remove
	// If the checkbox is not clicked, ask user to click it.
	function remove_cart_item(){
		global $pdo;
			if(isset($_POST['remove_cart']) ){					
					if(isset($_POST['remove_id']) ){
						$pdo->prepare("DELETE FROM cart WHERE ID=?")->execute([$_POST['remove_id']]);
					}
					else{
						echo "<script>alert('Check the box before removing the item')</script>";
					}

				
			}

}
echo $remove_item = remove_cart_item();

?>	
  <header>
    <?php include './partials/header.php'?>
  </header>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"> -->
  <form action="" method="post">
  <div class="container">
	
	<table id="cart" class="table table-hover table-condensed" style="height: 450px">
    				<thead>


						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<?php



?>					<tbody>

					<!-- php code to display dynamic data -->
					<?php
					    global $pdo;
						$stmt = $pdo->prepare("SELECT * FROM cart");
						$stmt->execute();
						$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach($items as $item){
							$stmt = $pdo->prepare("SELECT * FROM items WHERE ID = ?");
							$stmt->bindParam(1,$item['ID'], PDO::PARAM_INT);
							$stmt->execute();
							$products = $stmt->fetchAll(PDO::FETCH_ASSOC);		
							foreach($products as $product)	{
								echo '			<tr>
								<td data-th="Product">
									<div class="row">
										<div class="col-sm-2 hidden-xs"><img src="images/academics/'.$product['Image'].'" alt="..." class="img-responsive"/></div>
										<div class="col-sm-10">
											<h4 class="nomargin">'.$product['Name'].'</h4>
											
										</div>
									</div>
								</td>
								<td data-th="Price">$'.$product['Price'].'</td>
								<td data-th="Quantity">
									<input type="number" class="form-control text-center" value="1">
								</td>
								<td data-th="Subtotal" class="text-center">$'.$product['Price'].'</td>
								<td class="actions" data-th=""><input type="checkbox" class="btn btn-danger btn-sm" name="remove_id" value="'.$product['ID'].'"></td>
								<td class="actions" data-th="">	
									<input type="submit" class="btn btn-danger btn-sm" name="remove_cart" value="Remove">														
								</td>
							</tr>';


							}	
	

						}					
					?>

					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total $<?php get_total_price()?></strong></td>
						</tr>
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total $<?php get_total_price()?></strong></td>
							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
				
</div>

</form>

   
  




  <footer>
   <?php include './partials/footer.php'?>
  </footer>
  <script src="js/hamburger.js"></script>
  <script src="js/index.js"></script>
</body>


</html>