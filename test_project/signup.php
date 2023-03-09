<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
</head>
<body>
  <h1>Sign Up</h1>
  <?php
  // Check for errors in the session and display them
  session_start();
  if (isset($_SESSION['error'])) {
    echo '<p>' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
  }
  ?>
  <form action="signup_handler.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" required><br>
    <input type="submit" name="submit" value="Sign Up">
  </form>
</body>
</html>