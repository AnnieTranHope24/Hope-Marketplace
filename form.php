<!-- Bereket Bessie - A form that provides a secure way for users to post items to a database,
					  with various restrictions in place to prevent security issues.  -->
<?php
/* Bereket Bessie - Both session.php and config.php files are requried as they contain information to connect 
					to the database and provide user authentication. */
session_start();
require 'session.php';
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Item to Sell</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/reset.css" />
	<style>
		.container {
			padding: 2% 15%;
		}
		#preview-img {
			max-width: 200px;
			max-height: 200px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2><a href="index.php">Return to main page</a></h2>
		<h1 class="h2">Post Item Form</h1>
		<!-- Bereket Bessie - The form's action is empty because the data will be sumited on below. The method is set to Post to hide the
							  data being submitted from the user. Enctype is set to mutlipart/form-data to allow the user to upload images.
							  To help users understand what type of input is expected, each input field has a small tag with additional information on the expected format. 
							  Additionaly, all the fields are set to required to collect all the nessary information about the item from the user. -->
		<form action="" method="POST" enctype="multipart/form-data">
			<!-- Bereket Bessie - The name field only accepts letters, numbers, and spaces up to 40 characters. -->			
			<div class="form-group">
				<label>Item name:</label>
				<input type="text" name="name" class="form-control" pattern="^[a-zA-Z0-9 ]{1,40}$" title="Please enter letters, numbers and spaces only (up to 50 characters)" required>
				<small id="passwordHelpInline" class="text-muted">
					Enter the name of your item (letters, numbers and spaces only, up to 40 characters)
				</small>
			</div>
			<!-- Bereket Bessie - The category is a dropdown menus that require an option to be selected. A javascript function is called using the
								  onchange event to display the relative subcategories. -->
			<div class="form-group">
				<label for="category">Category:</label>
				<select id="category" name="category" class="form-control" onchange="showSubCategories()" required>
					<option value="">-- Please select a category --</option>
					<option value="academics">Academics</option>
					<option value="health">Health</option>
					<option value="room">Room</option>
					<option value="fashion">Fashion</option>
					<option value="entertainment">Entertainment</option>
				</select>
				<small id="passwordHelpInline" class="text-muted">
					Enter the proper category your item belongs
				</small>
			</div>
			<!-- Bereket Bessie - Subcategory a dropdown menus that require an option to be selected and is set to disabled until a categroy is selected.
								  Once a categroy is selected the option are displayed using javascript to create html. -->
			<div class="form-group">
				<label for="subcategory">Sub-Category:</label>
				<select id="subcategory" name="subcategory" class="form-control" disabled required>
					<option value="">-- Please select a subcategory --</option>
				</select>
				<small id="passwordHelpInline" class="text-muted">
					Enter the proper sub-category your item belongs
				</small>
			</div>
			<!-- Bereket Bessie -The price field accepts only numbers and sets a limit on the maximum number of digits.  -->
			<div class="form-group">
				<label>Price:</label>
				<div class="input-group">
					<div> $
						<input type="number" name="price" placeholder="5" patter="[0-9]{0,9}" aria-label="Amount (to the nearest dollar)" required><br>
						<small id="passwordHelpInline" class="text-muted">
							Enter a price you would like to sell the item
						</small>
					</div>
				</div><br>
				<!-- Bereket Bessie -  Preview image feature for uploaded images is set to call a javascript function onchange to display the file selected. -->
				<div class="form-group">
					<label>Upload your photos:</label>
					<input type="file" name="file1" id="file1" class="form-control-file" required onchange="previewImage(event)" />
					<p class="help-block" id="errordiv">Browse for a file and post it to the server.</p>
					<img id="preview-img" src="" alt="" />
				</div>
				<!-- Bereket Bessie - The email field only accepts a valid email address.  -->
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9.]{1,50}[@]{1}[a-zA-Z0-9]{1,10}[.]{1}[a-zA-Z]{1,4}" title="Please match this format ' hopemarketplace@gmail.com '" required>
					<small id="passwordHelpInline" class="text-muted">
						Enter an email address to be contacted with
					</small>
				</div>
				<!-- Bereket Bessie - The phone field only accepts a 10-digit number.-->
				<div class="form-group">
					<label>Phone Number:</label>
					<input type="tel" name="phone" placeholder="1234567891" pattern="[0-9]{10}" title="Please match this format ' 1234567891 '" class="form-control" required>
					<small id="passwordHelpInline" class="text-muted">
						Enter an phone number to be contacted with
					</small>
				</div>
				<!-- Bereket Bessie - The payment method is a radio that allows the user to select a accept payment option.-->
				<div class="form-group">
					<label>Payment Method:</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
						<label class="form-check-label" for="paypal">
							Paypal
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment_method" id="venmo" value="venmo">
						<label class="form-check-label" for="venmo">
							Venmo
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment_method" id="cashapp" value="cashapp">
						<label class="form-check-label" for="cashapp">
							Cash App
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment_method" id="zelle" value="zelle">
						<label class="form-check-label" for="zelle">
							Zelle
						</label>
					</div>
					<!-- Bereket Bessie - Submit and reset -->
					<input type="submit" class="btn btn-primary" />
					<input type="reset" class="btn btn-secondary" />
		</form>
	</div>
	<script src="js/form.js"></script>

	<?php
	// Connect to database
	try {
		$dbh = new PDO(DBCONNSTRING, DBUSER, DBPASS);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
    //Bereket Bessie - Checks for the request method 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// it moves the uploaded file from its temporary location to a permanent directory on the server called UPLOADS
		$fileToMove = $_FILES['file1']['tmp_name'];
		$destination = "./UPLOADS/" . $_FILES["file1"]["name"];
		/* Bereket Bessie - If the file is successfully moved, the item information is retrieved from the form 
		 					and inserts it into a database table named "items". using prepared statements and bound 
							parameters to further protect against SQL injection attacks.*/
		if (move_uploaded_file($fileToMove, $destination)) {
			echo "File was sent to server <a href=''>Upload another file</a>";
			$name = $_POST['name'];
			$category = $_POST['category'];
			$subcategory = $_POST['subcategory'];
			$price = $_POST['price'];
			$image = $_FILES["file1"]["name"];
			$stmt = $dbh->prepare("INSERT INTO items (name,category, subcategory, price, image) VALUES (?,?,?,?,?)");
			$stmt->bindParam(1, $name, PDO::PARAM_STR);
			$stmt->bindParam(2, $category, PDO::PARAM_STR);
			$stmt->bindParam(3, $subcategory, PDO::PARAM_STR);
			$stmt->bindParam(4, $price, PDO::PARAM_INT);
			$stmt->bindParam(5, $image, PDO::PARAM_STR);
			$stmt->execute();
			$stmt = null;
			$pdo = null;
			echo '<script>alert("You have succesfully added your item to the site.")</script>';
			header('Location: login.php');
		} else {
			echo '<script>alert("There was an issue while trying to upload your item to the site!")</script>';
			$stmt = null;
			$pdo = null;
		}
	}
	?>
</body>
</html>