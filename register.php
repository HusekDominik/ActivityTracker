<?php
require_once('./includes/components/header.inc.php');
?>

<form action="./includes/register.inc.php" method="POST">
    <div class="container-form">
        <h1>Sign-Up</h1>
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
        ?>
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirm" placeholder="Confiirm Password">
        <button type="submit" name="submit">Register</button>
    </div>
</form>

<?php
require_once('./includes/components/footer.inc.php');
?>