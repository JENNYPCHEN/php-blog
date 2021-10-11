<?php

namespace app\src\models;

use \PDO;

class databaseManager
{

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=p5phpblog;', 'root', 'mysql');
        return $db;
    }
}
