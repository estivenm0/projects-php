<?php

require_once "./includes/conexion.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $userID = $_SESSION["user"]["id"];
    $sql = "DELETE FROM posts WHERE id=$id AND usuario_id = $userID ";
    mysqli_query($db, $sql);
}
header("location: index.php");


?>