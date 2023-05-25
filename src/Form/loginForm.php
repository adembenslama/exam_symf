<?php
namespace App\Entity;
class loginForm
{
 private $email;
    private $password;
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

}
