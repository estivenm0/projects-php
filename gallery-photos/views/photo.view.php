<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>PHOTO</title>
</head>
<body>
    

    <main class="container">
    <header>
        <div>
            <h2><?php echo $photo["title"]?></h2>
        </div>
    </header>
            <div class="">
                    <img src="<?php echo $photo["image"]?>" alt="">
            </div>
            <p>
            <?php echo $photo["description"]?>
            </p>
            <div class="pagination">
                <a href="index.php" class="left">◄ Back</a>
            </div>
    </main>

    

    <footer>
        <p>Created by: stivenm0</p>
    </footer>

    
</body>
</html>