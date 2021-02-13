<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Controlador que permite acceder al modelo de datos
 * de los usuarios y efectuar la consulta para ser mostrados
 * en la vista correspondiente.
 */

//Se obtienen los valores capturados en el formulario de login 
if(isset($_POST['sub']))
{
    $user = $_POST['usuario'];
    $password = $_POST['password'];
}

//Llamada al modelo de unidades
require_once("../models/usuario_model.php");
//Instancia de la clase Usuario
$usr = new Usuario();
//Llamada al método para consultar el usuario
$usuario = $usr->get_usuario($user, $password);
//Se cuenta cuantos elementos fueron recuperados
$result = count($usuario); 
//Si el resultado fue mayor a cero significa que el usuario esta registrado
if($result > 0)
{
     //Se inicia la sesión
     session_start ();
    //Se define el nombre de la variable de sesión
	$_SESSION["login"]="1";
    //Llamada a la vista principal
	header("location:../index.php");

   
}else{
     //Si no se obtuvo resultado coincidente, se muestra nuevamente el formulario de login
	header("location:../index_login.php?err=1");
}

//Si la variable de fin es true, se deberá eliminar sesion
if(isset($_GET['fin']) && isset($_GET['fin'])=="true"){
    header("location:../index_login.php?err=0");
    //Se destruye la sesión
    session_start ();
    session_destroy();
    exit;
}

?>
