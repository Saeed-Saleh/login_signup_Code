<?php
// Start the session
session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the user input and sanitize it
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

  // Connect to the database
  $pdo = new PDO('mysql:host=localhost;dbname=sportsclubdb', 'root', 'PDzah74&');

  // Check if the username exists
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    $_SESSION['error'] = "Username is incorrect";
    header("Location: login.php");
    exit;
  }

  // Check if the password is correct
  if ($password != $user['password']) {
    $_SESSION['error'] = "password is incorrect";
    header("Location: login.php");
    exit;
  }

  // Set the user session variable
  $_SESSION['user_id'] = $user['id'];

  // Redirect the user to the dashboard
  header("Location: index.php");
  exit;
}
?>