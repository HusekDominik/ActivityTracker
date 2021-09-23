<?php
require_once('./includes/components/header.inc.php');
?>

<form action="./includes/login.inc.php" method="POST">
    <div class="container-form">
        <h1>Sign-In</h1>
        <?php

        if (isset($_GET['error'])) {
            $text = '';

            switch ($_GET['error']) {
                case 'empty':
                    $text = 'Fill all inputs please';
                    break;
                case 'match':
                    $text = "Password doesn't match";
                    break;
                case 'email':
                    $text = "User doesn't exist";
                    break;
                case 'unknown':
                    $text = 'An unknown error occurred';
                    break;
                default:
                    $text = 'An unknown error occurred';
            }

            echo " <div class='error_msg'>
                     <span class='notificationHolder'>{$text}</span> <span class='deleteNotification'><i class='fas fa-times'></i></span>
                   </div>";
        }
        if (isset($_GET['success'])) {
            $text = '';

            switch ($_GET['success']) {
                case 'register':
                    $text = 'You have been successfuly registered';
                    break;
                case 'logout':
                    $text = 'You have been successfuly logged out';
                    break;
                default:
                    $text = 'An unknown error occurred';
            }

            echo " <div class='success_msg'>
                    <span class='notificationHolder'>{$text}</span> <span class='deleteNotification'><i class='fas fa-times'></i></span>
                   </div>";
        }
        ?>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </div>
</form>

<?php
require_once('./includes/components/footer.inc.php');
?>