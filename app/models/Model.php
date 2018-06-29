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

    public function equal($value, $campo)
    {
        $this->connection = Bind::get('connection');
        $sql = "SELECT * FROM $this->table WHERE $campo = :$campo";
        $equal = $this->connection->prepare($sql);
        $equal->execute([$campo => $value]);

        if ($equal->rowCount() == 1) {
            return $equal->fetch();
        }

        return false;
    }
}