<!--
Nombre: Juliana López Ramírez
Maestría: Ingeniería del Software y Sistemas Informáticos
Materia: Computación en el Servidor Web
Nombre del profesor: Octavio Aguirre Lozano
Descripción: Archivo html correspondiente a la vista que muestra 
el formulario para la modificación de la información de productos.-->

<!--Se valida si hay sesión iniciada, de lo contrario se redirige al formulario de inicio de sesión-->
<?php 
session_start ();
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
    <body>
        <div>
            <div>
                <div>
                      <!--Se crea el formulario para la actualización de información de productos-->
                    <form action="../controllers/producto_controller.php?action=update&hecho=true&id=<?php echo $datos[0]["id"]; ?>" method="post">
                        <h3>Actualizar Producto</h3>                
                        Producto: <input type="text" name="producto" class="form-control" value="<?php echo $datos[0]["producto"]; ?>"/>
                        Unidad:
                        <select id="unidad" name="unidad">
                            <option>Seleccione una opción...</option>
                            <!--Se realiza la iteración de los resultados de unidades obtenidos de la base de datos y se marca como selected 
                            de acuerdo al id_unidad del arreglo de datos-->
                            <?php foreach ($unidades as $unidad) {
                            ?>
                            <option <?php if(($datos[0]["id_unidad"])==$unidad["id"]){ ?>  selected='selected'; <?php } ?> value="<?php echo $unidad['id']; ?>"><?php echo $unidad['unidad'];?></option>
                            <?php 
                            }
                            ?>
                        </select>
                        Existencias: <input type="text" name="existencias" value="<?php echo $datos[0]["existencias"]; ?>"/> 
                        Precio Unitario: <input type="text" name="precio" value="<?php echo $datos[0]["precio_unitario"]; ?>"/> 
                        <br/><br/>
                        <input type="submit" value="Actualizar" class="btn btn-success"/>
                        <br/><br/>
                    </form>
                </div>
                <!--Se agrega opción para redirigir a la página index-->
                <div>
                    <a href="../index.php"> Inicio</a>
                </div> 
            </div>
        </div>
    </body>
</html>