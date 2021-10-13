<?php

namespace App\Models;

use \PDO;

require_once 'src\models\databaseManager.php';

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

    public function createComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $statement = $db->PREPARE('INSERT INTO COMMENT (`post_id`, `author`, `comment`, `date_create`) VALUES(?, ?, ?, NOW())');
        $comments = $statement->execute(array($postId, $author, $comment));
        return $comments;
    }
}
