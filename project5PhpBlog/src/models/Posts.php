<?php

namespace App\Models;

class Posts
{

    private $id;
    private $title;
    private $category;
    private $chapo;
    private $user_name;
    private $content;
    private $creation_date;
    private $user_id;
    

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
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setCategory($category)
    {
        if (is_string($category)) {
            $this->category = $category;
        }
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function setChapo($chapo)
    {
        if (is_string($chapo)) {
            $this->chapo = $chapo;
        }
    }
    public function getChapo()
    {
        return $this->chapo;
    }
    public function setUser_name($user_name)
    {
        if (is_string($user_name)) {
            $this->user_name = $user_name;
        }
    }
    public function getUser_name()
    {
        return $this->user_name;
    }
    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setCreation_date($creation_date)
    {
        $this->creation_date = $creation_date;
    }
    public function getCreation_date()
    {
        return $this->creation_date;
    }
    public function setUser_id($user_id)
    {
        $user_id = (int) $user_id;
        if ($user_id > 0) {
            $this->user_id = $user_id;
        }
    }
    public function getUser_id()
    {
        return $this->user_id;
    }

}
