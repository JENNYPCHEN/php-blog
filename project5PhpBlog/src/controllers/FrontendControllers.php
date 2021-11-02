<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Models\UserManager;
use App\Models\CommentManager;
use App\Models\Comments;

class FrontendControllers
{


    public function listPosts()
    {

        $keyword = $_GET['search'] ?? '';
        $page = $_GET['page'] ?? 1;
        $postManager = new PostManager();
        $number_of_post_results = $postManager->counter($keyword);
        $posts = $postManager->getPosts($keyword, $page);
        $number_of_pages = ceil($number_of_post_results / 5);
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

    public function addComment($comment)
    {
        $commentManager = new CommentManager();
        $comment = new Comments($comment);
        $comments = $commentManager->createComment($comment);
        if ($comments === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Comment is sent successfully. It will be displayed once it is approved.";
            header('Location: index.php?action=post&id=' . $comment->getPostId());
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
