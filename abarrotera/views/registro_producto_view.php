<!--
Nombre: Juliana López Ramírez
Maestría: Ingeniería del Software y Sistemas Informáticos
Materia: Computación en el Servidor Web
Nombre del profesor: Octavio Aguirre Lozano
Descripción: Archivo html correspondiente a la vista que muestra 
el formulario para el alta de productos.-->
<!--Se valida si hay sesión iniciada, de lo contrario se redirige al formulario de inicio de sesión-->
<?php 
session_start();
if(!isset($_SESSION["login"]))
	header("location:../index_login.php");
?>
<!DOCTYPE html>
<html>
    <!--Se define cabecera con el tipo de codificación y título de la página-->
    <head>
        <meta charset="UTF-8">
        <title>Abarrotera "El Pueblito"</title>
         <!--Se hace llamado a la hoja de estilos que serán aplicados en la página-->
        <link href="../views/css/general.css" rel="stylesheet" type="text/css" />
    </head>
    <!--Se construye el cuerpo de la página-->
    <body>
        <div>
            <div>
                <div>
                    <!--Se crea el formulario para la captura de productos-->
                    <form action="../controllers/producto_controller.php?action=insert" method="post">
                        <h3>Nuevo Producto</h3>                
                        Producto: <input type="text" name="producto" class="form-control"/>
                        Unidad:
                        <select id="unidad" name="unidad">
                            <option>Seleccione una opción...</option>
                            <?php
                            //Se realiza la iteración de los resultados de unidades obtenidos de la base de datos
                            for ($i = 0; $i < count($unidades); $i++) {
                                ?>
                                <option value="<?php echo $unidades[$i]["id"]; ?>"><?php echo $unidades[$i]["unidad"]; ?></option>
                            <?php 
                            }
                            ?>
                        </select>
                        Existencias: <input type="text" name="existencias" class="form-control"/> 
                        Precio Unitario: <input type="text" name="precio" class="form-control"/> 
                        <br/><br/>
                        <input type="submit" value="Registrar" class="btn btn-success"/>
                        <br/><br/>
                    </form>
                </div>
                <!--Se agrega opción para redirigir a la página index-->
                <div>
                    <a href="../index.php">Inicio</a>
                </div> 
            </div>
        </div>
    </body>
</html>