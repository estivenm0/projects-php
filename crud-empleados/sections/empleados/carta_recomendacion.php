<?php
    include("../../bd.php");

    if(isset($_GET["ID"])){

        $txtID = (isset($_GET['ID'])? $_GET['ID']:"");
    
        $sentencia = $conexion->prepare("SELECT * FROM `tbl_empleados` WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
        $nombre = $registro["nombre"];
        $puesto = $registro["puesto"];
        $idpuesto = $registro["idpuesto"];
        $foto = $registro["foto"];
        $cv = $registro["cv"];
        $correo = $registro["correo"];
        $fecha = $registro["fechadeingreso"];
    
      }

      ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de Recomendación</title>
</head>
<body>
    <h1>Carta de Recomendación Laboral</h1>

    <h2>Colombia 01/01/2023</h2>

    <?php 
       echo $nombre. "    "; 
       echo $fecha. "    ";
       echo $correo. "    ";
    

        ?>
    
</body>
</html>
<?php 
    $HTML = ob_get_clean();
    require_once("../../libs/autoload.inc.php");
      use Dompdf\Dompdf;
      $dompdf = new Dompdf();
      $opciones = $dompdf->getOptions();
      $opciones->set(array("isRemoteEnabled"=>true));

      $dompdf->setOptions($opciones);

      $dompdf->loadHTML($HTML);

      $dompdf->setPaper("letter");
      $dompdf->render();
      $dompdf->stream("archivo.pdf", array("Attachment"=>false));

?>