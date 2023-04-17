<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<body>
<?php
// Check if the form was submitted
if (isset($_POST['name']) && isset($_FILES['painting'])) {
    // Connect to database
    try {
        $dbh = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    // Retrieve form data
$name = $_POST['name'];
    // Upload painting file
$painting = $_FILES['painting']['name'];
$target_dir = "UPLOADS/";
$target_file = $target_dir . basename($painting);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["painting"]["tmp_name"]);
if($check !== false) {
$uploadOk = 1;
} else {
echo "File is not an image.";
$uploadOk = 0;
}
}
// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}
// Check file size
if ($_FILES["painting"]["size"] > 500000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["painting"]["tmp_name"], $target_file)) {
// Insert painting into database
$stmt = $dbh->prepare("INSERT INTO painters (name, image) VALUES (?, ?)");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $painting);
$stmt->execute();
echo "The file ". htmlspecialchars( basename( $_FILES["painting"]["name"])). " has been uploaded.";
} else {
echo "Sorry, there was an error uploading your file.";
}
}
} else {
echo "Please fill out all required fields.";
}
?>


