<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Models\UserManager;
use App\Models\CommentManager;
use App\Models\Posts;
use App\Models\Comments;
use App\Helpers\Helper;

class BackendControllers
{


    function deletePost($post)
    {

        $postManager = new postManager;
        $post = $postManager->deletePost($post);

        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Post is deleted successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function updatePost($post)
    {
        $fileName = basename($post['image']["name"]);
        $fileTmpPath = $post['image']["tmp_name"];
        $targetFilePath = 'public/img/' . Helper::randomString(8) . '/' . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');
        $error = "";
        if (!empty($fileName) && !empty($fileTmpPath)) {
            if (!in_array($fileType, $allowTypes)) {
                $error = "Sorry, only jpg, png, jpeg, gif, & svg files are allowed to upload.";
                require('src/views/backend/createPost.php');
                exit;
            } else {
                mkdir(dirname(__DIR__ . '/../../' . $targetFilePath));
                move_uploaded_file($fileTmpPath, __DIR__ . '/../../' . $targetFilePath);
                $post['image'] = $targetFilePath;
            }
        }

        $postManager = new postManager;
        $post = new Posts($post);
        $post = $postManager->editPost($post);
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
        $userManager = new UserManager();
        $posts = $postManager->getPosts($keyword);
        $comments = $commentManager->getAllComments();
        $users = $userManager->getUsers();
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
    function newPost($post)
    {
        $fileName = basename($post['image']["name"]);
        $fileTmpPath = $post['image']["tmp_name"];
        $targetFilePath = 'public/img/' . Helper::randomString(8) . '/' . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');
        $error = "";
        if (!empty($fileName) && !empty($fileTmpPath)) {
            if (!in_array($fileType, $allowTypes)) {
                $error = "Sorry, only jpg, png, jpeg, gif, & svg files are allowed to upload.";
                require('src/views/backend/createPost.php');
                exit;
            } else {
                mkdir(dirname(__DIR__ . '/../../' . $targetFilePath));
                move_uploaded_file($fileTmpPath, __DIR__ . '/../../' . $targetFilePath);
                $post['image'] = $targetFilePath;
            }
        }
        $postManager = new PostManager();
        $post = new Posts($post);
        $post = $postManager->createPost($post);
        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Post is added successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function validComment($comment)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->validComment($comment);
        if ($comment === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "comment is validated successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function deleteComment($comment)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->deleteComment($comment);
        if ($comment === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "Comment is deleted successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function deleteUser($user)
    {
        $userManager = new UserManager;
        $user = $userManager->deleteUser($user);
        if ($user === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "User is deleted successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function editUserRole($user)
    {
        $userManager = new UserManager;
        $user = $userManager->editUserRole($user);
        if ($user === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            $_SESSION['success_message'] = "User role is modified successfully";
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
}
