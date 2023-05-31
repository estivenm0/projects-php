<?php include("../../templates/header2.php"); ?>

<?php 
  include("../../bd.php");

  $sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos`");
  $sentencia->execute();
  $lista_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

  if($_POST){

    $nombre = (isset($_POST['nombre'])? $_POST['nombre']: "");
    $fechadeingreso = (isset($_POST['fechadeingreso'])? $_POST['fechadeingreso']: "");
    $idpuesto = (isset($_POST['idpuesto'])? $_POST['idpuesto']: "");

    $foto = (isset($_FILES['foto']['name'])? $_FILES['foto']['name']: "");
    $cv = (isset($_FILES['cv']['name'])? $_FILES['cv']['name']: "");

    $sentencia = $conexion->prepare("INSERT INTO `tbl_empleados` (`id`, `nombre`, `foto`, `cv`, `idpuesto`, `fechadeingreso`) 
    VALUES (NULL, :nombre , :foto, :cv, :idpuesto, :fechadeingreso);
    ");

        $fecha_ = new DateTime();

        $nombreArchivo_foto = ($foto!="")? $fecha_->getTimestamp(). " ". $_FILES["foto"]["name"]: "";
        $tmp_foto = $_FILES["foto"]["tmp_name"];

        if($tmp_foto!= ""){
          move_uploaded_file($tmp_foto, "./".$nombreArchivo_foto);
        }
        
        $nombreArchivo_cv = ($cv!="")? $fecha_->getTimestamp(). " ". $_FILES["cv"]["name"]: "";
        $tmp_cv = $_FILES["cv"]["tmp_name"];

        if($tmp_cv!= ""){
          move_uploaded_file($tmp_cv, "./".$nombreArchivo_cv);
        }

        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":foto",$nombreArchivo_foto);
        $sentencia->bindParam(":cv", $nombreArchivo_cv);
        $sentencia->bindParam(":idpuesto", $idpuesto);
        $sentencia->bindParam(":fechadeingreso", $fechadeingreso);
        $sentencia->execute(); 

}


?>

<div class="card">
    <div class="card-header">
        Datos del empleado
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="nombre" class="form-label">Nombre completo:</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
              <label for="foto" class="form-label">Foto:</label>
              <input type="file"
                class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
              <label for="CV" class="form-label">CV(PDF):</label>
              <input type="file"
                class="form-control" name="cv" id="cv" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="idpuesto" class="form-label">Puesto:</label>
                <select class="form-select form-form-select-sm" name="idpuesto" id="idpuesto">
                <option selected>Select one</option>
                  <?php foreach($lista_puestos as $puesto){?>
                    <option value="<?php echo $puesto["id"]; ?>"> <?php echo $puesto["nombredelpuesto"]; ?></option>
                  <?php }?>
                </select>
            </div>
            
            <div class="mb-3">
              <label for="fechadeingreso" class="form-label">Fecha de ingreso:</label>
              <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso" aria-describedby="emailHelpId" placeholder="abc@mail.com">
            </div>


            <button type="submit" class="btn btn-success">Agregar Registro</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>