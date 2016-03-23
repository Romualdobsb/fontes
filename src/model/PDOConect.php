<?php

namespace ORGANIZACAO\src\model;

use \PDO;

class PDOConect
{
    public function conexao()
    {
        try {

            $hostname = "localhost";
            $dbname = "pessoa";
            $username = "root";
            $pw = "root";

            $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");

        } catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . PHP_EOL;
            exit;
        }

        return $pdo;
    }

}
