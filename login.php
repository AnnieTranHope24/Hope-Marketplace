<!DOCTYPE html>
<html>
<head>
    <title>Login/Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        #signupForm{
            display:none;
        }
    </style>
</head>
<body>
<?php
// Start the session
session_start();
require 'config.php';
try {
  $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup-username']) && isset($_POST['signup-password'])) {
        if(registerUser($_POST['signup-username'], $_POST['signup-password'])===true){
        echo '<script>alert("Registeration successfully")</script>';
        }else{
        echo '<script>alert("Username or password may already exist")</script>';
        }
    }
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (validLogin()) {
            echo '<script>alert("Login successful")</script>';
        } elseif (validLogin() === false) {
            echo '<script>alert("Login unsuccessfully")</script>';
        }
    }    if (isset($_SESSION['username'])) {
        header('Location: index.php');
        exit;
    }
}

 function validLogin(){  
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "SELECT * FROM Credentials WHERE Username=:user and Password=MD5(CONCAT(:pass, Seed))";
   $statement = $pdo->prepare($sql);
   $statement->bindValue(':user',$_POST['username']);
   $statement->bindValue(':pass',$_POST['password']);
   $statement->execute();
   if($statement->rowCount()>0){
    $_SESSION['username'] = $_POST['username'];
    $pdo = null;
     return true;
   }
   $pdo = null;
   return false;
}

function registerUser($username, $password) {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "SELECT * FROM Credentials WHERE Username=:user OR Password=MD5(CONCAT(:pass, Seed))";
   $statement = $pdo->prepare($sql);
   $statement->bindValue(':user',$username);
   $statement->bindValue(':pass',$password);
   $statement->execute();
   if($statement->rowCount()>0){
    $pdo = null;
     return false;
   }else{
   // generate random salt
   $salt = bin2hex(random_bytes(4));
   
   // salt the password and compute the hash
   $saltedPassword = $password . $salt;
   $hashedPassword = md5($saltedPassword);
   
   // insert the user's credentials into the database
   $sql = "INSERT INTO Credentials (Username, Password, Seed) VALUES (:user, :pass, :seed)";
   $statement = $pdo->prepare($sql);
   $statement->bindValue(':user', $username);
   $statement->bindValue(':pass', $hashedPassword);
   $statement->bindValue(':seed', $salt);
   $statement->execute();
   $_SESSION['username'] =  $username;
   $pdo = null;
   return true;
   }
}
?>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-10 col-md-8 col-lg-6">
                <!-- Sign Up Form -->
                <form action="" method="post" id="signupForm">
                <h2>Sign Up</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="signup-username" pattern="[a-zA-Z0-9 ]{1,10}" title="Please enter letters and numbers only (up to 10 characters)" required>
                        <small id="passwordHelpInline" class="text-muted">
                        Please enter a username that contains letters, numbers, and special characters only (up to 10 characters).
                            </small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="signup-email"  pattern="[a-zA-Z0-9.]{1,50}[@]{1}[a-zA-Z0-9]{1,10}[.]{1}[a-zA-Z]{1,4}" title="Please match this format ' hopemarketplace@gmail.com '" required>
                        <small id="passwordHelpInline" class="text-muted">
                            Please enter a valid email address.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="signup-password" pattern="[a-zA-Z0-9!@#$%^&*()_+=\-\\[\]{}|\\:;\',.<>/? ]{1,10}" title="Please enter letters, numbers, and special characters only (up to 10 characters)" required>
                        <small id="passwordHelpInline" class="text-muted">
                             Please enter a password that contains letters, numbers, and special characters only (up to 10 characters).
                            </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                <!-- Login Form -->
                <form action="" method="post" id="loginForm">
                    <h2>Login</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" pattern="[a-zA-Z0-9 ]{1,10}" title="Please enter letters and numbers only (up to 10 characters)" required>
                        <small id="passwordHelpInline" class="text-muted">
                             Please enter a username that contains letters, numbers, and special characters only (up to 10 characters).

                            </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" pattern="[a-zA-Z0-9!@#$%^&*()_+=\-\\[\]{}|\\:;\',.<>/?]{1,10}" title="Please enter letters, numbers, and special characters only (up to 10 characters)" required>
                        <small id="passwordHelpInline" class="text-muted">
                        Please enter a password that contains letters, numbers, and special characters only (up to 10 characters).
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p type="button" id="loginButton" onclick="login()">Don't have an account? <a href="#">Sign up here</a></p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script>
        function login() {
            var loginForm = document.getElementById("loginForm");
            var loginButton = document.getElementById("loginButton");
            var signupForm = document.getElementById("signupForm");
           
            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
                loginButton.innerHTML ="Don't have an account? <a href='#'>Sign up here</a>";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
                loginButton.innerHTML = "Already have an account? <a href='#'>Login here</a>";
            }
            if (signupForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
                loginButton.innerHTML ="Don't have an account? <a href='#'>Sign up here</a>";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
                loginButton.innerHTML = "Already have an account? <a href='#'>Login here</a>";
            }
        }
    </script>
</body>
</html>


