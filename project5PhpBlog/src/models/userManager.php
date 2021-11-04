<?php

namespace App\Models;

use PDO;

class userManager extends databaseManager
{

    public function signup($user)
    {
        $db = $this->dbConnect();
        $user = new Users($user);
        $statement = $db->prepare('INSERT INTO USER( `first_name`, `last_name`, `user_name`, `email`, `password`,`date_create` ) VALUES( :firstName, :lastName, :username, :email, :password ,NOW())');
        $statement->bindValue(':firstName', $user->getFirstName());
        $statement->bindValue(':lastName', $user->getLastName());
        $statement->bindValue(':username', $user->getUserName());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());
        $statement->execute();
    }


    public function login($user)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare("SELECT * FROM `user` WHERE `user_name`= :username");
        $statement->bindValue(':username', $user['username']);
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $currentUser = new Users($values);
        }
        return $currentUser;
    }
    public function getUsers($userPage)
    {
        $users = [];
        $db = $this->dbConnect();
        $this_page_first_result =($userPage-1)*5;
        $statement = $db->PREPARE('SELECT * FROM USER ORDER BY date_create DESC LIMIT :thisPageFirstResult, 5;');
        $statement->bindValue(':thisPageFirstResult', $this_page_first_result, PDO::PARAM_INT);
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new Users($values);
        }
        return $users;
    }
    public function deleteUser($user)
    {
        $user = new Users($user);
        $db = $this->dbConnect();
        $statement = $db->PREPARE('DELETE FROM user Where id=:id');
        $statement->bindValue(':id', $user->getId());
        return $statement->execute();
    }
    public function editUserRole($user)
    {
        $db = $db = $this->dbConnect();
        $user = new Users($user);
        $statement = $db->PREPARE('SELECT * FROM user Where id=:id');
        $statement->bindValue(':id', $user->getId());
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $user = new Users($values);
        }
        if ($user->getUserTypeId() !== 1) {
            $statement = $db->PREPARE('UPDATE USER SET user_type_id = :user_type_id WHERE id = :id');
            $statement->bindValue(':id', $user->getId());
            $statement->bindValue(':user_type_id', 1);
        } elseif ($user->getUserTypeId() == 1) {
            $statement = $db->PREPARE('UPDATE user SET user_type_id =:user_type_id Where id=:id');
            $statement->bindValue(':id', $user->getId());
            $statement->bindValue(':user_type_id', 2);
        }
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $user = new Users($values);
            return $user;
        }
    }
    function findUserEmail($user)
    {
        $user = new Users($user);
        $db = $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT * FROM `user` WHERE `email` =:email');
        $statement->bindValue(':email', $user->getEmail());
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $user = new Users($values);
        }
        return $user;
    }
    function updateToken($user)
    {
         $db = $db = $this->dbConnect();
        $statement = $db->PREPARE('UPDATE user set `reset_token`=:reset_token WHERE `email`=:email');
        $statement->bindValue(':reset_token', $user->getResetToken());
        $statement->bindValue(':email', $user->getEmail());
        $statement->execute();
    }
    function newPassword($user){
        $db = $db = $this->dbConnect();
        $user=new Users($user);
        $statement= $db->PREPARE('UPDATE user set `password`=:password WHERE `email`=:email AND `reset_token`=:reset_token');
        $statement->bindValue(':reset_token', $user->getResetToken());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $user = new Users($values);
        }
        return $user;
    }
    public function counter()
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('SELECT COUNT(id) as counter FROM user');
        $statement->execute();
        $count = $statement->fetch()[0];
        return $count;
    }
}
