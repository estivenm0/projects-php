<?php


if(isset($_POST["submit"])){
     require_once "./includes/conexion.php";


    $name = isset($_POST["nombre"])? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
    $lastname = isset($_POST["apellidos"])? mysqli_real_escape_string($db, $_POST["apellidos"]): false;
    $email = isset($_POST["email"])? mysqli_real_escape_string($db, trim($_POST["email"])): false;

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
    

    if(count($errors) ==0){
        $em ="SELECT id, email FROM usuarios WHERE email = '$email' ";
        $isset_email = mysqli_query($db, $em );
        $isset_user = mysqli_fetch_assoc($isset_email);

       
        if(empty($isset_user) || $isset_user["id"] == $_SESSION["user"]["id"] ){
            $idUser = $_SESSION["user"]["id"];
            // var_dump($idUser);
            // die();
            $sql = "UPDATE usuarios SET nombre= '$name', apellidos= '$lastname', email= '$email' WHERE id='$idUser'";
            $final = mysqli_query($db, $sql);

                if($final){
                $_SESSION["errors"]["validate"] = "Actualización Exitoso";

                unset($_SESSION["user"]);
                $_SESSION["user"]["nombre"] = $name;
                $_SESSION["user"]["apellidos"] = $lastname;
                $_SESSION["user"]["email"] = $email;
                }

        }else{
            $_SESSION["errors"]["email"] = "el email esta vinculado a otra cuenta ";
        }

    }else{ 
          $_SESSION["errors"] = $errors; 
     }

}

header('location: myData.php');

