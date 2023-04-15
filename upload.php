<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<body>
<?php
    // Connect to database
    try {
        $dbh = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $fileToMove = $_FILES['file1']['tmp_name']; 
        $destination = "./UPLOADS/" . $_FILES["file1"]["name"]; 
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($fileToMove);
        if($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file1"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    
        // Proceed with upload if all checks pass
        if ($uploadOk == 1) {
            if (move_uploaded_file($fileToMove,$destination)) { 
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
                echo "The file ". htmlspecialchars( basename( $_FILES["file1"]["name"])). " has been uploaded.";
            } 
            else { 
                echo "there was a problem moving the file"; 
            }
        }
    }        
?>
</body>
</html>
