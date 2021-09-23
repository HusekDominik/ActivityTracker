<?php

declare(strict_types=1);
require('autoload.class.php');

try {

    if (isset($_POST['submit'])) {
        $activity_id = $_POST['_id'];

        echo $activity_id;

        if (empty($activity_id)) {
            echo 'empty';
            exit();
        }

        $name = $_POST['name'];
        $time = $_POST['time'];
        $description = $_POST['description'];

        if (empty($name) || empty($time) || empty($description)) {
            header("Location: ../editActivity.php?id={$activity_id}&error=empty");
            exit();
        }
        $intTime = (int)$time;

        $editActivity = new View();
        $editActivity->editActivity($name, $time, $description, $activity_id);

        header("Location: ../editActivity.php?id={$activity_id}&success=activity");

        exit();
    }
} catch (Exception $error) {
    header("Location: ../editActivity.php?id={$activity_id}&error=unknown");
    exit();
}
