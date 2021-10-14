<?php 

namespace App\Models;

require_once 'src\Models\DatabaseManager.php';

class userManager extends databaseManager{

    public function signup($firstName, $lastName, $username, $emailAddress, $password){

        $db = $this->dbConnect();
        $statement = $db->PREPARE('INSERT INTO USER( `first_name`, `last_name`, `user_name`, `email`, `password`, `date_create` ) VALUES( ?, ?, ?, ?, ?, NOW())');
        $newUser = $statement->execute(array($firstName, $lastName, $username, $emailAddress, $password));
        return $newUser;
    }

   
    public function login(){

    }
}