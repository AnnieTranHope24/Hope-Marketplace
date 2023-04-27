<?php
// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}

if (isset($_GET['logout']) || isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)){
  session_unset(); // Unset all session 
  session_destroy(); // Destroy the session
  header('Location: login.php'); // Redirect to the login page 
  exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

?>