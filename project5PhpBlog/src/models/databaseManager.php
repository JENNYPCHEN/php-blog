<?php

namespace app\Models;

use \PDO;

class DatabaseManager
{
    protected function dbConnect()
    {
        $dbname = $_ENV["DB_NAME"];
        $servername = $_ENV["DB_HOST"];
        $username = $_ENV["DB_USER"];
        $password = $_ENV["DB_PASSWORD"];
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        return $db;
    }

    function pagination($page){
        return ($page-1)*5;
    }
}
