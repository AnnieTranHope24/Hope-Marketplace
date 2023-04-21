<?php
session_start();

$_SESSION['ref-time'] = time();
// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}

if (isset($_GET['logout'])){
  session_unset(); // Unset all session variables
  session_destroy(); // Destroy the session
  header('Location: login.php'); // Redirect to the login page or any other desired page
  exit;
}
?>