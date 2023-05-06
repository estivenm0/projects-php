<?php
    include("./functions.php"); //connexion to database

    $photos_pg = 8; //number of photos per page

    $page =  (isset($_GET["pg"]))? $_GET["pg"] : 1; //current page

    $init =  ($page> 1)? $page * $photos_pg -$photos_pg: 0; //index photos

    $conexion = CONEX();
    $statement = $conexion->prepare("SELECT COUNT(*) as total FROM photos");
    $statement->execute();
    $count = $statement->fetch()[0];


    $statement = $conexion->prepare("SELECT * FROM photos LIMIT $init, $photos_pg");
    $statement->execute();
    $photos = $statement->fetchAll(PDO::FETCH_ASSOC);


    if(!$photos){
        header("location:index.php");
    }

    include("./views/index.view.php");
?>