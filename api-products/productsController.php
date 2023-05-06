<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    header('content-type: application/json; charset.utf-8');

    include("./productsModel.php");

    $productsModel = new productsModelo();
    
    // Recibe la petición, atiende según el método, verifica que los datos recibidos estén completos y no estén vacíos, llama al modelo y devuelve la respuesta.

    switch($_SERVER['REQUEST_METHOD']){

        case "GET":
            $res = $productsModel->getProducts();
            echo  json_encode($res);
        break;

        case "POST":
            $__POST = json_decode(file_get_contents("php://input", true));

            if(!isset($__POST->nombre) || is_null($__POST->nombre) || empty(trim($__POST->nombre))){
                $res= ["error", "nombre vacío"];

            }else if(!isset($__POST->descripcion) || is_null($__POST->descripcion) || empty(trim($__POST->descripcion))){
                $res= ["error", "descripcion vacía"];

            }else if(!isset($__POST->precio) || is_null($__POST->precio) || empty(trim($__POST->precio)) || !is_numeric($__POST->precio)){
                $res= ["error", "precio vacío"];

            }else{
                $res = $productsModel->saveProducts($__POST->nombre, $__POST->descripcion, $__POST->precio);
            }

            echo  json_encode($res);
        break;

        case "PUT":
            $_PUT = json_decode(file_get_contents("php://input", true));
            
            if(!isset($_PUT->id) || is_null($_PUT->id) || empty(trim($_PUT->id))){
                $res= ["error", "id vacío"];

            }else if(!isset($_PUT->nombre) || is_null($_PUT->nombre) || empty(trim($_PUT->nombre))){
                $res= ["error", "nombre vacío"];

            }else if(!isset($_PUT->descripcion) || is_null($_PUT->descripcion) || empty(trim($_PUT->descripcion))){
                $res= ["error", "descripcion vacía"];

            }else if(!isset($_PUT->precio) || is_null($_PUT->precio) || empty(trim($_PUT->precio)) || !is_numeric($_PUT->precio)){
                $res= ["error", "precio vacío"];

            }else{
                $res = $productsModel->updateProducts($_PUT->id,$_PUT->nombre, $_PUT->descripcion, $_PUT->precio);
            }
           
            echo  json_encode($res);
        break;

        case "DELETE":
            $_DELETE= json_decode(file_get_contents("php://input", true));
            if(!isset($_DELETE->id) || is_null($_DELETE->id) || empty(trim($_DELETE->id))){
                $res = ["error", "id vacío"];
            }else{
                $res = $productsModel->deleteProducts($_DELETE->id);
            }
            
            echo  json_encode($res);
        break;
    }

?>