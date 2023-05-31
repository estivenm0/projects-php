<?php include("../../templates/header.php"); ?>

<?php
    include("../../bd.php");

    if(isset( $_GET['ID'])){

        $txtID = (isset($_GET['ID'])? $_GET['ID']:"");

        $sentencia = $conexion->prepare("DELETE FROM tbl_puestos WHERE id=:id");
        $sentencia->bindParam(':id', $txtID );
        $sentencia->execute();

        header("location:index.php");

    }

    


    $sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos`");
    $sentencia->execute();
    $lista_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class="display-5 text-center text-bg-secondary"> Puestos</h1>
<div class="card">
   
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar Puesto
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-secondary" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del puesto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_puestos as $puesto){?>
                        <tr class="">
                        <td scope="row"> <?php echo $puesto['id']; ?> </td>
                
                        
                        <td><?php echo $puesto['nombredelpuesto']; ?></td></td>
                            <td>
                            <a class="btn btn-info" href="./editar.php?ID=<?php echo $puesto['id'];?>" role="button">Editar</a>
                            <a class="btn btn-danger" href="javascript:borrar(<?php echo $puesto["id"]; ?>)" role="button">Eliminar</a>
                            </td>
                        </tr>
                        <?php }?>
                    
                    
                    
                    
                   
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>