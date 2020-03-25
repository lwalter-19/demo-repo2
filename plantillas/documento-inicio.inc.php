<!DOCTYPE html>
<html lang="es">
    <head>
        <?php 
            if(!isset($titulo) || empty($titulo)){
                $titulo = "Blog De JavaDevOne";
            }
            echo "<title>$titulo</title>";
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ayuda para los motores de busqueda como Google.com">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body>
