<?php

namespace App\Models;

use \PDO;

class CommentManager extends DatabaseManager
{
    public function getComments($postId)
    {
        $comments=[];
        $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT`id`,`author`,`comment`,DATE_FORMAT(date_create, "%D %b %Y") AS comment_creation_date
    FROM COMMENT WHERE `post_id`=? AND `valid`=true ORDER BY comment_creation_date DESC');
        $statement->execute(array($postId));
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
        $comments[]=new Comments ($values);
        }
        return $comments;
    }

    public function createComment($postId, $author, $comment,$userid)
    {
        $db = $this->dbConnect();
        $statement = $db->PREPARE('INSERT INTO COMMENT (`post_id`, `author`, `comment`, `user_id`, `date_create`) VALUES(?, ?, ?, ?, NOW())');
        $comments = $statement->execute(array($postId, $author, $comment,$userid));
        return $comments;
    }
    public function getAllcomments(){
        $comments=[];
        $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT `id`, `author`, `comment`, DATE_FORMAT(date_create, "%D %b %Y %H:%i") AS comment_creation_date, `valid` FROM COMMENT ORDER BY comment_creation_date DESC');
        $statement->execute();
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
        $comments[]= new comments($values);
        }
        return $comments;

    }
}
