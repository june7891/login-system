<?php 
   if(session_status() === PHP_SESSION_NONE){
    session_start();  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
   
    <title><?=$title?></title>

</head>

<body>
<header>
    <nav>
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">

        <ul>
            <a href="index.php"><li>Home</li></a>
            <?php if(!isset($_SESSION['username'])) : ?>
                <a href="signup.php"><li>Sign Up</li></a>
                <a href="login.php"><li>Login</li></a>
            <?php else: ?>
                <a href="reset-password.php"><li>Modifier mot de passe</li></a>
                <a href="gallery.php"><li>Ta galérie photos</li></a>
                <a href="account.php"><li>Ton profil</li></a>
                <a href="./controllers/Users.php?q=logout"><li>Logout</li></a>
            <?php endif; ?>
        </ul>

        </div>
        <div class="logo">
            <img src="./images/logo.svg" alt="">
        </div>
        <div class="login">
            <a href="login.php"><img src="./images/login.svg" alt=""></a>
            
        </div>
    </nav>

</header>