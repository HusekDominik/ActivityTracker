<?php

abstract class Model extends Database
{

    protected function register(string $username, string $email, string $password): void
    {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute([$username, $email, $hashedPassword]);
    }

    protected function login(string $email, string $password): void
    {
        $possibleUser = $this->checkEmail($email);

        if (!$possibleUser) {
            header('Location: ../login.php?error=email');
            exit();
        }

        $unHashedPassword = password_verify($password, $possibleUser['password']);

        if (!$unHashedPassword) {
            header('Location: ../login.php?error=match');
            exit();
        }
        session_start();

        $_SESSION['_id'] = $possibleUser['_id'];
        $_SESSION['username'] = $possibleUser['username'];

        header('Location: ../main.php');
    }

    protected function createActivity(string $name, int $time, string $description): void
    {
        $sql = "INSERT INTO activities (name, time, description, user_id) VALUES (?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        session_start();

        $stmt->execute([$name, $time, $description, $_SESSION['_id']]);

        header('Location: ../createActivity.php?success=activity');
    }

    protected function showActivitiesM()
    {
        $sql  = "SELECT activities._id, name, time, description FROM activities JOIN users ON activities.user_id = users._id WHERE activities.user_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$_SESSION['_id']]);

        $result = $stmt->fetchAll();

        return $result;
    }

    protected function showActivityM($activity_id)
    {
        $sql = "SELECT _id, name, time, description, user_id FROM activities WHERE _id = ? AND  user_id = ? ";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$activity_id, $_SESSION['_id']]);

        $result = $stmt->fetch();

        if ($_SESSION['_id'] !== $result['user_id']) {
            echo 'Good try bitch!';
            exit();
        }
        return $result;
    }
    protected function updateActivityM($name, $time, $descirption, $activity_id)
    {
        $sql = "UPDATE activities SET name = ?, time = ?,  description = ? WHERE _id = ? AND user_id = ?";

        session_start();

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name, $time, $descirption, $activity_id, $_SESSION['_id']]);
    }

    protected function deleteActivityM($activity_id): void
    {
        $sql = "DELETE FROM activities WHERE _id = ? ";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$activity_id]);
    }

    protected static function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
    }
    private function checkEmail(string $email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$email]);

        $result = $stmt->fetch();

        return $result;
    }
}
