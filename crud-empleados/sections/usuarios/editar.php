<?php include("../../templates/header2.php"); ?>

<?php
  include("../../bd.php");

  if(isset($_GET["ID"])){

    $txtID = (isset($_GET['ID'])? $_GET['ID']:"");

        $sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
        $sentencia->bindParam(':id', $txtID );
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
        $usuario = $registro['usuario'];
        $correo = $registro['correo'];
        $contrasenia = $registro['password'];
  }

  if($_POST){

    $txtID = (isset($_POST['ID'])? $_POST['ID']:"");

    $sentencia = $conexion->prepare("UPDATE tbl_usuarios SET usuario=:usuario, correo=:correo, password=:password WHERE id=:id");

    $sentencia->bindParam(":usuario", $_POST["usuario"]);
    $sentencia->bindParam(":correo", $_POST["correo"]);
    $sentencia->bindParam(":password", $_POST["password"]);
    $sentencia->bindParam(":id", $txtID);

    $sentencia->execute();

    header("location:index.php");


  }



?>


<div class="card">
    <div class="card-header">
        Datos del usuario
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="nombredelpuesto" class="form-label">ID:</label>
              <input type="number"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" readonly 
                value='<?php echo $txtID?>'>
            </div>

            <div class="mb-2">
              <label for="usuario" class="form-label">Nombre del usuario:</label>
              <input type="text"
                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" 
                value="<?php echo $usuario;?>">
            </div>
            
            <div class="mb-2">
              <label for="correo" class="form-label">Correo:</label>
              <input type="text"
                class="form-control" name="correo" id="correo" aria-describedby="helpId" 
                value="<?php echo $correo;?>">
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Contraseña:</label>
              <input type="password"
                class="form-control " name="password" id="password" aria-describedby="helpId" 
                value="<?php echo $contrasenia;?>">
            </div>

            <button type="submit" class="btn btn-success">Agregar Registro</button>
            <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>