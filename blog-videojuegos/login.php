<?php

require_once "./includes/conexion.php";

if(isset($_POST)){
    
    $email = trim($_POST["email"]);
    $password = $_POST["contraseña"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";

    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login)== 1){
        
        $usuario = mysqli_fetch_array($login);

        $verify = password_verify($password, $usuario["password"]);

        if($verify){
            $_SESSION["user"]=$usuario; 
        }else{
            $_SESSION["login"] = "Login Incorrecto";
        }
    }else{
        $_SESSION["login"] = "Login Incorrecto";
    }


}

header("location: index.php");