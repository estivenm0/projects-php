<?php

if(isset($_POST["submit"])){
    require_once "./includes/conexion.php";

    $title = isset($_POST["titulo"])? mysqli_real_escape_string($db, $_POST["titulo"]): false;
    $content = isset($_POST["descripcion"])? mysqli_real_escape_string($db, $_POST["descripcion"]): false;
    $category = isset($_POST["categoria"])? $_POST["categoria"]: false;

    $errors = array();

    if(empty($title)  ){
         $errors["title"] = "Título Inválido";
    }
    if(empty($content) ){
         $errors["content"] = "Contenido Inválido";
    }
    if(empty($category) || !is_numeric($category)){
         $errors["category"] = "Categoría Inválida";
    }

    if(count($errors) ==0){
        $usID = $_SESSION["user"]["id"];
        $pid = $_GET["id"];

        $sql = "UPDATE posts SET categoria_id = $category, titulo = '$title', descripcion= '$content' WHERE id = $pid AND usuario_id = $usID ";
        $final = mysqli_query($db, $sql);

        if($final){
          $_SESSION["errors"]["validate"] = "Registro Exitoso";
        }

    }else{ 
          $_SESSION["errors"] = $errors; 
     }
}
    $location = "location: editPost.php?id=". $pid;
    header($location);


?>