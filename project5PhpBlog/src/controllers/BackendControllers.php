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
        $postManager->deletePost($id);
        header('Location: index.php?action=dashboard');
    }
    function dashboardPage()
    {
        $keyword = $_GET['search'] ?? '';
        $postManager = new PostManager();
        $posts = $postManager->getPosts($keyword);
        require('src/views/backend/dashboard.php');
    }
}
