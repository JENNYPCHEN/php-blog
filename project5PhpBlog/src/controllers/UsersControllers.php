<?php

namespace App\Controllers;

use App\Controllers;
use App\Models\Database;
use App\Models\UserManager;
use App\Models\PostManager;
use App\Models\CommentManager;
use App\Models\Mails;
use App\Models\Users;
use App\Models\Session;
use \PDO;




class UsersControllers extends GeneralControllers
{

    function newUser($user)
    {
        $usernameError = $emailAddressError = $passwordError = $confirmPasswordError = $error = "";
        $usernameError = $this->UsernameVerification($user['user_name']);
        $emailAddressError = $this->emailVerification($user['email']);
        $passwordError = $this->passwordVerification($user['password']);
        $confirmPasswordError = $this->confirmPasswordVerification($user['password'], $user['confirmPassword']);
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
                Session::set("successmessage", "You have successfully signed up.Please login.");
                header('Location:index.php?action=loginpage');
                exit();
            }
        }
    }

    public function currentUser($user)
    {
        $userManager = new UserManager;
        $currentUser = $userManager->login($user);
        if (empty($currentUser)) {
            $error = "Please enter the correct username and password.";
            require('src/views/frontend/login.php');
        } else {
            $enteredPassword = $user['password'];
            $currentUserPassword = $currentUser->getPassword();
            $error = $this->currentUserPasswordVerification($currentUserPassword, $enteredPassword);
            if (!empty($error)) {
                require('src/views/frontend/login.php');
            } elseif (empty($error) && password_verify($user['password'], $currentUserPassword) == true) {
                $currentUserTypeId = $currentUser->getUserTypeId();
                $currentUsername = $currentUser->getUserName();
                $currentUserId = $currentUser->getId();
                session_start();
                Session::set('user_type_id', $currentUserTypeId);
                Session::set('username', $currentUsername);
                Session::set('id', $currentUserId);
                if ($currentUserTypeId !== 1) {
                    header('Location:index.php');
                } elseif ($currentUserTypeId == 1) {
                    $backendControllers = new BackendControllers();
                    $backendControllers->dashboardPage();
                }
            }
        }
    }
    function logout()
    {
        session_start();
        Session::del('username');
        Session::del('user_type_id');
        Session::del('id');
        session_destroy();
        header("location: index.php");
    }

    function findUserEmail($user)
    {

        $userManager = new UserManager();
        $user = $userManager->findUserEmail($user);
        $userUserName = $user->getUserName();
        $userId = $user->getId();

        if (empty($userUserName) && empty($userId)) {
            session_start();
            Session::set('error', "Email does not exist.");
            header('Location:index.php?action=loginpage');
        } else {
            $user->setResetToken(time() . password_hash($user->getEmail(), PASSWORD_BCRYPT));

            $userManager = new UserManager();
            $UserToken = $userManager->updateToken($user);
            $mail = new Mails();
            $mail = $mail->sendResetPasswordEmail($user);
            header('Location: index.php?action=loginpage');
        }
    }

    function resetPassWordMailVerification($user)
    {
        $userManager = new UserManager;
        $userFromSystem = $userManager->findUserEmail($user);
        $userResetToken = $userFromSystem->getResetToken();
        if (empty($userResetToken)) {
            session_start();
            Session::set('error', "Email does not exist.");
            header('Location:index.php?action=loginpage');
        }
        if (isset($userResetToken) && $userResetToken !== $user['reset_token']) {
            session_start();
            Session::set('error', "Recovery email has been expired.");
            header('Location:index.php?action=loginpage');
        } elseif ($userResetToken == $user['reset_token']) {
            require 'src/views/frontend/resetPassword.php';
        }
    }
    function newPassword($user)
    {

        if (!empty($error = $this->passwordVerification($user['password']))) {
            require 'src/views/frontend/resetPassword.php';
        } elseif (!empty($error = $this->confirmPasswordVerification($user['password'], $user['confirmPassword']))) {
            require 'src/views/frontend/resetPassword.php';
        }
        if (empty($error)) {
            $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
            $userManager = new UserManager();
            $resetUser = $userManager->newPassword($user);
            if (isset($resetUser)) {
                session_start();
                Session::set('successmessage', "Password has been reset successfully.");
                header('Location:index.php?action=loginpage');
            } else {
                $error = "Opps.Something went wrong. Please try again later";
                require 'src/views/frontend/resetPassword.php';
            }
        }
    }
}
