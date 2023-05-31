<?php include("../../templates/header.php"); ?>

<?php
    include("../../bd.php");

    if(isset($_GET["ID"])){

        $txtID = (isset($_GET['ID'])? $_GET['ID']:"");

        $sentencia = $conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

        header("location:index.php");
    }
    

    $sentencia = $conexion->prepare("SELECT * FROM `tbl_usuarios`");
    $sentencia->execute();
    $lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>



<h1 class="display-5 text-center text-bg-secondary"> Usuarios</h1>
<div class="card">
   
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar Puesto
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_usuarios as $usuario){?>
                    <tr class="">
                        <td scope="row"> <?php echo $usuario["id"];?> </td>
                        <td scope="row"> <?php echo $usuario["usuario"];?> </td>
                        <td scope="row"> <?php echo $usuario["correo"];?></td>
                        <td scope="row"> <?php echo $usuario["password"];?> </td>
                        <td>
                        <a name="" id="" class="btn btn-info" href="./editar.php?ID=<?php echo $usuario["id"];?>" role="button">Editar</a>
                        <a name="" id="" class="btn btn-danger" href="./index.php?ID=<?php echo $usuario["id"];?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                   
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>