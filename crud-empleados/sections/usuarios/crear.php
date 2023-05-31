<?php include("../../templates/header2.php"); ?>

<?php 
    include("../../bd.php");

    if($_POST){

      $sentencia = $conexion->prepare("INSERT INTO tbl_usuarios(id, usuario, correo, password) VALUES (null, :usuario, :correo, :password )");

      $sentencia->bindParam(":usuario", $_POST["usuario"]);
      $sentencia->bindParam(":correo", $_POST["correo"]);
      $sentencia->bindParam(":password", $_POST["password"]);

      $sentencia->execute();

    }
?>

<div class="card">
    <div class="card-header">
        Datos del usuario
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="usuario" class="form-label">Nombre del usuario:</label>
              <input type="text"
                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="">
            </div>
            
            <div class="mb-2">
              <label for="correo" class="form-label">Correo:</label>
              <input type="text"
                class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Contraseña:</label>
              <input type="text"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
            </div>

            <button type="submit" class="btn btn-success">Agregar Registro</button>
            <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>