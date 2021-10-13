<?php

namespace app\Models;

use \PDO;

class DatabaseManager
{

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=p5phpblog;', 'root', 'mysql');
        return $db;
    }
}
