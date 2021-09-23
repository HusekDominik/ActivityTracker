<?php


require_once('./includes/components/header.inc.php');
?>

<form action="./includes/editActivity.inc.php" method="POST">
    <div class="container-form">
        <h1>Edit Activity</h1>
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
                    $text = 'You have successfuly edited an activity';
                    break;
                default:
                    $text = 'An unknown error occurred';
            }

            echo " <div class='success_msg'>
                        <span class='notificationHolder'>{$text}</span> <span class='deleteNotification'><i class='fas fa-times'></i></span>
                       </div>";
        }

        ?>
        <?php

        $activity = new View();

        $fetchedActivity =  $activity->showActivity($_GET['id']);


        echo "<form action='./includes/editActivity.inc.php?id={$fetchedActivity['_id']}' method='POST'>
                <input type='hidden' name='_id' value={$fetchedActivity['_id']}>
                <input type='text' name='name' placeholder='Activity Name' value={$fetchedActivity['name']}>
                <input type='text' name='time' placeholder='Activity Time in minutes' value={$fetchedActivity['time']}>
                <input type='text' required name='description' placeholder='Activity Description' value={$fetchedActivity['description']}></input>
                <button type='submit' name='submit'>Edit Activity</button>
             </form>";
        ?>
    </div>
</form>

<?php

require_once('./includes/components/footer.inc.php')

?>