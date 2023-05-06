<?php
    require_once "./includes/head.php";
?>

<main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
        <?php require_once"./includes/aside.php";?>

        <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
                            <h3>Actualizar Datos</h3>
                            <form action="updateUser.php" method="POST" class="d-flex flex-column align-items-start px-2">
                                <?php  showErrors(); ?>
                                <label for="">Nombre</label>
                                <input value="<?= $_SESSION["user"]["nombre"]?>"
                                type="text" name="nombre" class="w-100" >

                                <label for="">Apellidos</label>
                                <input value="<?= $_SESSION["user"]["apellidos"]?>"
                                type="text" name="apellidos" class="w-100">

                                <label for="">email</label>
                                <input value="<?= $_SESSION["user"]["email"]?>"
                                 type="email" name="email" class="w-100">

                                <label for="">Contraseña</label>
                                <input type="password" name="contraseña" class="w-100">

                                <input type="submit" name="submit" value="Actualizar" class=" btn btn-primary p-1 mt-1 rounded-0 ">
                            </form>
        </section>
    </main>




<?php require_once"./includes/footer.php";?>