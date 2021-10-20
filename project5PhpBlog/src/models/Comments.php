<?php

namespace App\Models;

class Comments
{


    private $id;
    private $author;
    private $comment;
    private $dateCreate;
    private $valid;
    private $userId;
    private $postId;
    

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
        if (is_bool($valid)) {
            $this->valid = $valid;
        }
    }
    public function getValid($valid)
    {
        return $this->valid;
    }
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }
    public function getDateCreate()
    {
        return $this->dateCreate;
    }
    public function setPostId($postId)
    {
        $postId = (int) $postId;
        if ($postId > 0) {
            $this->postId = $postId;
        }
    }
    public function getPostId()
    {
        return $this->postId;
    }
    public function setUserId($userId)
    {
        $userId = (int) $userId;
        if ($userId > 0) {
            $this->postId = $userId;
        }
    }
    public function getUserId()
    {
        return $this->userId;
    }
}
