<?php include("../../templates/header2.php"); ?>

<?php 
  include("../../bd.php");

  if(isset($_GET["ID"])){

    $txtID = (isset($_GET['ID'])? $_GET['ID']:"");

    $sentencia = $conexion->prepare("SELECT * FROM `tbl_empleados` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombre = $registro["nombre"];
    $puesto = $registro["puesto"];
    $idpuesto = $registro["idpuesto"];
    $foto = $registro["foto"];
    $cv = $registro["cv"];
    $correo = $registro["correo"];
    $fecha = $registro["fechadeingreso"];

  }

 if($_POST){

    $txtID = (isset($_POST['ID'])? $_POST['ID']:"");

    print_r($_POST);
    $nombre = (isset($_POST['nombre'])? $_POST['nombre']: "");
    $fechadeingreso = (isset($_POST['fechadeingreso'])? $_POST['fechadeingreso']: "");
    $idpuesto = (isset($_POST['idpuesto'])? $_POST['idpuesto']: "");


    $sentencia = $conexion->prepare("UPDATE tbl_empleados SET 
      nombre=:nombre, fechadeingreso=:fechadeingreso, idpuesto=:idpuesto
      WHERE id=:id");

       
       
        
        // $nombreArchivo_cv = ($cv!="")? $fecha_->getTimestamp(). " ". $_FILES["cv"]["name"]: "";
        // $tmp_cv = $_FILES["cv"]["tmp_name"];

        // if($tmp_cv!= ""){
        //   move_uploaded_file($tmp_cv, "./".$nombreArchivo_cv);
        // }

        $sentencia->bindParam(":nombre", $nombre);
        // $sentencia->bindParam(":cv", $nombreArchivo_cv);
        $sentencia->bindParam(":idpuesto", $idpuesto);
        $sentencia->bindParam(":fechadeingreso", $fechadeingreso);
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute(); 
            // -----------------------------------
        $foto = (isset($_FILES['foto']['name'])? $_FILES['foto']['name']: "");

        $fecha_ = new DateTime();

        $nombreArchivo_foto = ($foto!="")? $fecha_->getTimestamp(). " ". $_FILES["foto"]["name"]: "";

        $tmp_foto = $_FILES["foto"]["tmp_name"];

        if($tmp_foto!= ""){
          move_uploaded_file($tmp_foto, "./".$nombreArchivo_foto);

          $sentencia = $conexion->prepare("SELECT foto FROM tbl_empleados WHERE id=:id");
          $sentencia->bindParam(":id" , $txtID);
          $sentencia->execute();
          $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        

        if(isset($empleado["foto"]) && $empleado["foto"]!=""){
            if(file_exists("./". $empleado["foto"])){
                unlink("./". $empleado["foto"]);
            }
        }
        $sentencia = $conexion->prepare("UPDATE tbl_empleados SET foto=:foto WHERE id=:id");
        $sentencia->bindParam(":foto",$nombreArchivo_foto);
        $sentencia->bindParam(":id" , $txtID);
        $sentencia->execute();
        }

        //CV
        $cv = (isset($_FILES['cv']['name'])? $_FILES['cv']['name']: "");

        $nombreArchivo_cv = ($cv!="")? $fecha_->getTimestamp(). " ". $_FILES["cv"]["name"]: "";

        $tmp_cv = $_FILES["cv"]["tmp_name"];

        if($tmp_cv!= ""){
          move_uploaded_file($tmp_cv, "./".$nombreArchivo_cv);

          $sentencia = $conexion->prepare("SELECT cv FROM tbl_empleados WHERE id=:id");
          $sentencia->bindParam(":id" , $txtID);
          $sentencia->execute();
          $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        

        if(isset($empleado["cv"]) && $empleado["cv"]!=""){
            if(file_exists("./". $empleado["cv"])){
                unlink("./". $empleado["cv"]);
            }
        }
        $sentencia = $conexion->prepare("UPDATE tbl_empleados SET cv=:cv WHERE id=:id");
        $sentencia->bindParam(":cv",$nombreArchivo_cv);
        $sentencia->bindParam(":id" , $txtID);
        $sentencia->execute();
        }

        header("location:index.php");

}



  $sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos`");
  $sentencia->execute();
  $lista_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

  

?>

<div class="card">
    <div class="card-header">
        Datos del empleado
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-2">
              <label for="nombredelpuesto" class="form-label">ID:</label>
              <input type="number"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" readonly value='<?php echo $txtID?>'>
            </div>
            <div class="mb-2">
              <label for="nombre" class="form-label">Nombre completo:</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" 
                value="<?php echo $nombre?>">
            </div>

            <div class="mb-3">
              <label for="foto" class="form-label">Foto:</label>"<?php echo $foto?>"
              
              <input type="file"
                class="form-control" name="foto" id="foto" aria-describedby="helpId" >
            </div>

            <div class="mb-3">
              <label for="CV" class="form-label">CV(PDF):</label>
              <a href="<?php echo $cv?>"><?php echo $cv?></a>
              <input type="file"
                class="form-control" name="cv" id="cv" aria-describedby="helpId" >
            </div>

            <div class="mb-3">
                <label for="idpuesto" class="form-label">Puesto:</label>
                <select class="form-select form-form-select-sm" name="idpuesto" id="idpuesto">
                  <?php foreach($lista_puestos as $puesto){?>
                    <option value="<?php echo $puesto["id"] ?>" <?php echo ($idpuesto == $puesto["id"])? "selected":"" ?> >
                     <?php echo $puesto["nombredelpuesto"]; ?> 
                    </option>
                  <?php }?>
                </select>
            </div>
            
            <div class="mb-3">
              <label for="fechadeingreso" class="form-label">Fecha de ingreso:</label>
              <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso" aria-describedby="emailHelpId" value="<?php echo $fecha?>">
            </div>


            <button type="submit" class="btn btn-success">Editar Registro</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>