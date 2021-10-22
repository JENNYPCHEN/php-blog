<?php

namespace App\Models;

class Comments
{


    private $id;
    private $author;
    private $comment;
    private $comment_creation_date;
    private $valid;
    private $user_id;
    private $post_id;
    

    public function __construct($value = [])
    {
        if (!empty($value)) {

            $this->hydrate($value);
        }
    }

    public function hydrate(array $values)
    {
        foreach ($values as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
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
    public function setComment_creation_date($comment_creation_date)
    {
        $this->comment_creation_date = $comment_creation_date;
    }
    public function getComment_create_date()
    {
        return $this->comment_creation_date;
    }
    public function setPost_id($post_id)
    {
        $post_id= (int) $post_id;
        if ($post_id > 0) {
            $this->postId = $post_id;
        }
    }
    public function getPost_id()
    {
        return $this->post_id;
    }
    
    public function setUser_id($user_id)
    {
        $user_id= (int) $user_id;
        if ($user_id > 0) {
            $this->postId = $user_id;
        }
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
}
