<?php

declare(strict_types=1);
require('autoload.class.php');

try {

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $time = $_POST['time'];
        $description = $_POST['description'];

        if (empty($name) || empty($time) || empty($description)) {
            header('Location: ../createActivity.php?error=empty');
            exit();
        }
        $intTime = (int)$time;

        $createActivity = new Controller();
        $createActivity->createActivities($name, $intTime, $description);

        exit();
    }
} catch (Exception $error) {
    header('Location: ../createActivity.php?error=unknown');
    exit();
}
