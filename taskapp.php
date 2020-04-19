<?php

include_once 'db.php';

class Taskapp extends DB{
    
   function obtenerTaskapps(){
        $query = $this->connect()->query('SELECT * FROM taskapp');
        return $query;
    }

    function obtenerTaskapp($id){
        $query = $this->connect()->prepare('SELECT * FROM taskapp WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function nuevaTaskapp($taskapp){
        $query = $this->connect()->prepare('INSERT INTO taskapp (nombre) VALUES (:nombre)');
        $query->execute(['nombre' => $taskapp['nombre']]);
        return $query;
    }

}

?>