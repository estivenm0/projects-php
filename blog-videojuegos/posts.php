<?php
    require_once "./includes/head.php";
?>

    <main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
        <?php require_once"./includes/aside.php";?>

        <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
            <h1>Posts</h1>
            <?php $recentPosts = getPosts();

            while($post = mysqli_fetch_assoc($recentPosts)):?>
            <article>
                <a href=""> 
                    <h2 class="text-primary"><?= $post["titulo"]?></h2>
                    <h6 class="text-secondary"><?= $post["categoria"] ." - ". $post["fecha"]?> </h6>
                    <p>
                        <?= substr($post["descripcion"], 0,200). "..."?>
                    </p>
                </a>
            </article>
            <?php  endwhile; ?>

        </section>
    </main>

  
<?php require_once"./includes/footer.php";?>
