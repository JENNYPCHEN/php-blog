<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\UserManager;
use App\Models\PostManager;
use App\Models\CommentManager;
use App\Models\Mails;
use App\Models\Users;
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
        $passwordValidation = "/^(?=.*?[0-9])[a-zA-Z0-9]{8,}$/";

        if (!preg_match($nameValidation, $user['username'])) {
            $usernameError = "Name can only contain letters and numbers";
        }
        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $emailAddressError = "Please enter the correct format.";
        }
        if (!preg_match($passwordValidation, $user['password'])) {
            $passwordError = "Password must have at least one numeric value.";
        } elseif (strlen($user['password']) < 7) {
            $passwordError = "Password must have at least 8 characters.";
        } elseif ($user['password'] != $user['confirmPassword']) {
            $confirmPasswordError = "Passwords do not match, please try again.";
        }
        if (!empty($usernameError) or !empty($emailAddressError) or !empty($passwordError) or !empty($confirmPasswordError)) {
            require('src/views/frontend/signup.php');
        }
        if (empty($usernameError) && empty($emailAddressError) && empty($passwordError) && empty($confirmPasswordError)) {

            $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
            $userManager = new UserManager;
            $newUser = $userManager->signup($user);
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

    public function currentUser($user)
    {
        $userManager = new UserManager;
        $currentUser = $userManager->login($user);
        $currentUserTypeId = $currentUser->getUserTypeId();
        $currentUserPassword = $currentUser->getPassword();
        $currentUsername = $currentUser->getUserName();
        $currentUserId = $currentUser->getId();

        if (empty($currentUserPassword)) {
            $error = "Please enter the correct username and password.";
            require('src/views/frontend/login.php');
        } elseif (!empty($currentUserPassword)) {
            if (password_verify($user['password'], $currentUserPassword) == false) {
                $error = "Please enter the correct username and password.";
                require('src/views/frontend/login.php');
            } elseif (password_verify($user['password'], $currentUserPassword) == true) {
                session_start();
                $_SESSION['user_type_id'] = $currentUserTypeId;
                $_SESSION['username'] = $currentUsername;
                $_SESSION['id'] = $currentUserId;
                if ($currentUserTypeId !== 1) {
                    header('Location:index.php');
                } elseif ($currentUserTypeId == 1) {
                    $postManager = new PostManager();
                    $commentManager = new CommentManager();
                    $userManager = new UserManager();
                    $posts = $postManager->getPosts($keyword);
                    $comments = $commentManager->getAllComments();
                    $users = $userManager->getUsers();
                    require('src/views/backend/dashboard.php');
                }
            }
        }
    }
    public function logout()
    {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['user_type_id']);
        unset($_SESSION['id']);
        session_destroy();
        header("location: index.php");
    }

    public function findUserEmail($user)
    {
        $userManager = new UserManager();
        $user = $userManager->findUserEmail($user);
        $userUserName = $user->getUserName();
        $userId = $user->getId();
        if (empty($userUserName) && empty($userId)) {
            session_start();
            $_SESSION['error'] = "Email does not exist.";
            header('Location:index.php?action=loginpage');
            exit();
        } else {
            $user->setResetToken(time() . md5($user->getEmail()));
            $userManager = new UserManager();
            $user = $userManager->updateToken($user);
            $mail = new Mails();
            $mail = $mail->sendResetPasswordEmail($user);
        }
    }
}
