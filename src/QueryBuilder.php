<?php

namespace App;
use PDO;


class QueryBuilder
{
    protected $conn;

    /**
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findAll($nomTaula) {
        $pdoSt = $this->conn->prepare("SELECT * FROM $nomTaula");
        $pdoSt->execute();
        return $pdoSt->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($nomTaula,$id) {
        $pdoSt = $this->conn->prepare("SELECT * FROM $nomTaula WHERE dni = '$id'");
        $pdoSt->execute();
        return $pdoSt->fetch(PDO::FETCH_OBJ);
    }

    public function insert($table,$parametres){
        $stpdo = $this->conn->prepare(insert($table,$parametres));
        foreach ($parametres as $key => $value){
            $stpdo->bindValue(":$key",$value);
        }
        $stpdo->execute();
    }

    public function login($table,$email,$password){
        $stpdo = $this->conn->prepare("SELECT * FROM $table WHERE email = :email");
        $stpdo->bindValue(":email",$email);
        $stpdo->execute();
        $user = $stpdo->fetch(\PDO::FETCH_OBJ);
        if (password_verify($password,$user->password)) return $user;
        return null;
    }

}