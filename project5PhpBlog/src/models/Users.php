<?php

namespace App\Models;

class Users
{

    private $id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $email;
    private $password; 
    private $date_create;
    private $user_type_id;
    private $confirmPassword;

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
    public function setFirst_name($first_name)
    {
        if (is_string($first_name)) {
            $this->first_name = $first_name;
        }
    }
    public function getFirst_name()
    {
        return $this->first_name;
    }
    public function setLast_name($last_name)
    {
        if (is_string($last_name)) {
            $this->last_name = $last_name;
        }
    }
    public function getLast_name()
    {
        return $this->last_name;
    }
    public function setUser_name($user_name)
    {
        if (is_string($user_name)) {
            $this->user_name = $user_name;
        }
    }
    public function getUser_name()
    {
        return $this->user_name;
    }
    public function setEmail($email)
    {
        $this->Email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setDate_create($date_create)
    {
        $this->date_create = $date_create;
    }
    public function getDate_create()
    {
        return $this->date_create;
    }
    public function setUser_type_id($user_type_id)
    {
        $user_type_id = (int) $user_type_id;
        if ($user_type_id > 0) {
            $this->user_type_id= $user_type_id;
        }
    }
    public function getUser_type_id()
    {
        return $this->user_type_id;
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
