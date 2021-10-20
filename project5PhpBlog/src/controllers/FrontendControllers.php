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

    public function addComment($postId, $author, $comment,$userid)
    {

        $commentManager = new CommentManager();
        $comments = $commentManager->createComment($postId, $author, $comment,$userid);
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
}
