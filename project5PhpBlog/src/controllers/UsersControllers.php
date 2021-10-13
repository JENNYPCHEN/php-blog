<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\UserManager;



class UsersControllers
{

    function newUser($firstName, $lastName, $username, $emailAddress, $password, $confirmPassword)
    {
      $usernameError = $emailAddressError = $passwordError = $confirmPasswordError = "";
        $nameValidation = "/^[a-zA-Z0-9]*$/";
        $passwordValidation = "/^(.{0-7}|[^a-z]*|[^\d]*)$/i";

        if (!preg_match($nameValidation, $username)) {
            $usernameError = "Name can only contain letters and numbers";
        }
          if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            $emailAddressError = "Please enter the correct format.";
        }
        if (!preg_match($passwordValidation, $password)) {
            $passwordError = "Password must have at least one numeric value.";
        } elseif (strlen($password) < 6) {
            $passwordError = "Password must have at least 8 characters.";
        }
        if ($password != $confirmPassword) {
            $confirmPasswordError = "Passwords do not match, please try again.";
        }
        if (!empty($usernameError) OR !empty($emailAddressError) OR !empty($passwordError) OR !empty($confirmPasswordError)) {
            require('src/views/frontend/signup.php');
        }

        if (empty($usernameError) && empty($emailAddressError) && empty($passwordError) && empty($confirmPasswordError)) {

            $userManager = new userManager;
            $newUser = $userManager->signup($firstName, $lastName, $username, $emailAddress, $password);
            if ($newUser === false) {
                echo 'Server problem.Please try again later';
            } else {
                header('Location:index.php?action=loginpage');
            }
        }
    }

}
