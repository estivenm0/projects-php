<?php

    function visitas(){
        $archivo = "contador.txt";

        if(file_exists($archivo)){
            $cuenta = file_get_contents($archivo) + 1;
            file_put_contents($archivo, $cuenta);
    
            return $cuenta;
        }else{
            file_put_contents($archivo, 1);
            return 1;
        }
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://svgsilh.com/svg_v2/1915455.svg" type="image/x-icon">
    <title>Visitas</title>
    <style>

        *{ margin: 0; padding: 0; box-sizing: border-box; }

        body{
            background-color: #A69F98;
            margin-top: 1rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        body, .container{
            text-align: center;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .container{
            padding: 1rem;
            font-size: 3rem;
            justify-content: center;
            background-color: red;
            width: 250px;
            height: 200px;
            max-width: 90%;
            border-radius: 10%;
            box-shadow: 4px 4px 5px black ;
        }

    </style>
</head>
<body>

    <h1>Contador de Visitas</h1>
    <div class="container">
        <p> <?php  echo visitas(); ?></p>
        <p> Visitas</p>
    </div>
    
   
</body>
</html>