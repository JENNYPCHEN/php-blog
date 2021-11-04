<?php

namespace App\Models;

class Blogs
{
    public function __construct($value = [])
    {
        if (!empty($value)) {

            $this->hydrate($value);
        }
    }
    public function hydrate(array $values)
    {
        foreach ($values as $key => $value) {
            $method = 'set';
            $pieces = explode('_', $key);
            if (strpos($key, '_') !== false) {
                $method = 'set';
                foreach ($pieces as $piece) {
                    $method = $method . ucfirst($piece);
                }
            } else {
                $method = 'set' . ucfirst($key);
            }
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
