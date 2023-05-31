<?php include("../../templates/header2.php"); ?>

<?php
    include("../../bd.php");
    
    if($_POST){
        //RECOLECTAMOS LOS DATOS DEL METODO POST    
        $nombredelpuesto = (isset($_POST['nombredelpuesto'])? $_POST['nombredelpuesto']: "");

        //INSERCIÓN DE DATOS
        $sentencia = $conexion->prepare("INSERT INTO tbl_puestos(id, nombredelpuesto) VALUES (null, :nombredelpuesto)");

        //INGRESANDO VALORES
        $sentencia->bindParam(":nombredelpuesto", $nombredelpuesto);
        $sentencia->execute(); 

    }
    
?>


<div class="card">
    <div class="card-header">
        Datos del puesto
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="nombredelpuesto" class="form-label">Nombre:</label>
              <input type="text"
                class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" >
            </div>

            <button type="submit" class="btn btn-success">Agregar Registro</button>
            <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>