<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>GALLERY</title>
</head>
<body>
    <header>
        <div>
            <h1>GALLERY</h1>
        </div>
        <a href="upload.php"> ❏ Add Photo ❏</a>
    </header>

    <main class="photos">
        <?php foreach($photos as $photo): ?>
            <div class="tumb">
                <a href="photo.php?id=<?php echo $photo["id"]?>">
                
                    <img src="<?php echo($photo["image"])?>" alt="">
                </a>
            </div>
        <?php endforeach; ?> 
    </main>

    <div class="pagination">
        <?php if($page>1):?>
        <a href="index.php?pg=<?php echo $page - 1?>" class="left">
            ↤ Back
        </a>
        <?php endif; ?>
        
        <?php if(($page*8)<$count):?>
        <a href="index.php?pg=<?php echo $page + 1?>" class="rigt">
            Next ↦
        </a>
        <?php endif;?>
    </div>

    <footer>
        <p>Created by: stivenm0</p>
    </footer>

    
</body>
</html>