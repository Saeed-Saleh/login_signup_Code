<?php
// Start the session
session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the user input and sanitize it
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);

  // Validate the user input
  if ($password != $confirm_password) {
    $_SESSION['error'] = "Passwords do not match";
    header("Location: signup.php");
    exit;
  }

  // Connect to the database
  $pdo = new PDO('mysql:host=localhost;dbname=sportsclubdb', 'root', 'PDzah74&');

  // Check if the username already exists
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    $_SESSION['error'] = "Username already exists";
    header("Location: signup.php");
    exit;
  }

  // Check if the email already exists
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    $_SESSION['error'] = "Email already exists";
    header("Location: signup.php");
    exit;
  }

  // Insert the new user into the database
//   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  // Redirect the user to the login page
  header("Location: login.php");
  exit;
}

?>