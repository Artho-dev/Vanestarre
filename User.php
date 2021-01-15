<?php


class User
{
    private string $username;
    private string $name;
    private string $password;
    private string $birthdate;
    private string $country;

    public function __construct($username, $name, $password, $birthdate, $country) {
        $this->username = $username;
        $this->name = $name;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->country = $country;
    }

    public function IsInDatabase(): bool {

        return true;
    }
}