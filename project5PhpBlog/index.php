<?php
require_once  __DIR__ . "/vendor/autoload.php";

use App\controllers\UsersControllers;
use App\controllers\FrontendControllers;
use App\controllers\BackendControllers;




try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'loginpage') {
            $FrontControllers = new FrontendControllers();
            $FrontControllers->loginPage();
        } elseif ($_GET['action'] == 'signuppage') {
            $FrontControllers = new FrontendControllers();
            $FrontControllers->signupPage();
        } elseif ($_GET['action'] == 'search') {
            $FrontendControllers = new FrontendControllers();
            $FrontendControllers->listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $FrontendControllers = new FrontendControllers();
                $FrontendControllers->listAPost();
            }
        } elseif ($_GET['action'] == 'leavecomment') {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $FrontendControllers = new FrontendControllers();
                $FrontendControllers->addComment($_GET['id'], trim($_POST['author']), trim($_POST['comment']));
            }
        } elseif ($_GET['action'] == 'signup') {
            if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['username']) && !empty($_POST['emailAddress']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $UsersControllers = new UsersControllers();
                $UsersControllers->newUser(trim($_POST['firstName']), trim($_POST['lastName']), trim($_POST['username']), trim($_POST['emailAddress']), trim($_POST['password']), trim($_POST['confirmPassword']));
            }
        } elseif ($_GET['action'] == 'login') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $UsersControllers = new UsersControllers();
                $UsersControllers->currentUser(trim($_POST['username']), trim($_POST['password']));
            }
        } elseif ($_GET['action'] == 'logout') {
        
                $UsersControllers = new UsersControllers();
                $UsersControllers->logout();
            
        }
    } else {
        $FrontendControllers = new FrontendControllers();
        $FrontendControllers->listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
