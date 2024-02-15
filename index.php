<?php 
include_once 'config/parameters.php';
include_once 'Controlador/ProductoController.php';

if (!isset($_GET['controller'])) {
    // Si no se especifica un controlador, redirige a la página de inicio
    header("Location:" . url_base);
} else {
    $nombre_controlador = $_GET['controller'] . 'Controller';

    if (class_exists($nombre_controlador)) {
        // Miramos si nos pasa una acción
        // En caso contrario, mostramos la acción por defecto
        $controller = new $nombre_controlador();

        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
        }  
        $controller->$action();
    } else {
        // Redirige a la página de inicio en caso de que el controlador no exista
        header("Location:" . url_base);
    }
}
?>
