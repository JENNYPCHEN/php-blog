<?php

namespace App\Models;

class Users
{

    private $firstName;
    private $lastName;
    private $username;
    private $emailAddress;
    private $password; 
    private $confirmPassword;
    private $dateCreate;
    private $id;
    private $userTypeId;
   

    public function __construct($value = [])
    {
        if (!empty($value)) {

            $this->hydrate($value);
        }
    }

    public function hydrate(array $values)
    {
        foreach ($values as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function setFirstName($firstName)
    {
        if (is_string($firstName)) {
            $this->firstName = $firstName;
        }
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setLastName($lastName)
    {
        if (is_string($lastName)) {
            $this->lastName = $lastName;
        }
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setUsername($username)
    {
        if (is_string($username)) {
            $this->username = $username;
        }
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }
    public function getDateCreate()
    {
        return $this->dateCreate;
    }
    public function setUserTypeId($userTypeId)
    {
        $userTypeId = (int) $userTypeId;
        if ($userTypeId > 0) {
            $this->userTypeId = $userTypeId;
        }
    }
    public function getUserTypeId()
    {
        return $this->userTypeId;
    }
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;
    }
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }
}
