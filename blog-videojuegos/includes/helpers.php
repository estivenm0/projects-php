<?php

function showErrors(){
    if(isset($_SESSION["errors"])){
        foreach ($_SESSION["errors"] as $key => $value) {
            echo " <li class='alert alert-primary m-0 p-0'>$value</li> ";
        }
    }
    $_SESSION["errors"]= null;
}

function getCategories(){
    global $db;
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categories = mysqli_query($db, $sql);

    $result = array();
    if($categories && mysqli_num_rows($categories) >= 1){
        $result = $categories;
    }
    return $result;
}

function getPostsRecents(){
    global $db;
    $sql = "SELECT p.fecha, p.id, p.descripcion, p.titulo, c.nombre AS 'categoria' FROM posts p
    INNER JOIN categorias c ON c.id= p.categoria_id ORDER BY p.id  DESC LIMIT 5 ";
    $posts = mysqli_query($db, $sql);

    $result = array();
    if($posts && mysqli_num_rows($posts) >= 1){
        $result = $posts;
    }
    return $result;

}

function getPosts(){
    global $db;
    $sql = "SELECT p.fecha, p.id, p.descripcion, p.titulo, c.nombre AS 'categoria' FROM posts p
    INNER JOIN categorias c ON c.id= p.categoria_id ORDER BY p.id   ";
    $posts = mysqli_query($db, $sql);

    $result = array();
    if($posts && mysqli_num_rows($posts) >= 1){
        $result = $posts;
    }
    return $result;

}

function getCategory($id){
    global $db;
    $sql = "SELECT * FROM categorias WHERE id=$id";
    $categories = mysqli_query($db, $sql);

    $result = array();
    if($categories && mysqli_num_rows($categories) >= 1){
        $result = mysqli_fetch_assoc($categories);
    }
    return $result;
}

function getPostsCategory($id){
    global $db;
    $sql = "SELECT p.fecha, p.id, p.descripcion, p.titulo, c.nombre AS 'categoria' FROM posts p
    INNER JOIN categorias c ON c.id= p.categoria_id WHERE p.categoria_id ='$id' ";
    $postsC = mysqli_query($db, $sql);

    $result = array();
    if($postsC && mysqli_num_rows($postsC) >= 1){
        $result = $postsC;
    }
    return $result;
}

function getPost($id){
    global $db;
    $sql = "SELECT p.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS 'creador' FROM posts p INNER JOIN categorias c ON c.id= p.categoria_id INNER JOIN usuarios u ON u.id = p.usuario_id  WHERE p.id= $id";
    $p = mysqli_query($db, $sql);

    $result = array();
    if($p && mysqli_num_rows($p)==1){
        $result = mysqli_fetch_assoc($p);
    }
    return $result;
}

function searchPost($search){
    global $db;
    $sql = "SELECT p.* , c.nombre AS 'categoria'  FROM posts p INNER JOIN categorias c ON c.id = p.categoria_id INNER JOIN usuarios u ON u.id = p.usuario_id WHERE p.titulo LIKE '%$search%' ORDER BY p.id ASC";
    $pS = mysqli_query($db, $sql);

    $result = array();
    if($pS && mysqli_num_rows($pS) >= 1){
        $result = $pS;
    }
    return $result;
    


}