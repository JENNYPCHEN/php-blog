<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Models\UserManager;
use App\Models\CommentManager;


class FrontendControllers
{


    public function listPosts()
    {

        $keyword = $_GET['search'] ?? '';
        $postManager = new PostManager();
        $posts = $postManager->getPosts($keyword);
        require('src/views/frontend/homepage.php');
    }

    public function listAPost()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        require('src/views/frontend/singlepost.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->createComment($postId, $author, $comment);
        if ($comments === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Comment is sent successfully. It will be displayed once it is approved.";
            header('Location: index.php?action=post&id=' . $postId);
            exit();
        }
    }

    public function loginPage()
    {
        require('src/views/frontend/login.php');
    }
    public function signupPage()
    {
        require('src/views/frontend/signup.php');
    }
    /* $data = [
            'firstName' => '',
            'lastName' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

            
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            require('src/views/frontend/signup.php');
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0-7}|[^a-z]*|[^\d]*)$/i";
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter your name.";
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = "Name can only contain letters and numbers";
            }
            if (empty($data['email'])) {
                $data['emailAddressError'] = "Please enter your email.";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailAddressError'] = "Please enter the correct format.";
            }
            if (empty($data['password'])) {
                $data['passwordError'] = "Please enter password.";
            } else if (!preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = "Password must have at least one numeric value.";
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = "Password must have at least 8 characters.";
            }
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = "Please enter password ";
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = "Passwords do not match, please try again.";
                }
            }
            if (empty($data['usernameError']) && empty($data['emailAddressError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);


                /*$userManager = new userManager();
                $newUser = $userManager->signup();*/
}
