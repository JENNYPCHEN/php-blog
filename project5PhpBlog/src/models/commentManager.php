<?php

namespace App\Models;

use \PDO;

class CommentManager extends DatabaseManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT`id`,`author`,`comment`,DATE_FORMAT(date_create, "%D %b %Y") AS comment_creation_date
    FROM COMMENT WHERE `post_id`=? AND `valid`=true ORDER BY comment_creation_date DESC');
        $statement->execute(array($postId));
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT `id`, `author`, `comment`, `valid`, DATE_FORMAT(date_create, "%D %b %Y %H:%i") AS comment_creation_date FROM COMMENT ORDER BY comment_creation_date DESC');
        $statement->execute();
        $statement=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement;

    }
}
