<?php
    require_once "./includes/conexion.php";
    require_once "./includes/helpers.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/assets//img//favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>BLOG</title>
</head>
<body class="px-lg-5">
    <!---------------- CABECERA ------------------>
    <header class="d-flex flex-column p-2 ">
        <div class="px-4 my-2">
            <a href="index.php" class="display-5 text-primary  ">
                Blog de videojuegos
            </a>
        </div>
         <!---------------- menu ------------------>
        <?php $categorias = getCategories(); ?>
        <nav class="px-4 ">
            <ul class="d-flex flex-wrap bg-light align-items-center justify-content-start rounded-3 p-0  border border-black">
                <li class="d-block  border border-black p-3">
                    <a href="index.php">Inicio</a>
                </li>

                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <li class="d-block  border border-black p-3">
                        <a href="/categoria.php?id=<?= $categoria["id"]; ?>"><?= $categoria["nombre"]; ?></a>
                    </li>
                <?php endwhile;?>
             
            </ul>
        </nav>
    </header>