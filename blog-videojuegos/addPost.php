<?php
require_once "./includes/head.php";
require_once "./includes/redirect.php";
require_once "./includes/helpers.php";
?>

<main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
    <!-- ------------ ASIDE ----------------- -->
    <?php require_once"./includes/aside.php";?>

    <!-- ------------ FORM POST ----------------- -->
    <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
                            <h2>Crear Post</h2>
                            <hr>
                            <p>
                                Este formulario te permite crear y publicar contenido en nuestro blog. Asegúrate de llenar todos los campos requeridos.
                            </p>
                            <hr>

                            <form action="postNew.php" method="POST" class="d-flex flex-column align-items-start px-2">
                                    <?php  showErrors(); ?>
                                    <div class="mb-3 w-100">
                                        <label for="">Categoría</label>
                                            <select class="w-100" name="categoria" required>
                                                <option selected>Select one</option>
                                                <?php $categorias = getCategories();
                                                while($categoria = mysqli_fetch_assoc($categorias)):?>
                                                <option value="<?= $categoria["id"]?>"><?= $categoria["nombre"]  ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                    </div>
                                        
                                    <label for="">titulo</label>
                                    <input type="text" name="titulo" class="w-100" required>

                                    <label for="">Contenido</label>
                                    <textarea type="text" name="descripcion" class="w-100" required></textarea>

                                    <input type="submit" name="submit" value="Agregar Post" class=" btn btn-primary p-1 mt-1 rounded-0 ">
                            </form>                  
        </section>
</main>


<?php require_once"./includes/footer.php";?>