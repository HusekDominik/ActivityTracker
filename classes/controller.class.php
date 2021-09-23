<?php


class Controller extends Model
{
    public function registerUser(string $username, string $email, string $password): void
    {
        $this->register($username, $email, $password);
    }
    public function loginUser(string $email, string $password): void
    {
        $this->login($email, $password);
    }
    public function createActivities(string $name, int $time, string $description): void
    {
        $this->createActivity($name, $time, $description);
    }
    public function deleteActivity($activity_id): void
    {

        $this->deleteActivityM($activity_id);
    }
    public static function logoutUser(): void
    {
        parent::logout();
    }
}
