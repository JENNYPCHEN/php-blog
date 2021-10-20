<?php

namespace App\Models;

use App\models\DatabaseManager;



class PostManager extends DatabaseManager
{

    function getPosts($keyword)
    {
        $keyword = $_GET['search'] ?? '';
        $db = $this->dbConnect();

        if (!empty($keyword)) {
            $statement = $db->prepare('SELECT post.id, title, category, chapo, USER.user_name, content, DATE_FORMAT(post.date_create,"%D %b %Y") AS creation_date FROM `post`JOIN  `user`WHERE USER.id = `post`.`user_id`AND content like :keyword GROUP BY post.id
            ORDER BY post.date_create DESC LIMIT 0, 5');
            $statement->bindValue(":keyword", "%$keyword%");
            $statement->execute();
        } else {
            $statement = $db->prepare('SELECT post.id, title, category, chapo, USER.user_name, content, DATE_FORMAT(post.date_create, "%D %b %Y") AS creation_date FROM `post` JOIN `user` WHERE USER.id = `post`.`user_id` GROUP BY post.id ORDER BY post.date_create DESC LIMIT 0, 5');
            $statement->execute();
        }
        return $statement;
    }
    function getPost($postId)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('SELECT post.id, title, category, chapo, USER.user_name, content, DATE_FORMAT(post.date_create, "%D %b %Y") AS creation_date 
    FROM `post` JOIN USER WHERE USER.id = `post`.`user_id` AND post.id=?');
        $statement->execute(array($postId));
        $post = $statement->fetch();
        return $post;
    }
    function deletePost($id)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('DELETE FROM `post` WHERE id= :id');
        $statement->bindValue(':id', $id);
        return $statement->execute();
    }
    function editPost($id, $title, $category, $chapo, $content,$userid)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('UPDATE post SET `title` = :title,`category` = :category, `chapo` = :headline, `content` = :content, `user_id` = :userid,`date_update` = NOW() WHERE `id` = :id');
        $statement->bindValue(':id', $id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':headline', $chapo);
        $statement->bindValue(':content', $content);
        $statement->bindValue(':userid', $userid);
        return $statement->execute();
    }
    function createPost($title, $category, $chapo, $content, $id)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('INSERT INTO `post`( `title`, `category`, `chapo`, `content`, `user_id`, `date_create` ) VALUES( ?, ?, ?, ?, ?, NOW())');
        $post= $statement->execute(array($title, $category, $chapo, $content, $id));
       
    }
}
