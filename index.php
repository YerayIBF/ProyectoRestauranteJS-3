<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'config/parameters.php';
include_once 'controlador/ProductoController.php';
include_once 'controlador/APIController.php';

if (!isset($_GET['controller'])) {
    header("Location:" . url_base . '?controller=Producto');
} else {
    $nombre_controller = $_GET['controller'] . 'Controller';

    if (class_exists($nombre_controller)) {
        $controller = new $nombre_controller();

        // Determinar la acción a ejecutar
        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
        } else {
            // Si la acción no está definida, utilizar action_default
            $action = action_default;
        }
        
        // Ejecutar la acción en el controlador
        $controller->$action();
    } else {
        // Redireccionar si el controlador no existe
        header("Location:" . url_base . '?controller=Producto');
        exit;
    }
}
?>