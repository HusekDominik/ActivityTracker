<?php
session_start();
require('./includes/autoload.class.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="style/css/main.css">
</head>

<body>

    <header class="header">
        <a href="main.php" class="header__imgLink">
            <img src="img/logo.png" alt="">
        </a>

        <?php
        if (isset($_SESSION['_id'])) {
            echo '<div class="header__login-register">
                    <a href="createActivity.php">Create Activity</a>
                    <a href="contact.php">Contact</a>
                    <form action="./includes/logout.inc.php" method="POST">
                        <button type="submit" class="logout">
                            Logout
                        </button>
                    </form>
                    <span class="userNameSpan">'
                . $_SESSION['username'] . '
                    </span>
                    <img  src="img/account_icon.png" alt="account_icon">
                    </div>
                    ';
        } else {
            echo ' <div class="header__login-register">
                        <a class="header__login-register__login" href="login.php">
                            Sign In
                        </a>
                        <a class="header__login-register__register" href="register.php">
                            Sign Up
                        </a>
                        <img src="img/account_icon.png" alt="account_icon">
                 </div>';
        }
        ?>
    </header>
    <div class="app">
        <div class="bodyContainer">