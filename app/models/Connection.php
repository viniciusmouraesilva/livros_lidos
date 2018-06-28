<?php

namespace app\models;

use app\src\Bind;

class Connection
{
    public function connect()
    {
        $config = (object) Bind::get('config_db')->database;
        $pdo = new \PDO("mysql:host=$config->host;dbname=$config->dbname;charset=$config->charset", $config->user, $config->password, $config->options);
        return $pdo;
    }
}