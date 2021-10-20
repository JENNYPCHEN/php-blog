<?php

namespace App\Models;

use PDO;

require_once 'src\Models\DatabaseManager.php';

class userManager extends databaseManager
{

    public function signup($user)
    {
        $db = $this->dbConnect();
        $user = new Users($user);

        $statement = $db->prepare('INSERT INTO USER( `first_name`, `last_name`, `user_name`, `email`, `password`,`date_create` ) VALUES( :firstName, :lastName, :username, :email, :password ,NOW())');
        $statement->bindValue(':firstName', $user->getFirstName());
        $statement->bindValue(':lastName', $user->getLastName());
        $statement->bindValue(':username', $user->getUsername());
        $statement->bindValue(':email', $user->getEmailAddress());
        $statement->bindValue(':password', $user->getPassword());
        $statement->execute();
        return $statement;
       
    }


    public function login($username, $password)
    {
        $db = $this->dbConnect();
        $statement = $db->query("SELECT * FROM `user` WHERE `user_name` = '$username' AND `password` = '$password'");

        return $statement->fetch();
    }
}
