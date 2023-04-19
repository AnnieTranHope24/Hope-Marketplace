<?php

require_once('config.php');
include 'categories.php';
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
		<h1 class="h2">Post Item Form</h1>
		<form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
			<div class="form-group">
				<label>Item name:</label>
				<input type="text" name="name" class="form-control" pattern="^[a-zA-Z0-9 ]{1,50}$" title="Please enter letters, numbers and spaces only (up to 50 characters)" required>
				<small id="passwordHelpInline" class="text-muted">
					Enter the name of your item (letters, numbers and spaces only, up to 50 characters)
				</small>
			</div>

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

			<div class="form-group">
				<label for="subcategory">Sub-Category:</label>
				<select id="subcategory" name="subcategory" class="form-control" disabled required>
					<option value="">-- Please select a subcategory --</option>
				</select>
				<small id="passwordHelpInline" class="text-muted">
					Enter the proper sub-category your item belongs
				</small>
			</div>

			<div class="form-group">
				<label>Price:</label>
				<div class="input-group">
					<div> $
					<input type="number" name="price" placeholder="5.00" patter="[0-9][.]{1}[0-9]{2}" aria-label="Amount (to the nearest dollar)" required><br>
					<small id="passwordHelpInline" class="text-muted">
						Enter a price you would like to sell the item
					</small>
				</div>
			</div><br>

			<div class="form-group">
				<label>Upload your photos:</label>
				<input type="file" name="file1" id="file1" class="form-control-file" required onchange="previewImage(event)" />
				<p class="help-block" id="errordiv">Browse for a file and post it to the server.</p>
				<img id="preview-img" src="" alt="" />
			</div>

			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email"  class="form-control" placeholder="hopemarketplace@gmail.com"  pattern="[a-zA-Z0-9]{1,50}[@]{1}[a-zA-Z0-9]{1,10}[.]{1}[a-zA-Z]{1,4}" title="Please match this format ' hopemarketplace@gmail.com '" class="form-control" required>
				<small id="passwordHelpInline" class="text-muted">
					Enter an email address to be contacted with
				</small>
			</div>

			<div class="form-group">
				<label>Phone Number:</label>
				<input type="tel" name="phone" placeholder="(123)-456-7891" pattern="[(]{1}[0-9]{3}[)]{1}[-]{1}[0-9]{3}[-]{1}[0-9]{4}" title="Please match this format ' (123)-456-7891 '" class="form-control" required>
				<small id="passwordHelpInline" class="text-muted">
					Enter an phone number to be contacted with
				</small>
			</div>

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

				<input type="submit" class="btn btn-primary" />
				<input type="reset" class="btn btn-secondary" />
		</form>
	</div>
	<script>
		const subcategories = {
			academics: ['Textbook', 'Testprep', 'Book', 'Folder', 'Pens & Pencils', 'Binders', 'Note Cards'],
			health: ['Home Workout Equipment', 'Fitness Clothes', 'Weightlifting Belts', 'Foam Rollers', 'Sport Equipment', 'Yoga Matts', 'Waterbottles', 'Bodyweight Scales', 'Massage Guns'],
			room: ['Plants', 'Lights', 'Rugs', 'Art', 'Plates & Bowls', 'Utensils', 'Water Heaters', 'Coffee Machines', 'Pots & Pans'],
			fashion: ['Mens Clothing', 'Mens Sports Fan Shop', 'Mens Footwear', 'Womens Clothing', 'Womens Sports Fan Shop', 'Womens Footwear', 'Handbagsn & BackPacks', 'Sunglassess', 'Hats', 'Jewelery & Watches'],
			entertainment: ['Computers & Tablets', 'TV & Home Theater', 'Cameras', 'Speakers', 'Smart Watches', 'Headphones', 'Phones', 'Video Games', 'Movies & Music', 'Collectibles']
		};

		function showSubCategories() {
			const category = document.getElementById('category').value;
			const subcategorySelect = document.getElementById('subcategory');
			subcategorySelect.innerHTML = '';

			if (category) {
				const options = subcategories[category];
				for (let i = 0; i < options.length; i++) {
					const option = document.createElement('option');
					option.value = options[i];
					option.text = options[i];
					subcategorySelect.appendChild(option);
				}
				subcategorySelect.disabled = false;
			} else {
				subcategorySelect.disabled = true;
			}
		}

		function previewImage(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output = document.getElementById('preview-img');
				output.src = reader.result;
			}
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>
	<?php
	// Connect to database
	try {
		$dbh = new PDO(DBCONNSTRING, DBUSER, DBPASS);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$fileToMove = $_FILES['file1']['tmp_name'];
		$destination = "./UPLOADS/" . $_FILES["file1"]["name"];
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		$check = getimagesize($fileToMove);
		if ($check === false) {
			echo "File is not an image.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["file1"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
			$uploadOk = 0;
		}

		// Proceed with upload if all checks pass
		if ($uploadOk == 1) {
			if (move_uploaded_file($fileToMove, $destination)) {
				echo "File was sent to server <a href=''>Upload another file</a>";
				$name = $_POST['name'];
				$category = $_POST['category'];
				$subcategory = $_POST['subcategory'];
				$image = $_FILES["file1"]["name"];
				$stmt = $dbh->prepare("INSERT INTO items (name,category, subcategory, image) VALUES (?,?,?,?)");
				$stmt->bindParam(1, $name);
				$stmt->bindParam(2, $category);
				$stmt->bindParam(3, $subcategory);
				$stmt->bindParam(4, $image);
				$stmt->execute();
				echo "The file " . htmlspecialchars(basename($_FILES["file1"]["name"])) . " has been uploaded.";
			} else {
				echo "there was a problem moving the file";
			}
		}
	}
	?>
</body>
</html>