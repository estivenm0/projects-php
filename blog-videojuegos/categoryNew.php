<?php

if(isset($_POST["submit"])){
    require_once "./includes/conexion.php";

    $name = isset($_POST["nombre"])? mysqli_real_escape_string($db, $_POST["nombre"]): false;

    $errors = array();

    if(empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name) ){
         $errors["name"] = "Nombre Inválido";
    }

    if(count($errors) ==0){
   

        $sql = "INSERT INTO categorias VALUES(NULL, '$name')";
        $final = mysqli_query($db, $sql);

        if($final){
          $_SESSION["errors"]["validate"] = "Registro Exitoso";
        }

    }else{ 
          $_SESSION["errors"] = $errors; 
     }
}

    header("location: addCategory.php");


?>