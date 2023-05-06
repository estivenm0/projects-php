<?php

    include("./functions.php");

    $conexion = CONEX();
    
    //details photo
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $statement = $conexion->prepare("SELECT * FROM photos  WHERE id=:id");

        $statement->execute(array(":id"=>$id));

        $photo = $statement->fetch();
    }

    include("./views/photo.view.php");
?>