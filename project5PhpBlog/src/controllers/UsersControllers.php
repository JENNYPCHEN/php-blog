<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\UserManager;
use App\Models\PostManager;
use \PDO;



class UsersControllers
{

    function newUser($user)
    {
      
       $usernameError = "";
        $emailAddressError = "";
        $passwordError = "";
        $confirmPasswordError = "";
        $error = "";

        $nameValidation = "/^[a-zA-Z0-9]*$/";
        $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

        if (!preg_match($nameValidation, $user['username'])) {
            $usernameError = "Name can only contain letters and numbers";
        }
        if (!filter_var($user['emailAddress'], FILTER_VALIDATE_EMAIL)) {
            $emailAddressError = "Please enter the correct format.";
        }
        if (!preg_match($passwordValidation, $user['password'])) {
            $passwordError = "Password must have at least one numeric value.";
        } elseif (strlen($user['password']) < 6) {
            $passwordError = "Password must have at least 8 characters.";
        } elseif ($user['password'] != $user['confirmPassword']) {
            $confirmPasswordError = "Passwords do not match, please try again.";
        }
        if (!empty($usernameError) or !empty($emailAddressError) or !empty($passwordError) or !empty($confirmPasswordError)) {
            require('src/views/frontend/signup.php');
        }
       if (empty($usernameError) && empty($emailAddressError) && empty($passwordError) && empty($confirmPasswordError)) {
       
        $user['password'] = md5($user['password']);
            $userManager = new UserManager;
            $newUser=$userManager->signup($user);
    
           if ($newUser === false) {
                $error = "The username or email address has been used.";
                require('src/views/frontend/signup.php');
            } else {
                session_start();
                $_SESSION['successmessage'] = "You have successfully signed up.Please login.";
                header('Location:index.php?action=loginpage');
                exit();
            }
        }
    }

    public function currentUser($username, $password)
    {
        /* $password1=md5($password);*/

        $userManager = new userManager;
        $currentUser = $userManager->login($username, $password);


        if ($currentUser === false) {
            $error = "Please enter the correct username and password.";
            require('src/views/frontend/login.php');
        } else {
            session_start();
            if ($currentUser["user_type_id"] == 2) {
                $_SESSION['username'] = $username;
                $_SESSION['id']=$currentUser["id"];
                header('Location:index.php');
            } elseif ($currentUser["user_type_id"] == 1) {
                $_SESSION['user_type_id'] =$currentUser["user_type_id"];
                $_SESSION['username'] = $username;
                $_SESSION['id']=$currentUser["id"];
                $postManager = new PostManager();
                $posts = $postManager->getPosts($keyword);
                require('src/views/backend/dashboard.php');
                
            }
        }
    }
    public function logout()
    {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("location: index.php");
    }
}
