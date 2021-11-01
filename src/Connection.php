<?php

namespace App;

use PDO;
use PDOException;

class Connection
{
    public static function make($dataBase) {
        try {
            return new PDO("mysql:host=localhost;port=3306;dbname=$dataBase", 'batoi', '1234');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}