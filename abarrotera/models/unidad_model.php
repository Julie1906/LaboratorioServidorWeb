<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Clase modelo que define los métodos
 * con las operaciones a realizar en la base de datos
 * con la tabla de unidades.
 */
require_once("../db/db.php");
class Unidad
{

     //Atributo para manejar la conexión de la base de datos
    private $db;
    //Atributo para los resultados de la consulta de unidades
    private $unidades;

    //Método constructor de la clase
    public function __construct()
    {

        //Asignación del resultado de conexión
        $this->db = Conectar::conexion();
        //Asignación de resultado a la variable unidades
        $this->unidades = array();
    }

     //Función para consultar las unidades de la base de datos
    public function get_unidades()
    {

         //Se ejecuta el query de consulta
        $consulta = $this->db->query("select * from unidades;");
        //Se realiza el ciclo para recorrer los resultados obtenidos
        while ($filas = $consulta->fetch_assoc()) {
            //Se asigna el resultado de cada fila al arreglo de unidades
            $this->unidades[] = $filas;
        }
         //Se retorna el arreglo con los resultados de unidades
        return $this->unidades;
    }
}

?>
