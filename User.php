<?php
include_once 'models/Model.php';

class User
{
    private string $username;
    private string $name;
    private string $mail;
    private string $password;
    private string $birthdate;
    private string $country;

    public function __construct($id) {

        if (IsInDatabase($id)) {
            $user = getUserById($id);
            $this->username = $user['username'];
            $this->name = $user['name'];
            $this->mail = $user['mail'];
            $this->password = $user['password'];
            $this->birthdate = $user['birthdate'];
            $this->country = $user['country'];
        }
        else {
            die('Erreur: Session Invalide');
        }
    }

    /**
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return mixed|string
     */
    public function getBirthdate(): mixed
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    public function IsInDatabase($id): bool {
        return requestUserById($id)->rowCount() != 0;
    }
}