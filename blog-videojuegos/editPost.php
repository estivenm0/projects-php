<?php
require_once "./includes/head.php";
require_once "./includes/redirect.php";
require_once "./includes/helpers.php";

$pst = getPost($_GET["id"]);

?>

<main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
    <!-- ------------ ASIDE ----------------- -->
    <?php require_once"./includes/aside.php";?>

    <!-- ------------ FORM POST ----------------- -->
    <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
                            <h2>Editar Post</h2>
                            <hr>
                            <p>
                            Este formulario te permite editar post en nuestro blog. Asegúrate de llenar todos los campos requeridos.
                            </p>
                            <hr>

                            <form action="updatePost.php?id=<?=$pst["id"]?>" method="POST" class="d-flex flex-column align-items-start px-2">
                                    <?php  showErrors(); ?>
                                    <div class="mb-3 w-100">
                                        <label for="">Categoría</label>
                                            <select class="w-100" name="categoria" required>
                                                <?php $categorias = getCategories();
                                                while($categoria = mysqli_fetch_assoc($categorias)):?>
                                                <option value="<?= $categoria["id"]?>" 
                                                <?= ($pst["categoria_id"] == $categoria["id"]? 'selected': "" )?>
                                                >
                                                <?= $categoria["nombre"] ?>
                                                </option>
                                                <?php endwhile; ?>
                                            </select>
                                    </div>
                                        
                                    <label for="">titulo</label>
                                    <input value="<?= $pst["titulo"]?>"
                                    type="text" name="titulo" class="w-100" required>

                                    <label for="">Contenido</label>
                                    <textarea type="text" name="descripcion" class="w-100" rows="6" required><?= $pst["descripcion"]?>"
                                    </textarea>

                                    <input type="submit" name="submit" value="Editar" class=" btn btn-primary p-1 mt-1 rounded-0 ">
                            </form>                  
        </section>
</main>


<?php require_once"./includes/footer.php";?>