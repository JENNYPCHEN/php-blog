<?php

namespace App\Models;
use App\Models\Blogs;

class Comments extends Blogs
{
    
    private $id;
    private $author;
    private $comment;
    private $comment_creation_date;
    private $comment_date_create;
    private $valid;
    private $user_id;
    private $post_id;
    public static $counter=0;

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function setAuthor($author)
    {
        if (is_string($author)) {
            $this->author = $author;
        }
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setComment($comment)
    {
        if (is_string($comment)) {
            $this->comment = $comment;
        }
    }
    public function getComment()
    {
        return $this->comment;
    }
    public function setValid($valid)
    {
        $this->valid = $valid;
    }
    public function getValid()
    {
        return $this->valid;
    }
    public function setCommentCreationDate($comment_creation_date)
    {
        $this->comment_creation_date = $comment_creation_date;
    }
    public function getCommentCreateDate()
    {
        return $this->comment_creation_date;
    }
    public function setPostId($post_id)
    {
        $post_id = (int) $post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
        }
    }
    public function getPostId()
    {
        return $this->post_id;
    }

    public function setUserId($user_id)
    {
        $user_id = (int) $user_id;
        if ($user_id > 0) {
            $this->user_id = $user_id;
        }
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    public function setCommentDateCreate($comment_date_create)
    {
        $this->comment_date_create = $comment_date_create;
    }
    public function getCommentDateCreate()
    {
        return $this->comment_date_create;
    }
    public function getCounter(){
        return self::$counter;
    }
}
