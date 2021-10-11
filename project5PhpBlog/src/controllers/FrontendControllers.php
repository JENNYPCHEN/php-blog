<?php
namespace app\src\controllers;

use app\src\models\postManager;
use app\src\models\databaseManager;

require_once "src/models/postManager.php";
require_once "src/models/databaseManager.php";

class FrontendControllers {
   

    public function listPosts(){
    
        $keyword=$_GET['search']??''; 
        $postManager=new postManager();
        $posts=$postManager->getPosts($keyword);
        require('src/views/frontend/homepage.php');
    }

    public function listAPost(){
        $postManager=new postManager();
        $post = $postManager->getPost($_GET['id']);
        require('src/views/frontend/singlepost.php');

    }

    public function login(){
     echo "hello";
    }

        
}