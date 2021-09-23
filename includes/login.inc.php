<?php

declare(strict_types=1);
require('autoload.class.php');

try {

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            header('Location: ../login.php?error=empty');
            exit();
        }

        $loginUser = new Controller();
        $loginUser->loginUser($email, $password);
    }
} catch (Exception $error) {
    header('Location: ../login.php?error=unknown');
    exit();
}
