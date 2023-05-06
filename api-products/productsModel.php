<?php

    class productsModelo{
        public $conexion;

        public function __construct(){
            $this->conexion = new mysqli("localhost", "root",'',"api");
            mysqli_set_charset($this->conexion, "utf8");
        }

        public function getProducts($id= null){
            $where = ($id == null)? "": "WHERE id= '$id'";
            $products = [];
            $sql = "SELECT * FROM productos ". $where;
            $registros = mysqli_query($this->conexion, $sql);
            while($row = mysqli_fetch_assoc($registros)){
                array_push($products, $row);
            }
            return $products;

        }
        

        public function saveProducts($nombre, $descripcion, $precio)
        {
            $validar = $this->existsProducts($nombre, $descripcion, $precio);
            $resultado =['error', 'producto ya existe'];
            if(count($validar)==0){
                $sql = "INSERT INTO productos(nombre, descripcion, precio) VALUE('$nombre', '$descripcion', '$precio')";
                mysqli_query($this->conexion, $sql);
                $resultado =['success', 'producto guardado'];
            }
            
            return $resultado;
        }

        public function updateProducts($id, $nombre, $description, $precio)
        {
            $existe = $this->getProducts($id);
            $resultado =['error', 'producto no encontrado'];
            if(count($existe)>0){
                $validar = $this->existsProducts($nombre, $description, $precio);
                $resultado =['error', 'producto ya tiene esas caracteristicas'];
                if(count($validar)==0){
                    $sql = "UPDATE productos SET nombre= '$nombre', descripcion= '$description', precio= '$precio' WHERE id= '$id' ";
                    mysqli_query($this->conexion, $sql);
                    $resultado =['success', 'producto actualizado'];
                }

            }
            return $resultado;

           
        }
        
        public function deleteProducts($id )
        {
            $validar = $this->getProducts($id);
            $resultado =['error', 'producto no encontrado'];
            if(count($validar)>0){
                $sql = "DELETE FROM productos WHERE id='$id' ";
                mysqli_query($this->conexion, $sql);
                $resultado =['success', 'producto eliminado']; 
            }
                return $resultado;
            
        }

        public function existsProducts($nombre, $descripcion, $precio ){
            $products=[];
            $sql = "SELECT * FROM productos WHERE nombre='$nombre' AND descripcion= '$descripcion' AND
            precio= '$precio' ";
            $registros = mysqli_query($this->conexion, $sql);
            while($row = mysqli_fetch_assoc($registros)){
                array_push($products, $row);
            }
            return $products;

        }

    }

?>