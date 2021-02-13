<!--
Nombre: Juliana López Ramírez
Maestría: Ingeniería del Software y Sistemas Informáticos
Materia: Computación en el Servidor Web
Nombre del profesor: Octavio Aguirre Lozano
Descripción: Archivo html que funciona como formulario de
inicio de sesión para poder ingresar a la página principal.-->

<?php
if (!isset($_SESSION["login"])) {
    } 
?>
    <!DOCTYPE html>
    <html>
    <!--Cabecera que incluye el tipo de codificación y título de la página-->

    <head>
        <meta charset="UTF-8">
        <title>Abarrotera "El Pueblito"</title>
        <!--Se hace llamado a la hoja de estilos que serán aplicados en la página-->
        <link href="views/css/general.css" rel="stylesheet" type="text/css" />
    </head>
    <!--Se construye el cuerpo de la página-->

    <body class="pagina">
        <div class="container">
            <header class="text-center">
                <h1>Inicio de sesión</h1>
                <hr />
            </header>
            <div>
                <div class="contenido">
                    <!--Formulario de inicio de sesión-->
                    <form action="controllers/usuario_controller.php" method="POST"><br><br>
                        Username:<input type="text" required="" name="usuario"><br><br>
                        Password:<input type="password" required="" name="password"><br><br>
                        <input type="submit" value="Login" name="sub">
                        <br>
                        <!--Se realiza validación para mostrar o no el mensaje en caso de que los
                        datos ingresados sean incorrectos -->
                        <?php
                        if (isset($_GET["err"]) && $_GET["err"] == "1"){
                            $msg = "Valor de usuario o contraseña inválido";
                        ?>
                        <p>
                            <?php if (isset($msg) && $_GET["err"] == "1") 

                                echo $msg;
                            }
                            ?>

                        </p>

                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
