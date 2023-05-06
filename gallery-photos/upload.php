<?php
    include("./functions.php");

    $conexion= CONEX();

    
    if(!$conexion){ die(); }

    //new photo
    if($_POST){
       
        $archive = date("his"). $_FILES["photo"]["name"];
        $ruta= "images/". $archive ;

        $title = $_POST["title"];
        $description = $_POST["description"];

        if(!file_exists($ruta)){
            move_uploaded_file($_FILES["photo"]["tmp_name"], $ruta); 
        }

        $sentencia =$conexion->prepare("INSERT INTO photos (id, title, image, description)
                                            VALUES(null, :title, :image, :description)");
        $sentencia->execute(array(
            ':title'=> $title,
            ':image'=> $ruta,
            ':description'=> $description
        ));
    }


    include("./views/upload.view.php");
?>