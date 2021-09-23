<?php

require_once('./includes/components/header.inc.php')

?>

<div class="showDataHeader">
    <h1>Tasks</h1> <a href="createActivity.php">Add Activity</a>
    <div class="taskContainer">
        <?php

        if (isset($_GET['error'])) {
            $text = '';

            switch ($_GET['error']) {
                case 'delete':
                    $text = 'An Error occurred while deleting activity';
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
                case 'delete':
                    $text = 'Successfuly deleted activity';
                    break;
                default:
                    $text = 'An unknown error occurred';
            }

            echo " <div class='success_msg'>
             <span class='notificationHolder'>{$text}</span> <span class='deleteNotification'><i class='fas fa-times'></i></span>
           </div>";
        }

        $showActivity = new View();

        $activities = $showActivity->showActivities();

        foreach ($activities as $activity) {
            echo "  <div class='dataParentDiv'>
                    <div class='name-deleteDiv'>
                        <p><span class='infoStyle'>Name </span>{$activity['name']}</p><a class='deleteActivity' href='./includes/deleteActivity.inc.php?id={$activity['_id']}'>
                            <div class='circle'><i class='xIcon fas fa-times'></i></div>
                        </a>
                    </div>
                    <div class='sameDivSize'>
                        <p><span class='infoStyle'>Time </span>{$activity['time']}</p>
                    </div>
                    <div class='sameDivSize'>
                        <p><span class='infoStyle'>Desc </span>{$activity['description']}</p>
                    </div>
                    <div class='editDiv'><a class='editLink' href='editActivity.php?id={$activity['_id']}'>Změnit</a></div>
            </div>";
        }
        ?>
    </div>
</div>

<?php

require_once('./includes/components/footer.inc.php')

?>