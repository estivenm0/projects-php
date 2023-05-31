<?php include("../../templates/header2.php"); ?>

<?php
    include("../../bd.php");

    if(isset( $_GET['ID'])){

        $txtID = (isset($_GET['ID'])? $_GET['ID']:"");

        $sentencia = $conexion->prepare("SELECT * FROM tbl_puestos WHERE id=:id");
        $sentencia->bindParam(':id', $txtID );
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
        $nombredelpuesto = $registro['nombredelpuesto'];
    }

    if($_POST){

        $txtID = (isset($_POST['ID'])? $_POST['ID']:"");

        //RECOLECTAMOS LOS DATOS DEL METODO POST    
        $nombredelpuesto = (isset($_POST['nombredelpuesto'])? $_POST['nombredelpuesto']: "");

        //INSERCIÓN DE DATOS
        $sentencia = $conexion->prepare("UPDATE tbl_puestos SET nombredelpuesto=:nombredelpuesto WHERE id=:id");

        //INGRESANDO VALORES
        $sentencia->bindParam(":nombredelpuesto", $nombredelpuesto);
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute(); 

        header("location:index.php");


    }



?>


<div class="card">
    <div class="card-header">
        Datos del puesto
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="nombredelpuesto" class="form-label">ID:</label>
              <input type="number"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" readonly value='<?php echo $txtID?>'>
            </div>
            <div class="mb-2">
              <label for="nombredelpuesto" class="form-label">Nombre:</label>
              <input type="text"
                class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" 
                value="<?php echo $nombredelpuesto; ?>">
            </div>

            <button type="submit" class="btn btn-success">Editar Registro</button>
            <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>