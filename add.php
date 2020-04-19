<?php

    include_once 'apiTaskapp.php';
    
    $api = new ApiTaskapp();
    $nombre = '';
    $error = '';

    if(isset($_POST['nombre'])){

        
            $item = array(
                'nombre' => $_POST['nombre']
            );
            $api->add($item);
       
 
        
    }else{
        $api->error('Error al llamar a la API');
    }


    
?>