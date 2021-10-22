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
        $statement->bindValue(':firstName', $user->getFirst_name());
        $statement->bindValue(':lastName', $user->getLast_name());
        $statement->bindValue(':username', $user->getUser_name());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());
        $statement->execute();
        return $statement;
    }


    public function login($username,$password)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare("SELECT * FROM `user` WHERE `user_name`= :username AND `password`= :password");
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
       while( $values=$statement->fetch(PDO::FETCH_ASSOC)){
        $user= new Users($values);
       }
        return$user;
   
    }
}
