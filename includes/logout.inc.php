<?php

declare(strict_types=1);
require('autoload.class.php');

try {
    Controller::logoutUser();
    header('Location: ../login.php?success=logout');
} catch (Exception $error) {
    header('Location: ../main.php?error=unknown');
    exit();
}
