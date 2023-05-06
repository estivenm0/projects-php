<?php

    function CONEX(){
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=my_gallery', "root", "");
            return $conexion ;
        }catch(PDOException $e){
            return false;

        }

    }

?>