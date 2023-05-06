<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>UPLOAD</title>
</head>
<body>
    <main class="container" >
            <header>
                <div>
                    <h2>UPLOAD PHOTO</h2>
                </div>
            </header>
    
            <form action="" method="post" enctype="multipart/form-data" class="Form" 
            style='border: 1px solid white; border-radius: 10px;'>
                <label for="">Select Photo: *jpg *png *web *svg</label>
                <input type="file" id="photo" name="photo"
                accept=".jpg, .png, .svg, .web" required>

                <label for="">Title:</label>
                <input type="text" id="title" name="title" maxlength="30" required>

                <label for="">Description:</label>
                <textarea id="description" name="description" maxlength="100" cols="30" rows="5" required></textarea>
        
                <input type="submit" value="SEND">

            </form>
           <br>
           
            <div class="pagination">
                <a href="index.php" class="left">◄ EXIT</a>
            </div>
    </main>

    

    <footer>
        <p>Created by: stivenm0</p>
    </footer>

    
</body>
</html>