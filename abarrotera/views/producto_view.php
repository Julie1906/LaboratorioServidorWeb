<!--
Nombre: Juliana López Ramírez
Maestría: Ingeniería del Software y Sistemas Informáticos
Materia: Computación en el Servidor Web
Nombre del profesor: Octavio Aguirre Lozano
Descripción: Archivo html correspondiente a la vista que muestra 
el resultado de la consulta de productos.-->
<!--Se valida si hay sesión iniciada, de lo contrario se redirige al formulario de inicio de sesión-->
<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:../index_login.php");
?>
<!DOCTYPE html>
<html lang="es">
<!--Se define cabecera con el tipo de codificación y título de la página-->

<head>
    <meta charset="UTF-8" />
    <title>Productos</title>
     <!--Se hace llamado a la hoja de estilos que serán aplicados en la página-->
     <link href="../views/css/general.css" rel="stylesheet" type="text/css" />
</head>
<!--Se construye el cuerpo de la página-->

<body>
    <!--Se construye la tabla que mostrará los resultados-->
    <table class="table">
        <!--Encabezados de la tabla-->
        <tr>
            <td><strong>PRODUCTO</strong></td>
            <td><strong>UNIDAD</strong></td>
            <td><strong>EXISTENCIAS</strong></td>
            <td><strong>PRECIO UNITARIO</strong></td>
            <td><strong>ACTUALIZAR</strong></td>
            <td><strong>ELIMINAR</strong></td>
        </tr>
        <?php
        //Se realiza la iteración de los resultados de productos obtenidos de la base de datos
        for ($i = 0; $i < count($datos); $i++) {
        ?>
            <!--Se generan las filas de la tabla con la información de productos-->
            <tr>
                <td><?php echo $datos[$i]["producto"]; ?></td>
                <td><?php echo $datos[$i]["unidad"]; ?></td>
                <td><?php echo $datos[$i]["existencias"]; ?></td>
                <td><?php echo $datos[$i]["precio_unitario"]; ?></td>
                <!--Se agrega las opciones para actualizar y borrar cada registro-->
                <td><a href="../controllers/producto_controller.php?action=update&id=<?php echo $datos[$i]["id"] ?>"><img src="../views/img/update.png"></a></td>
                <td><a href="../controllers/producto_controller.php?action=delete&id=<?php echo $datos[$i]["id"] ?>"><img src="../views/img/delete.png"></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br/>
    <!--Se agrega opción para redirigir a la página index-->
    <div>
        <a href="../index.php">Inicio</a>
    </div>
</body>

</html>