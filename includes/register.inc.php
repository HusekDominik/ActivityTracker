<?php

declare(strict_types=1);
require('autoload.class.php');


try {
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
            throw new Exception('empty');
            exit();
        }

        if ($password !== $password_confirm) {
            throw new Exception('match');
            exit();
        }

        $createUser = new Controller();

        $createUser->registerUser($username, $email, $password);
        header("Location: ../login.php?success=register");
    } else {
        throw new Exception('unknown');
        exit();
    }
} catch (Exception $error) {
    echo $error;
    header("Location: ../register.php?error={$error->getMessage()}");
    exit();
}
