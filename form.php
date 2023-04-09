<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Item to Sell</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/reset.css" />
	<style>
		.container{
			padding:2% 15%;
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
		<form action="upload.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
			<div class="form-group">
				<label>Item name:</label>
				<input type="text" name="name" class="form-control">
				<small id="passwordHelpInline" class="text-muted">
                 Enter the name of your item
              </small>			
			</div>

			<div class="form-group">
				<label for="category">Category:</label>
				<select id="category" name="category" class="form-control" onchange="showSubCategories()">
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
				<select id="subcategory" name="subcategory" class="form-control" disabled>
					<option value="">-- Please select a subcategory --</option>
				</select>
				<small id="passwordHelpInline" class="text-muted">
                 Enter the proper sub-category your item belongs
              </small>
			</div>

			<div class="form-group">
				<label>Price:</label>
				<div class="input-group">
					<input type="number" name="price" class="form-control" placeholder="$5.00" aria-label="Amount (to the nearest dollar)">
					<small id="passwordHelpInline" class="text-muted">
                 Enter a price you would like to sell the item
              </small>			
				</div>
			</div>

			<div class="form-group">
				<label>Upload your photos:</label>
				<input type="file" name="file1" id="file1" class="form-control-file" onchange="previewImage(event)" />
				<p class="help-block" id="errordiv">Browse for a file and post it to the server.</p>
				<img id="preview-img" src="" alt="" />
			</div>

			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" placeholder="hopemarketplace@gmail.com" class="form-control">
				<small id="passwordHelpInline" class="text-muted">
                 Enter an email address to be contacted with
              </small>
			</div>

			<div class="form-group">
				<label>Phone Number:</label>
				<input type="tel" name="phone" placeholder="(123)-456-78910" class="form-control">
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
		academics: ['Textbook', 'Testprep', 'Book'],
        health: ['Diet', 'Fitness', 'Mental Health'],
        room: ['Bedroom', 'Kitchen', 'Living Room'],
        fashion: ['Clothing', 'Accessories', 'Footwear'],
		entertainment: ['Labtop','Games', 'Headphones']
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
</body>
</html>
