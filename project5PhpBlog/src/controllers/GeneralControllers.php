<?php

namespace App\Controllers;

class GeneralControllers
{
    function UsernameVerification($name)
    {
        $nameValidation = "/^[a-zA-Z0-9]*$/";
        if (!preg_match($nameValidation, $name)) {
            return $usernameError = "Name can only contain letters and numbers";
        }
    }
    function emailVerification($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $emailAddressError = "Please enter the correct format.";
        }
    }
    function passwordVerification($password)
    {
        $passwordValidation = "/^(?=.*?[0-9])[a-zA-Z0-9]{8,}$/";
        if (strlen($password)<= 7 OR !preg_match($passwordValidation, $password)) {
            return $passwordError = "Password must have at least 8 characters and one numeric value.";
        }
    }
    function confirmPasswordVerification($password,$confirmPassword){
        if ($password!= $confirmPassword) {
            return $confirmPasswordError = "Passwords do not match, please try again.";
        }
    }
}
