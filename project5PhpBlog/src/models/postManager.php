<?php

namespace App\Models;

use App\models\DatabaseManager;
use PDO;



class PostManager extends DatabaseManager
{

    function getPosts($keyword,$page)
    {
        $posts = [];
        $db = $this->dbConnect();
        $this_page_first_result =($page-1)*5;

       if (!empty($keyword)) {
            $statement = $db->prepare('SELECT post.id, title, image,category, chapo, user_name, content, DATE_FORMAT(post.date_create,"%D %b %Y") AS creation_date FROM `post`JOIN `user`WHERE USER.id = `post`.`user_id`AND content like :keyword GROUP BY post.id ORDER BY post.date_create DESC LIMIT :this_page_first_result, 5');
            $statement->bindValue(":keyword", "%$keyword%");
            $statement->bindValue(":this_page_first_result", $this_page_first_result,PDO::PARAM_INT);
            $statement->execute();
        } else {
            $statement = $db->prepare('SELECT post.id, title, image,category, chapo, user_name, content, DATE_FORMAT(post.date_create, "%D %b %Y") AS creation_date FROM `post` JOIN `user` WHERE USER.id = `post`.`user_id` GROUP BY post.id ORDER BY post.date_create DESC LIMIT :thisPageFirstResult, 5');
            $statement->bindValue(':thisPageFirstResult', $this_page_first_result, PDO::PARAM_INT);
            $statement->execute();
        }
        while ($values = $statement->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Posts($values);
        }
        return $posts;
        echo var_dump($posts);
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
    function editPostAndImage($post)
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
    function editPost($post)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('UPDATE post SET `title` = :title,`category` = :category,`chapo` = :headline, `content` = :content,`date_update` = NOW() WHERE `id` = :id');
        $statement->bindValue(':id', $post->getId());
        $statement->bindValue(':title', $post->getTitle());
        $statement->bindValue(':category', $post->getCategory());
        $statement->bindValue(':headline', $post->getChapo());
        $statement->bindValue(':content', $post->getContent());
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
        $statement->bindValue(':userid', $post->getUserId());
        $statement->bindValue(':image', $post->getImage());
        $post = $statement->execute();
        return $post;
    }
    public function counter($keyword)
    {
        $db = $this->dbConnect();
        $statement = $db->prepare('SELECT COUNT(id) AS counter FROM post WHERE content LIKE :keyword');
        $statement->bindValue(":keyword", "%$keyword%");
        $statement->execute();
        $count = $statement->fetch()[0];
        return $count;    

    }
}
