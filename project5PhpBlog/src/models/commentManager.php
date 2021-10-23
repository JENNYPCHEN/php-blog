<?php

namespace App\Models;

use \PDO;

class CommentManager extends DatabaseManager
{
    public function getComments($postId)
    {
        $comments = [];
        $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT`id`,`author`,`comment`,DATE_FORMAT(date_create, "%D %b %Y") AS comment_creation_date
    FROM COMMENT WHERE `post_id`=? AND `valid`=true ORDER BY comment_creation_date DESC');
        $statement->execute(array($postId));
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comments($values);
        }
        return $comments;
    }


    public function createComment($comment)
    {
        $db = $this->dbConnect();
        $statement = $db->PREPARE('INSERT INTO COMMENT (`post_id`, `author`, `comment`, `user_id`, `date_create`) VALUES(:postId, :author, :comment, :userId, now())');
        $statement->bindValue(':postId', $comment->getPost_id());
        $statement->bindValue(':author', $comment->getAuthor());
        $statement->bindValue(':comment', $comment->getComment());
        $statement->bindValue(':userId', $comment->getUser_id());
        $comment = $statement->execute();
        return $comment;
    }
    public function getAllcomments()
    {
        $comments = [];
        $db = $this->dbConnect();
        $statement = $db->PREPARE('SELECT `id`, `author`, `comment`,`user_id`, DATE_FORMAT(date_create, "%D %b %Y %H:%i") AS comment_creation_date, `valid` FROM COMMENT ORDER BY comment_creation_date DESC');
        $statement->execute(array());
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comments($values);
        }
        return $comments;
    }
    function validComment($comment){
        $db=$this->dbConnect();
        $comment=new Comments($comment);
        $statement=$db->prepare('UPDATE COMMENT SET `valid` = 1 WHERE id = :id');
        $statement->bindValue(':id',$comment->getId());
        return $statement->execute();

    }
    function deleteComment($comment){
        $db=$this->dbConnect();
        $comment=new Comments($comment);
        $statement=$db->PREPARE ('DELETE FROM COMMENT WHERE id= :id');
        $statement->bindValue(':id',$comment->getId());
        return $statement->execute();
    }
}
