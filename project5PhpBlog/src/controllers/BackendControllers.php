<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Models\UserManager;
use App\Models\CommentManager;
use App\Models\Posts;
use App\Models\Comments;
use App\Helpers\Helper;
use App\Models\Session;

class BackendControllers extends GeneralControllers
{


    function deletePost($post)
    {

        $postManager = new postManager;
        $post = $postManager->deletePost($post);

        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            Session::set('success_message',"Post is deleted successfully");
            header('Location: index.php?action=dashboard');
            exit();
        }
    }
    function NewOrUpdatePost($post)
    {
        $fileName = basename($post['image']["name"]);
        $fileTmpPath = $post['image']["tmp_name"];
        $targetFilePath = 'public/img/' . Helper::randomString(8) . '/' . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');
        if (!empty($fileName) && !empty($fileTmpPath)) {
            if (!empty($error = $this->imageVerification($fileType, $allowTypes))) {
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
        $id = ($post->getId());
        $haveImage = is_string($post->getImage());

        if (!empty($id) && !$haveImage) {
            $post = $postManager->editPost($post);
        } elseif (!empty($id) && $haveImage) {
            $post = $postManager->editPostAndImage($post);
        }
        if (empty($id)) {
            $post = $postManager->createPost($post);
        }
        if ($post === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            Session::set('success_message', "Post is updated successfully");
            header('Location: index.php?action=dashboard');
        }
    }
    function dashboardPage()
    {
        $keyword = $_GET['search'] ?? '';
        $page = $_GET['page'] ?? 1;
        $commentPage = $_GET['commentPage'] ?? 1;
        $userPage = $_GET['userPage'] ?? 1;

        $postManager = new PostManager();
        $number_of_post_results = $postManager->counter($keyword);

        $commentManager = new CommentManager();
        $number_of_comment_results = $commentManager->counter();

        $userManager = new UserManager();
        $number_of_user_results = $userManager->counter();

        $posts = $postManager->getPosts($keyword, $page);
        $number_of_pages = ceil($number_of_post_results / 5);
        $comments = $commentManager->getAllComments($commentPage);
        $number_comment_pages = ceil($number_of_comment_results / 5);
        $users = $userManager->getUsers($userPage);
        $number_user_pages = ceil($number_of_user_results / 5);
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

    function validComment($comment)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->validComment($comment);
        if ($comment === false) {
            echo 'Server problem.Please try again later';
        } else {
            session_start();
            Session::set('success_message',"comment is validated successfully");
            header('Location: index.php?action=dashboard');
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
            Session::set('success_message',"Comment is deleted successfully");
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
            Session::set('success_message',"User is deleted successfully");
            header('Location: index.php?action=dashboard');
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
            Session::set('success_message',"User role is modified successfully");
            header('Location: index.php?action=dashboard');
        }
    }
}
