<?php
/**
 * Nombre: Juliana López Ramírez
 * Maestría: Ingeniería del Software y Sistemas Informáticos
 * Materia: Computación en el Servidor Web
 * Nombre del profesor: Octavio Aguirre Lozano
 * Descripción: Controlador que permite acceder al modelo de datos
 * de los productos y efectuar la consulta para ser mostrados
 * en la vista.
 */

//Se consideran los siguientes casos para los flujos que REGISTRO, MODIFICACIÓN y BAJA de productos
//Se evalua si la siguiente variable obtenida mediante el array asociativo $_GET está definida en el formulario y no es nula  
if (isset($_GET['action'])) {
    //Se valida si la acción a ejecutar es para iniciar el flujo de registro de producto
    //de ser así se mostrará el formulario de captura
    if ($_GET['action'] == "registro") {
        //Llamada al modelo de unidades que se requiere para el formulario de captura de productos
        require_once("../models/unidad_model.php");
        //instancia de la clase Unidad
        $unidad = new Unidad();
        //Llamado al método para consultar las unidades
        $unidades = $unidad->get_unidades();
        //Llamada a la vista que contiene el formulario de captura de información
        require_once("../views/registro_producto_view.php");
    }

    //Se valida si la acción a ejecutar consiste en el INSERT del producto 
    if ($_GET['action'] == "insert") {
        //Llamada al modelo de productos
        require_once("../models/producto_model.php");
        //Instancia de la clase producto
        $producto = new Producto();
        //Llamado al método que ejecuta la acción de insertar un nuevo registro de producto
        $estatus = $producto->set_producto($_POST['producto'],$_POST['existencias'],  $_POST['precio'], $_POST['unidad']);
        //Llamada al metodo para consultar los productos
        $datos = $producto->get_productos();
        //Llamada a la vista que despliega los resultados de productos
        require_once("../views/producto_view.php");
    }

    //Se valida si la acción a ejecutar consiste en un DELETE de producto
    if ($_GET['action'] == "delete") {
        //Llamada al modelo de productos
        require_once("../models/producto_model.php");
        //Instancia de la clase Producto
        $producto = new Producto();
        //Si el valor del id recibido es undefined, significa que la petición se está ejecutando desde la pagina del index
        //y por lo tanto se deberá redirir en primer lugar a la página de consulta de productos para poder elegir el que será eliminado, 
        if($_GET['id']== "undefined"){
            //Se define mensaje que será mostrado en un alert al usuario
            $mensaje = "Seleccione la opción Eliminar del registro a borrar";
            echo "<script> alert('".$mensaje."'); </script>";
            //Llamada al método para consultar los productos
            $datos = $producto->get_productos();
            //Llamada a la vista que despliega la tabla de los productos
            require_once("../views/producto_view.php");
        }
        //Si se recibió un id diferente a undefined, significa que ya fue seleccionado un registro para ser eliminado
        //Llamada al método para eliminar el producto seleccionado
        $estatus = $producto->delete_producto($_GET['id']);
        //Se valida si la ejecución de la operación fue exitosa para enviar alert de confirmación
        if($estatus == true){
            $mensaje = "Eliminación exitosa";
            echo "<script> alert('".$mensaje."'); </script>";
        }
        //Llamada al método de consulta de productos
        $datos = $producto->get_productos();
        //Llamada a la vista que muestra la tabla de productos
        require_once("../views/producto_view.php");
    }

    //Se valida si la acción a ejecutar consiste en un UPDATE de producto
    if($_GET['action'] == "update"){
        //Llamada al modelo de productos
        require_once("../models/producto_model.php");
        //Instancia de la clase Producto
        $producto = new Producto();
        //Se valida si el id recibido es igual a 0, significa que primero se le mostrará al usuario
        //la tabla de productos
        if($_GET['id']== "0"){
            //Se genera mensaje que será mostrado en alerta para seleccionar el registro a actualizar
            $mensaje = "Seleccione la opción Actualizar del registro a modificar";
            echo "<script> alert('".$mensaje."'); </script>";
            //Llamado al método para consultar los productos
            $datos = $producto->get_productos();
            //Llamado a la vista que mostrará los productos
            require_once("../views/producto_view.php");
            //Se valida si existe la variable hecho y está en true, significa que se realizará la actualización
        }elseif( isset($_GET["hecho"]) && $_GET['hecho']== "true"){
            //Llamada al método que permite actualizar la información con base al id del producto 
            $estatus = $producto->update_producto($_GET['id'],$_POST['producto'],  $_POST['unidad'], $_POST['existencias'], $_POST['precio']);
            //Si la operación de update fue exitosa se envía alert de confirmación
            if($estatus == true){
                $mensaje = "Actualización exitosa";
                echo "<script> alert('".$mensaje."'); </script>";
            }
            //llamada al método de consulta de productos
            $datos = $producto->get_productos();
            //Llamada a la vista que permite mostrar todos los productos
            require_once("../views/producto_view.php");
            //Caso que muestra la información particular del producto seleccionado a modificar
        }else{
            //Llamado al método que consulta la información de un producto en particular
            $datos = $producto->get_producto_by_id($_GET['id']);
            //Llamado al modelo de unidades
            require_once("../models/unidad_model.php");
            //instancia de la clase Unidad
            $unidad = new Unidad();
            //Llamado al método para consultar las unidades
            $unidades = $unidad->get_unidades();
            //Llamada a la vista que muestra el formulario con la información precargada del producto seleccionado 
            //para ser modificada
            require_once("../views/modificacion_producto_view.php");
        }

    }
}

//Caso que se ejecuta cuando solamente se realiza una CONSULTA de productos
else{
    //Llamada al modelo
    require_once("../models/producto_model.php");
    //instancia de la clase Producto
    $producto = new Producto();
    //Llamado al método para consultar los productos
    $datos = $producto->get_productos();
    //Llamada a la vista
    require_once("../views/producto_view.php");
}
?>

