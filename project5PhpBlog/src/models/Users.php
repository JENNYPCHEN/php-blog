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
    private $reset_token;
    public static $counter=0;

    public function __construct($value = [])
    {
        if (!empty($value)) {

            $this->hydrate($value);
            self::$counter++;
        }
    }

    public function hydrate(array $values)
    {
        foreach ($values as $key => $value) {
            $method = 'set';
            $pieces = explode('_', $key);
            foreach ($pieces as $piece) {
                if (count($pieces) == 1) {
                    $method = 'set' . ucfirst($pieces[0]);
                }
                if (count($pieces) == 2) {
                    $method = 'set' . ucfirst($pieces[0]) . ucfirst($pieces[1]);
                }
                if (count($pieces) == 3) {
                    $method = 'set' . ucfirst($pieces[0]) . ucfirst($pieces[1]) . ucfirst($pieces[2]);
                }
            }
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
    public function setFirstName($first_name)
    {
        if (is_string($first_name)) {
            $this->first_name = $first_name;
        }
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function setLastName($last_name)
    {
        if (is_string($last_name)) {
            $this->last_name = $last_name;
        }
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function setUserName($user_name)
    {
        if (is_string($user_name)) {
            $this->user_name = $user_name;
        }
    }
    public function getUserName()
    {
        return $this->user_name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;
    }
    public function getDateCreate()
    {
        return $this->date_create;
    }
    public function setUserTypeId($user_type_id)
    {
        $user_type_id = (int) $user_type_id;
        if ($user_type_id > 0) {
            $this->user_type_id= $user_type_id;
        }
    }
    public function getUserTypeId()
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
    public function setResetToken($reset_token)
    {
        $this->reset_token = $reset_token;
    }
    public function getResetToken()
    {
        return $this->reset_token;
    }
    public function getCounter(){
        return self::$counter;
    }
}
