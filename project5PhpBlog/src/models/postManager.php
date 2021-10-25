<?php

namespace App\Models;

use App\models\DatabaseManager;
use PDO;



class PostManager extends DatabaseManager
{

    function getPosts($keyword)
    {
        $posts = [];
        $keyword = $_GET['search'] ?? '';
        $db = $this->dbConnect();

        if (!empty($keyword)) {
            $statement = $db->prepare('SELECT post.id, title, image,category, chapo, user_name, content, DATE_FORMAT(post.date_create,"%D %b %Y") AS creation_date FROM `post`JOIN  `user`WHERE USER.id = `post`.`user_id`AND content like :keyword GROUP BY post.id
            ORDER BY post.date_create DESC LIMIT 0, 5');
            $statement->bindValue(":keyword", "%$keyword%");
            $statement->execute();
        } else {
            $statement = $db->prepare('SELECT post.id, title, image,category, chapo, user_name, content, DATE_FORMAT(post.date_create, "%D %b %Y") AS creation_date FROM `post` JOIN `user` WHERE USER.id = `post`.`user_id` GROUP BY post.id ORDER BY post.date_create DESC LIMIT 0, 5');
            $statement->execute();
        }
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Posts($values);
        }
        return $posts;
    }

    function getPost($postId)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('SELECT post.id, image,title, category, chapo, USER.user_name, content,  DATE_FORMAT(post.date_create, "%D %b %Y") AS creation_date 
    FROM `post` JOIN USER WHERE USER.id = `post`.`user_id` AND post.id=?');
        $statement->execute(array($postId));
        $values = $statement->fetch(PDO::FETCH_ASSOC);
        $post = new Posts($values);
        return $post;
    }
    function deletePost($post)
    {
        $post = new Posts($post);

        $db = $this->dbConnect();
        $statement = $db->prepare('DELETE FROM `post` WHERE id= :id');
        $statement->bindValue(':id', $post->getId());
        return $statement->execute();
    }
    function editPost($post)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('UPDATE post SET `title` = :title,`category` = :category,`image` = :img,`chapo` = :headline, `content` = :content,`date_update` = NOW() WHERE `id` = :id');
        $statement->bindValue(':id', $post->getId());
        $statement->bindValue(':title', $post->getTitle());
        $statement->bindValue(':category', $post->getCategory());
        $statement->bindValue(':headline', $post->getChapo());
        $statement->bindValue(':content', $post->getContent());
        $statement->bindValue(':img', $post->getImage());
        return $statement->execute();
    }
    function createPost($post)
    {
        $db = $this->dbConnect();
        
        $statement = $db->prepare('INSERT INTO `post`( `title`, `category`, `chapo`, `content`, `user_id`,  `image`,`date_create` ) VALUES( :title, :category, :chapo, :content, :userid, :image, NOW())');
        $statement->bindValue(':title', $post->getTitle());
        $statement->bindValue(':category', $post->getCategory());
        $statement->bindValue(':chapo', $post->getChapo());
        $statement->bindValue(':content', $post->getContent());
        $statement->bindValue(':userid', $post->getUser_id());
        $statement->bindValue(':image', $post->getImage());
        $post=$statement->execute();
        return$post;
    }

}
