<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Clase que define los párametros para establecer
 * la conexión con la base de datos
 */
class Conectar{

    public static function conexion(){

        //se envian los parámetros de conexión
        $conexion=new mysqli("localhost", "root", "", "abarrotera");
        //se define el codificación que será utilizado
        $conexion->query("SET NAMES 'utf8'");
        //se retorna la conexión 
        return $conexion;

    }

}
