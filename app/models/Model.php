<?php

namespace app\models;

use app\src\Bind;

class Model
{
    private $connection;

    public function all()
    {
        $this->connection = Bind::get('connection');
        $sql = "SELECT * FROM $this->table";
        $livros = $this->connection->prepare($sql);
        $livros->execute();

        return $livros->fetchAll();
    }
}