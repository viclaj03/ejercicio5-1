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

    public function insertAlumne($nomTaula,$datos) {
        $pdoSt = $this->conn->prepare("insert into $nomTaula  (dni,Nom,DataDeNaixement,Sexe,Hobby,Foto) VALUES (?,?,?,?,?,?)");
        $pdoSt->bindValue(1,$datos->dni);
        $pdoSt->bindValue(2,$datos->nom);
        $pdoSt->bindValue(3,$datos->dataNaiximent);
        $pdoSt->bindValue(4,$datos->sexe);
        $pdoSt->bindValue(5,$datos->hobby);
        $pdoSt->bindValue(6,$datos->foto);
        $pdoSt->execute();
        return $pdoSt;
    }
}