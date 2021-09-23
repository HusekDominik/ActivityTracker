<?php

require_once('./includes/components/header.inc.php')

?>

<form action="./includes/createActivity.inc.php" method="POST">
    <div class="container-form">
        <h1>Create Activity</h1>
        <?php

        if (isset($_GET['error'])) {
            $text = '';

            switch ($_GET['error']) {
                case 'empty':
                    $text = 'Fill all inputs please';
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
                case 'activity':
                    $text = 'You have successfuly created an activity';
                    break;
                default:
                    $text = 'An unknown error occurred';
            }

            echo " <div class='success_msg'>
                        <span class='notificationHolder'>{$text}</span> <span class='deleteNotification'><i class='fas fa-times'></i></span>
                       </div>";
        }

        ?>
        <input type="text" name="name" placeholder="Activity Name">
        <input type="text" name="time" placeholder="Activity Time in minutes">
        <input type="text" required name="description" placeholder="Activity Description"></input>
        <button type="submit" name="submit">Create Activity</button>
    </div>
</form>

<?php

require_once('./includes/components/footer.inc.php')

?>