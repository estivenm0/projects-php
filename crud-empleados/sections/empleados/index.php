<?php include("../../templates/header.php"); ?>

<?php
    include("../../bd.php");

    if($_POST){
        print_r($_POST);
        echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
    }

    if(isset($_GET["ID"])){
        $txtID = (isset($_GET['ID'])? $_GET['ID']:"");

        $sentencia = $conexion->prepare("SELECT foto,cv FROM tbl_empleados WHERE id=:id");
        $sentencia->bindParam(":id" , $txtID);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($empleado["foto"]) && $empleado["foto"]!=""){
            if(file_exists("./". $empleado["foto"])){
                unlink("./". $empleado["foto"]);
            }
        }
        if(isset($empleado["cv"]) && $empleado["cv"]!=""){
            if(file_exists("./". $empleado["cv"])){
                unlink("./". $empleado["cv"]);
            }
        }


        $sentencia = $conexion->prepare("DELETE FROM tbl_empleados WHERE id=:id");
        $sentencia->bindParam(":id" , $txtID);
        $sentencia->execute();

        header("location:index.php");
    }
    
    $sentencia = $conexion->prepare("SELECT *, (SELECT nombredelpuesto FROM tbl_puestos WHERE tbl_puestos.id = tbl_empleados.idpuesto  limit 1) as puesto FROM `tbl_empleados` ");
    $sentencia->execute();
    $lista_empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


 <h1 class="display-5 text-bg-secondary text-center"> Empleados</h1>
<div class="card">
   
    <div class="card-header ">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar Empleado</a>

    </div>
    <div class="card-body text-black w-100">
        <?php include("../../templates/nav-table.php");?>


        <div class="table-responsive-sm">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Foto</th>
                        <th scope="col">CV</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Fecha de ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_empleados as $empleado){?>
                    <tr class="">
                        <td scope="row"><?php echo $empleado["nombre"]; ?></td>
                        <td> 
                            <img src="./<?php echo $empleado["foto"]; ?>" alt="" width="40">        
                    </td>
                        <td>
                            <a href=" <?php echo $empleado["cv"]; ?>"> <?php echo $empleado["cv"]; ?></a> 
                        </td>
                        <td> <?php echo $empleado["puesto"]; ?> </td>
                        <td> <?php echo $empleado["fechadeingreso"]; ?> </td>
                        <td>
                        <a  class="btn btn-secondary" href="./carta_recomendacion.php?ID=<?php echo $empleado["id"]; ?>" role="button">Carta</a>
                        <a  class="btn btn-info" href="./editar.php?ID=<?php echo $empleado["id"]; ?>" role="button">Editar</a>
                        <a  class="btn btn-danger" href="javascript:borrar(<?php echo $empleado["id"]; ?>)" role="button">Eliminar</a>
                            
                        </td>
                    </tr>
                    <?php }?>
                   
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>