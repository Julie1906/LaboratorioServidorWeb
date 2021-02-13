<!--
Nombre: Juliana López Ramírez
Maestría: Ingeniería del Software y Sistemas Informáticos
Materia: Computación en el Servidor Web
Nombre del profesor: Octavio Aguirre Lozano
Descripción: Archivo html que funciona como página principal
de la aplicación, y desde la cual se redirige a las páginas
que permiten realizar las operaciones de consulta, alta,
baja y modificación de productos de una tienda de abarrotes.-->
<!DOCTYPE html>
<html>
    <!--Cabecera que incluye el tipo de codificación y título de la página-->
    <head>
        <meta charset="UTF-8">
        <title>Abarrotera "El Pueblito"</title>
        <!--Se hace llamado a la hoja de estilos que serán aplicados en la página-->
        <link href="views/css/menu.css" rel="stylesheet" type="text/css" />
    </head>
    <!--Se construye el cuerpo de la página-->
    <body class="pagina">
        <div class="container">
            <header class="text-center">
                <h1>Control de Inventario</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="contenido">
                    <!--Se generan las opciones de operaciones de la aplicación; cada una con su respectivo llamado
                    al archivo controller correspondiente-->
                    <ul id="menu">
                        <li><a href="controllers/producto_controller.php">Consulta</a>
                        </li>
                        <li><a href="controllers/producto_controller.php?action=registro">Alta</a>
                        </li>
                        <li><a href="controllers/producto_controller.php?action=update&id=0">Modificación</a>
                        </li>
                        <li><a href="controllers/producto_controller.php?action=delete&id=undefined">Baja</a>
                        </li>
                    </ul>
                </div>
                 <!--Se agrega opción para cerrar sesion-->
                 <div>
                    <a href="controllers/usuario_controller.php?fin=true&error=0"> Cerrar Sesión </a>
                </div> 
            </div>
        </div>
    </body>
</html>
