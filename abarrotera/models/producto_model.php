<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Clase modelo que define los métodos
 * con las operaciones a ralizar en la base de datos
 * en la tabla de productos.
 */
require_once("../db/db.php");
class Producto
{

    //Atributo para manejar la conexión de la base de datos
    private $db;
    //Atributo para los resultados de la consulta de productos
    private $productos;


    //Método constructor de la clase
    public function __construct()
    {
        //Asignación de resultado a la variable productos
        $this->productos = array();
        //Asignación del resultado de conexión
        $this->db = Conectar::conexion();  
    }

    //Función para consultar los productos de la base de datos
    public function get_productos()
    {

        //Se ejecuta el query de consulta
        $consulta = $this->db->query("SELECT
            p.id,
            p.producto,
            p.existencias,
            p.precio_unitario,
            u.unidad
        FROM productos p, unidades u
        WHERE p.id_unidad = u.id;");

        //Se realiza el ciclo para recorrer los resultados obtenidos
        while ($filas = $consulta->fetch_assoc()) {
            //Se asigna el resultado de cada fila al arreglo de productos
            $this->productos[] = $filas;
        }

        //Se retorna el arreglo con los resultados de productos
        return $this->productos;
    }

    //Función para realizar la inserción de productos en base de datos 
    public function set_producto($producto,  $existencias, $precioUnitario, $idUnidad) {
        //Se convierte  a mayúsculas el nombre del producto
        $producto = strtoupper ($producto);
        //Se construye el query de inserción con los parámetros recibidos 
        $sql = "INSERT INTO productos (producto, existencias, precio_unitario, id_unidad) VALUES (' $producto', ' $existencias ', '$precioUnitario', ' $idUnidad ' )";
        //Ejecución del query de inserción
        $result = $this->db->query($sql);
        //Se valida si la inserción fue correcta
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    //Función para realizar la eliminacion a partir de un id del producto
    public function delete_producto($idProducto) {

        //Se define el query de delete
        $sql = "DELETE FROM productos WHERE id=$idProducto";
        //Se ejecuta el query de delete
        $result = $this->db->query($sql);
        //Se valida si el borrado fue exitoso
        if ($result) {
            return true;
        } else {
            return false;
        }
        
    }

    //Función para consultar los productos de la base de datos
    public function get_producto_by_id($idProducto)
    {

        //Se ejecuta el query de consulta por id de producto
        $consulta = $this->db->query("SELECT * FROM productos WHERE id=$idProducto;");
        //Se realiza el ciclo para recorrer los resultados obtenidos
        while ($filas = $consulta->fetch_assoc()) {
            //Se asigna el resultado de cada fila al arreglo de productos
            $this->productos[] = $filas;
        }

        //Se retorna el arreglo con los resultados de productos
        return $this->productos;
    }


      //Función para realizar la actualización de un producto a partir de su id
      public function update_producto($idProducto, $producto, $idUnidad, $existencias, $precio) {

        //Se define el query de update
        $sql = "UPDATE productos SET producto='$producto', existencias=$existencias, precio_unitario=$precio, id_unidad=$idUnidad WHERE id=$idProducto";
        //Se ejecuta el query de update
        $result = $this->db->query($sql);
        //Se valida si el update fue exitoso
        if ($result) {
            return true;
        } else {
            return false;
        }
        
    }

    
}

?>
