<?php
include_once 'Modelo/Reseña.php';
include_once 'Modelo/ReseñasDAO.php';
include_once 'Modelo/producto.php';
include_once 'Modelo/productoDAO.php';
class APIController{ 

    
   public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $accion = $_GET["action"];
            
            if ($accion == 'buscar_reseñas') {
                $resultado = $this->buscarReseñas();
                echo json_encode($resultado);
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["action"];
            if ($accion == 'insertar_reseñas') {
            $this->insertarReseña();
        }
        }
    }
    
    
    
    private function buscarReseñas() {
        try {
            $reseñas = ReseñasDAO::MostrarReseñas();
            
            return $reseñas;
        } catch (Exception $e) {
            echo "Error al buscar reseñas: " . $e->getMessage();
            return array(); // Devuelve un array vacío en caso de error
        }
    }

    private function insertarReseña() {
        // Obtener los datos del formulario de la solicitud POST
        $data = json_decode(file_get_contents("php://input"));
        
        // Crear una nueva instancia de Reseña con los datos recibidos
        $reseña = new Reseña(
            null, // No necesito proporcionar el ID_Reseña aquí se genera automáticamente en la base de datos
            $data->titulo,
            $data->comentario,
            $data->valoracion,
            $data->usuario,
            $data->pedido 
        );
        
        // Insertar la reseña utilizando el método insertarReseña de la clase ReseñasDAO
        try {
            $resultado = ReseñasDAO::insertarReseña($reseña);
            // Devolver el resultado de la inserción como JSON
            echo json_encode(["message" => $resultado ? "La reseña se insertó correctamente." : "Error al insertar la reseña."]);
        } catch (Exception $e) {
            // Error al insertar la reseña debido a una excepción
            echo json_encode(["message" => "Error al insertar la reseña: " . $e->getMessage()]);
        }
    }

}
?>