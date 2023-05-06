<?php
    require_once "./includes/head.php";

    $pst = getPost($_GET["id"]);

    if(!isset($pst["id"])){
        header("location: index.php");
    }

?>

    <main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
        <?php require_once"./includes/aside.php";?>

        <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
            <h1><?=$pst["titulo"]?> </h1> <br>

            <a href="categoria.php?id=<?=$pst["categoria_id"]?>"><h4 class="text-primary"><?=$pst["categoria"]?> </h4></a>
            <h6 class="text-muted" ><?= $pst["creador"]. "  |  ".  $pst["fecha"]?></h6>
            <p><?=$pst["descripcion"]?></p>

            <?php
                if(isset($_SESSION["user"]) && $_SESSION["user"]["id"] == $pst["usuario_id"]):?>
                    <a href="editPost.php?id=<?=$pst["id"]?>" class="btn btn-primary">Editar</a>
                    <a href="deletePost.php?id=<?=$pst["id"]?>" class="btn btn-danger">Eliminar</a>
                <?php endif; ?>

        </section>
    </main>

  
<?php require_once"./includes/footer.php";?>
