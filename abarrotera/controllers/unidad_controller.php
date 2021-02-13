<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Controlador que permite acceder al modelo de datos
 * de las unidades y efectuar la consulta para ser mostrados
 * en la vista.
 */

//Llamada al modelo de unidades
require_once("../models/unidades_model.php");
//Instancia de la clase Unidad
$unidad = new Unidad();
//Llamada al método para consultar las unidades
$unidades = $unidad->get_unidades();
//Llamada a la vista donde se requieren los datos obtenidos
require_once("../views/registro_producto_view.html");

?>
