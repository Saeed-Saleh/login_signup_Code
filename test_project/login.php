<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php
  // Check for errors in the session and display them
  session_start();
  if (isset($_SESSION['error'])) {
    echo '<p>' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
  }
  ?>
  <form action="login_handler.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="submit" value="Login">
  </form>
  <a href="signup.php">don't have an account?</a>
</body>
</html>