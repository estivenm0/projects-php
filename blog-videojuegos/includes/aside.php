<aside class="col-10  col-lg-5 justify-content-center h-50 row">
            <div class="col-lg-8 bg-light p-2 border border-black text-center shadow " >
                <?php if(isset($_SESSION["user"])):?>
                   <?= "Bienvenid@ " .$_SESSION["user"]["nombre"]. " ". $_SESSION["user"]["apellidos"]; ?>

                   <div class="d-flex flex-wrap justify-content-center gap-1">
                        <a href="addPost.php" class="btn btn-success w-75">Crear Posts</a>
                        <a href="addCategory.php" class="btn btn-success w-75">Crear Categoría</a>
                        <a href="myData.php" class="btn btn-primary w-75">Mis Datos</a>
                        <a href="logout.php" class="btn btn-danger w-75">Cerrar</a>
                   </div>
                    <hr>
                   <form action="search.php" method="POST" class="d-flex flex-column align-items-start px-2">
                                <label for="">Buscar Post</label>
                                <input type="text" name="search" class="w-100">

                                <input type="submit" name="buscar" value="Registrarme" class=" btn btn-primary p-1 mt-1 rounded-0 ">
                    </form>


                <?php else:?>
                    <h3>Identificate</h3>
                    <form action="login.php" method="POST" class="d-flex flex-column align-items-start px-2">
                        <?php  if(isset($_SESSION["login"])){
                            $message = $_SESSION['login'];
                            echo " <li class='alert alert-danger m-0 p-0'>$message</li>";
                            unset($_SESSION["login"]); 
                        }?>

                        <label for="">email</label>
                        <input type="email" name="email" class="w-100" required>

                        <label for="">Contraseña</label>
                        <input type="password" name="contraseña" class="w-100" required>

                        <input type="submit" value="Entrar" class="btn btn-primary p-1 mt-1 rounded-0">
                    </form>
                <?php endif?>
            </div>

                <?php if(!isset($_SESSION["user"])):?>
                        <div class="col-lg-8 bg-light p-2 border border-black text-center my-2  shadow">
                            <h3>Registrate</h3>
                            <form action="registro.php" method="POST" class="d-flex flex-column align-items-start px-2">
                                <?php  showErrors(); ?>
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="w-100" required>

                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" class="w-100" required>

                                <label for="">email</label>
                                <input type="email" name="email" class="w-100" required>

                                <label for="">Contraseña</label>
                                <input type="password" name="contraseña" class="w-100" required>

                                <input type="submit" name="submit" value="Registrarme" class=" btn btn-primary p-1 mt-1 rounded-0 ">
                            </form>
                        </div>
                <?php endif; ?>
        </aside>