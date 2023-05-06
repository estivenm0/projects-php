<?php
require_once "./includes/head.php";
require_once "./includes/redirect.php";
require_once "./includes/helpers.php";

?>

<main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
        <?php require_once"./includes/aside.php";?>

        <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
                            <h2>Crear Categoría</h2>
                            <hr>
                            <p>
                            Este formulario te permitirá agregar una nueva categoría a tu blog para organizar mejor tus publicaciones y ayudar a tus lectores a encontrar contenido relevante de manera más fácil.
                            </p>
                            <hr>
                            <?php  showErrors(); ?>
                            <form action="categoryNew.php" method="POST" class="d-flex flex-column align-items-start px-2">
                                <label for="">Nombre de la Categoría</label>
                                <input type="text" name="nombre" class="w-100">

                                <input type="submit" name="submit" value="Agregar Categoría" class=" btn btn-primary p-1 mt-1 rounded-0 ">
                            </form>
        </section>
</main>


<?php require_once"./includes/footer.php";?>