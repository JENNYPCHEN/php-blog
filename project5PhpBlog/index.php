<?php

use app\src\controllers\UsersControllers;
use app\src\controllers\FrontendControllers;
use app\src\controllers\BackendControllers;

require_once  __DIR__ . "/vendor/autoload.php";
require_once "src/controllers/FrontendControllers.php";
require_once "src/controllers/BackendControllers.php";


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'login') {
            $FrontControllers = new FrontendControllers();
            $FrontControllers->login();
        } elseif ($_GET['action'] == 'search') {
            $FrontendControllers = new FrontendControllers();
            $FrontendControllers->listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $FrontendControllers = new FrontendControllers();
                $FrontendControllers->listAPost();
            }
        }
    } else {
        $FrontendControllers = new FrontendControllers();
        $FrontendControllers->listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
