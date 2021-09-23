<?php

declare(strict_types=1);
require('autoload.class.php');

try {

    if (isset($_GET['id'])) {
        $deleteActivity = new Controller();

        $deleteActivity->deleteActivity($_GET['id']);
        header('Location: ../main.php?success=delete');
    }
} catch (Exception $error) {
    header('Location: ../main.php?error=delete');
    exit();
}
