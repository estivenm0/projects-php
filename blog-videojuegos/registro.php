<?php

if(isset($_POST["submit"])){
     require_once "./includes/conexion.php";


    $name = isset($_POST["nombre"])? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
    $lastname = isset($_POST["apellidos"])? mysqli_real_escape_string($db, $_POST["apellidos"]): false;
    $email = isset($_POST["email"])? mysqli_real_escape_string($db, trim($_POST["email"])): false;
    $password = isset($_POST["contraseña"])? mysqli_real_escape_string($db, $_POST["contraseña"]): false;

    $errors = array();

    if(empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name) ){
         $errors["name"] = "Nombre Inválido";
    }
    if(empty($lastname) || is_numeric($lastname) || preg_match("/[0-9]/", $lastname) ){
         $errors["lastname"] = "Apellidos Inválidos";
    }
    if(empty($email) ){
         $errors["email"] = "Email Inválido";
    }
    if(empty($password) ){
         $errors["password"] = "Contraseña Inválida";
    }


    if(count($errors) ==0){
        $passwordSafe = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        $sql = "INSERT INTO usuarios VALUES(NULL, '$name', '$lastname', '$email', '$passwordSafe', CURDATE())";
        $final = mysqli_query($db, $sql);

        if($final){
          $_SESSION["errors"]["validate"] = "Registro Exitoso";
        }

    }else{ 
          $_SESSION["errors"] = $errors; 
     }

    header('location: index.php');
}

var_dump($_POST);