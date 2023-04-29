<!DOCTYPE html>
<html>

<head>
    <title>Login/Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        #signupForm {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    /* Bereket Bessie - Both session.php and config.php files are requried as they contain information to connect 
		                to the database and provide user authentication. */
    session_start();
    require 'config.php';
    //Connect to the database
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    /* Bereket Bessie - If the request method is POST and if the username, password, and email fields have been set. 
                        If so, it attempts to register the user using the provided info. */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['signup-username']) && isset($_POST['signup-password']) && isset($_POST['signup-email'])) {
            if (registerUser($_POST['signup-username'], $_POST['signup-password'], $_POST['signup-email']) === true) {
                echo '<script>alert("Registeration successfully")</script>';
            } else {
                echo '<script>alert("Username or password may already exist")</script>';
            }
        }
        /* Bereket Bessie - If the submitted form data for username and password is set. If the login credentials are valid, 
                            it displays a success message using JavaScript, otherwise it displays a failure message.*/
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (validLogin()) {
                echo '<script>alert("Login successful")</script>';
            } elseif (validLogin() === false) {
                echo '<script>alert("Login unsuccessfully")</script>';
            }
        }
        /* Bereket Bessie - If a user is already logged in by checking if a session variable for the username is set.
                            If the user is logged in, the code redirects them to the index page and exits.*/
        if (isset($_SESSION['username'])) {
            header('Location: index.php');
            exit;
        }
    }
    
    /* Bereket Bessie - This code validates a user's login credentials by querying a database and checking if the username and password match. 
                        If the credentials are valid, it sets a session variable and returns true, otherwise it returns false. */
    function validLogin()
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Credentials WHERE Username=:user and Password=MD5(CONCAT(:pass, Seed))";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':user', $_POST['username']);
        $statement->bindValue(':pass', $_POST['password']);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            $_SESSION['username'] = $_POST['username'];
            $pdo = null;
            return true;
        }
        $pdo = null;
        return false;
    }

    /* Bereket Bessie - This code registers a user by checking if the username and password already exist in the database. 
                        If the username and password do not exist, a salt is generated, the password is hashed with the salt, and the user's credentials are inserted into the database. */
    function registerUser($username, $password, $email)
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Credentials WHERE Username=:user OR Password=MD5(CONCAT(:pass, Seed))";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':user', $username);
        $statement->bindValue(':pass', $password);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            $pdo = null;
            return false;
        } else {
            // generate random salt
            $salt = bin2hex(random_bytes(4));

            // salt the password and compute the hash
            $saltedPassword = $password . $salt;
            $hashedPassword = md5($saltedPassword);

            // insert the user's credentials into the database
            $sql = "INSERT INTO Credentials (Username, Password, Seed, Email) VALUES (:user, :pass, :seed, :email)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':user', $username);
            $statement->bindValue(':pass', $hashedPassword);
            $statement->bindValue(':seed', $salt);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $_SESSION['username'] =  $username;
            $pdo = null;
            return true;
        }
    }
    ?>
    <!-- Bereket Bessie -->
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
                        <input type="email" class="form-control" id="email" name="signup-email" pattern="[a-zA-Z0-9.]{1,50}[@]{1}[a-zA-Z0-9]{1,10}[.]{1}[a-zA-Z]{1,4}" title="Please match this format ' hopemarketplace@gmail.com '" required>
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
     <!-- Bereket Bessie -->
    <script>
        function login() {
            var loginForm = document.getElementById("loginForm");
            var loginButton = document.getElementById("loginButton");
            var signupForm = document.getElementById("signupForm");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
                loginButton.innerHTML = "Don't have an account? <a href='#'>Sign up here</a>";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
                loginButton.innerHTML = "Already have an account? <a href='#'>Login here</a>";
            }
            if (signupForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
                loginButton.innerHTML = "Don't have an account? <a href='#'>Sign up here</a>";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
                loginButton.innerHTML = "Already have an account? <a href='#'>Login here</a>";
            }
        }
    </script>
</body>
</html>