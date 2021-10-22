<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Models\UserManager;
use App\Models\CommentManager;

class BackendControllers
{


    function deletePost($id)
    {
        $postManager = new postManager;
        $post = $postManager->deletePost($id);
        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Post is deleted successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function updatePost($id, $title, $category, $chapo, $content, $userid)
    {
        $postManager = new postManager;
        $post = $postManager->editPost($id, $title, $category, $chapo, $content, $userid);
        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Post is updated successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function dashboardPage()
    {
        $keyword = $_GET['search'] ?? '';
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $posts = $postManager->getPosts($keyword);
        $comments = $commentManager->getAllComments();
       /*   echo '<pre>';
        echo var_dump($comments);
        echo '</pre>';*/
      require('src/views/backend/dashboard.php');
    }
    function editPage()
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        require('src/views/backend/updatePost.php');
    }
    function newPostPage()
    {
        require('src/views/backend/createPost.php');
    }
    function newPost($title, $category, $chapo, $content, $id)
    {
        $postManager = new PostManager();
        $post = $postManager->createPost($title, $category, $chapo, $content, $id);
        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Post is added successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
}
