<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
<nav>
    <div>Logo</div>
    <ul>
        <li><a href="#">blogs</a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
    </ul>
    <?php if($_SESSION['user_id'] == 1){ ?>
        <a href="logout.php">logout</a>
        <a href="#">my cart</a>
        <a href="addBlogs.php">add blog</a>

    <?php } elseif($_SESSION['user_id'] != ''){ ?>
        <a href="logout.php">logout</a>
        <a href="#">my cart</a>
    <?php } else{ ?>
        <a href="login.php">login</a>
    <?php } ?>
</nav>