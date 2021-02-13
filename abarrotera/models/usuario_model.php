<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Clase modelo que define los métodos
 * con las operaciones a ralizar en la base de datos
 * con la tabla de users.
 */
require_once("../db/db.php");
class Usuario
{

     //Atributo para manejar la conexión de la base de datos
    private $db;
    //Atributo para los resultados de la consulta de usuarios
    private $usuario;

    //Método constructor de la clase
    public function __construct()
    {

        //Asignación del resultado de conexión
        $this->db = Conectar::conexion();
        //Asignación de resultado a la variable usuario
        $this->usuario = array();
    }

    //Función para consultar la informaación del usuario
    public function get_usuario($usuario, $password)
    {

        //Se ejecuta el query de consultar la información del usuario
        $consulta = $this->db->query("SELECT * FROM users WHERE usuario='$usuario' AND password='$password';");
        //Se obtiene el resultado de la consulta
        //Se realiza el ciclo para recorrer los resultados obtenidos
        while ($filas = $consulta->fetch_assoc()) {
            //Se asigna el resultado de cada fila al arreglo de usuario
            $this->usuario[] = $filas;
        }
        //Se retorna el arreglo con los resultados de usuario
        return $this->usuario;
    }
}

?>
