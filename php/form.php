<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Item to Sell</title>
</head>
<body>
	<h2>Fill Form to Post Items</h2>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<label>Name:</label>
		<input type="text" name="name"><br>
        
        <label>Category:</label>
        <input type="text" name="category"><br>

        <lable>Sub-Category:</label>
        <input type="text" name="subcategory"><br>

		<label>Upload your photos:</label>
		<input type="file" name="painting"><br>

        <input type="radio" id="academics" name="category" value="academics">
		<label for="academics">Academics</label><br>

		<input type="radio" id="room" name="category" value="room">
		<label for="room">Room</label><br>

		<input type="radio" id="health" name="category" value="health">
		<label for="health">Health</label><br>

		<input type="radio" id="entertainment" name="category" value="entertainment">
		<label for="entertainment">Entertainment</label><br>

		<input type="radio" id="fashion" name="category" value="fashion">
		<label for="fashion">Fashion</label><br>

		<input type="submit" value="Upload">
        <input type="reset">
	</form>
	<hr>
	<h2>Your Items</h2>
	<div>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Connect to database
				try {
					$dbh = new PDO(DBCONNSTRING,DBUSER,DBPASS);
					$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				} catch (PDOException $e) {
					echo 'Connection failed: ' . $e->getMessage();
				}

				// Retrieve paintings from database
				$stmt = $dbh->prepare("SELECT Name, Image FROM painters");
				$stmt->execute();
				$paintings = $stmt->fetchAll(PDO::FETCH_ASSOC);

				// Display paintings
				foreach ($paintings as $painting) {
					echo '<tr>';
					echo '<td>' . $painting['Name'] . '</td>';
                    echo '<td><img src="UPLOADS/' . $painting['Image'] . '" width="200" height="200"></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
