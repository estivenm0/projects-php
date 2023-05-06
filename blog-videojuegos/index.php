<?php
    require_once "./includes/head.php";
?>

    <main class=" row  justify-content-center flex-lg-row-reverse   px-lg-5">
        <!-------------- ASIDE ------------->
        <?php require_once"./includes/aside.php";?>

        <section class="col-10 col-lg-7 bg-light p-3 p-lg-4 border border-black rounded-2">
            <h1>Ultimos Post</h1>
            <?php $recentPosts = getPostsRecents();

            while($post = mysqli_fetch_assoc($recentPosts)):?>
            <article>
                <a href="post.php?id=<?= $post["id"]?>"> 
                    <h2 class="text-primary"><?= $post["titulo"]?></h2>
                    <h6 class="text-secondary"><?= $post["categoria"] ." - ". $post["fecha"]?> </h6>
                    <p>
                        <?= substr($post["descripcion"], 0,200). "..."?>
                    </p>
                </a>
            </article>
            <?php  endwhile; ?>
            <a href="posts.php" class="btn btn-primary p-1 mt-1 rounded-0">Ver Todos Los Posts</a>

        </section>
    </main>

  
<?php require_once"./includes/footer.php";?>
