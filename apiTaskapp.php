<?php

include_once 'taskapp.php';

class ApiTaskapp{

    private $error;


    function getAll(){
        $taskapp = new Taskapp();
        $taskapps = array();
        $taskapps["items"] = array();

        $res = $taskapp->obtenerTaskapps();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "nombre" => $row['nombre'],
                );
                array_push($taskapps["items"], $item);
            }
        
            $this->printJSON($taskapps);
        }else{
            $this->error('No hay elementos');
        }
    }

    function getById($id){
        $taskapp = new Taskapp();
        $taskapps = array();
        $taskapps["items"] = array();

        $res = $taskapp->obtenerTaskapp($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "id" => $row['id'],
                "nombre" => $row['nombre'],
            );
            array_push($taskapps["items"], $item);
            $this->printJSON($taskapps);
        }else{
            $this->error('No hay elementos');
        }
    }

    function add($item){
        $taskapp = new Taskapp();

        $res = $taskapp->nuevaTaskapp($item);
        $this->exito('New Taskapp register');
    }


    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }

    function getError(){
        return $this->error;
    }
}

?>