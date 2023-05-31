<?php
    session_start();
    if($_POST){
        include("./bd.php");

        $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuarios from tbl_usuarios WHERE usuario=:usuario AND password=:contrasenia");
        $usuario=  $_POST["usuario"];
        $contraseña=  $_POST["contrasenia"];
        $sentencia->bindParam(":usuario", $usuario);
        $sentencia->bindParam(":contrasenia", $contraseña);
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
        if($registro["n_usuarios"]>0){
            $_SESSION["usuario"]= $registro["usuario"];
            $_SESSION["logueado"]=true;
            header("Location:index.php");
        }else{
            $mensaje = "usuario invalido";
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/4370/4370748.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <main class="container">

        <section style="height: 100vh;" class="row  justify-content-center align-items-center"  >
            <div class="col-md-4">
                    <div class="card">
                        <h1 class="card-header h4 text-center">
                            Iniciar Sesión
                        </h1>
                        <div class="card-body">
                                <?php if(isset($mensaje)){?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong><?php echo $mensaje?></strong> 
                                    </div>
                                <?php }?>
                                    
                                <form action="login.php" method="POST">
                                    <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario:</label>
                                    <input type="text"
                                        class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="escriba su usuario">
                                    </div>
                                    <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña:</label>
                                    <input type="password"
                                        class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="escriba su contraseña">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </form>
                        </div>
                    </div>
            </div>
        </section>
        
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>