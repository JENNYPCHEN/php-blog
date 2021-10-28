<?php
session_start();
require_once  __DIR__ . "/vendor/autoload.php";


use App\Controllers\UsersControllers;
use App\Controllers\FrontendControllers;
use App\Controllers\BackendControllers;
use App\Controllers\MailControllers;

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'loginpage') {
            $FrontControllers = new FrontendControllers();
            $FrontControllers->loginPage();
        } elseif ($_GET['action'] == 'signuppage') {
            $FrontControllers = new FrontendControllers();
            $FrontControllers->signupPage();
        } elseif ($_GET['action'] == 'dashboard' && $_SESSION['user_type_id'] == 1) {
            $BackendControllers = new BackendControllers();
            $BackendControllers->dashboardPage();
        } elseif ($_GET['action'] == 'editPage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $BackendControllers = new BackendControllers();
                $BackendControllers->editPage();
            }
        } elseif ($_GET['action'] == 'newPostPage') {
            $BackendControllers = new BackendControllers();
            $BackendControllers->newPostPage();
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
                $comment = [
                    'post_id' => $_GET['id'],
                    'author' => trim($_POST['author']),
                    'comment' => trim($_POST['comment']),
                    'user_id' => $_SESSION['id'],
                ];
                $FrontendControllers = new FrontendControllers();
                $FrontendControllers->addComment($comment);
            }
        } elseif ($_GET['action'] == 'signup') {
            if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['emailAddress']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user = [
                    'first_name' => trim($_POST['firstName']),
                    'last_name' => trim($_POST['lastName']),
                    'user_name' => trim($_POST['username']),
                    'email' => trim($_POST['emailAddress']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword'])
                ];

                $usersControllers = new UsersControllers();
                $usersControllers->newUser($user);
            }
        } elseif ($_GET['action'] == 'login') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                ];
                $UsersControllers = new UsersControllers();
                $UsersControllers->currentUser($user);
            }
        } elseif ($_GET['action'] == 'logout') {
            $UsersControllers = new UsersControllers();
            $UsersControllers->logout();
        } elseif ($_GET['action'] == 'deletePost') {
            $post = [
                'id' => $_GET['id'],
            ];
            $BackendControllers = new BackendControllers();
            $BackendControllers->deletePost($post);
        } elseif ($_GET['action'] == 'updatePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $post = [
                    'id' => $_GET['id'],
                    'title' => htmlspecialchars($_POST['title']),
                    'category' => htmlspecialchars($_POST['category']),
                    'chapo' => htmlspecialchars($_POST['chapo']),
                    'content' => $_POST['content'],
                    'image' => $_FILES['image'] ?? '',
                ];
                $BackendControllers = new BackendControllers;
                $BackendControllers->NewOrUpdatePost($post);
            }
        } elseif ($_GET['action'] == 'createPost') {
            $post = [
                'title' => htmlspecialchars($_POST['title']),
                'category' => htmlspecialchars($_POST['category']),
                'chapo' => htmlspecialchars($_POST['chapo']),
                'content' => $_POST['content'],
                'user_id' => $_SESSION['id'],
                'image' => $_FILES["image"] ?? '',
            ];
            $BackendControllers = new BackendControllers();
            $BackendControllers->NewOrUpdatePost($post);
        } elseif ($_GET['action'] == 'validComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comment = [
                    'id' => $_GET['id'],
                ];
                $BackendControllers = new BackendControllers();
                $BackendControllers->validComment($comment);
            }
        } elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comment = [
                    'id' => $_GET['id'],
                ];
                $BackendControllers = new BackendControllers();
                $BackendControllers->deleteComment($comment);
            }
        } elseif ($_GET['action'] == 'deleteUser') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $user = [
                    'id' => $_GET['id'],
                ];
                $BackendControllers = new BackendControllers();
                $BackendControllers->deleteUser($user);
            }
        } elseif ($_GET['action'] == 'editUserRole') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $user = [
                    'id' => $_GET['id'],
                ];
            }
            $BackendControllers = new BackendControllers();
            $BackendControllers->editUserRole($user);
        } elseif ($_GET['action'] == 'contact') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $mail = [
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'subject' => trim($_POST['subject']),
                'message' => trim($_POST['message'])
            ];
            $MailControllers = new MailControllers();
            $MailControllers->sendMail($mail);
        } elseif ($_GET['action'] == 'resetPassword') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $user = ['email' => trim($_POST['email'])];
            $userControllers = new UsersControllers();
            $userControllers->findUserEmail($user);
        } elseif ($_GET['action'] == 'resetPasswordMail') {
            if (isset($_GET['email']) && (isset($_GET['reset_token']))) {
                $user = [
                    'email' => $_GET['email'],
                    'reset_token' => $_GET['reset_token']
                ];
                $userControllers = new UsersControllers();
                $userControllers->resetPassWordMailVerification($user);
            }
        } elseif ($_GET['action'] == 'newPassword') {
            if (isset($_POST['email']) && isset($_POST['reset_token']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user=[
                    'email'=>trim($_POST['email']),
                    'reset_token'=>trim($_POST['reset_token']),
                    'password'=>trim($_POST['password']),
                    'confirmPassword'=>trim($_POST['confirmPassword'])
                ];
                $usersController=new UsersControllers();
                $usersController->newPassword($user);
            }
        }
    } else {
        $FrontendControllers = new FrontendControllers();
        $FrontendControllers->listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
