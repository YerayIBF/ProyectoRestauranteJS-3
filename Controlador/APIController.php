<?php
include_once 'modelo/Reseña.php';
include_once 'modelo/ReseñasDAO.php';

class APIController{    
    
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $accion = $_GET["action"];
            
            if ($accion == 'buscar_reseñas') {
                $resultado = $this->buscarReseñas();
                echo  json_encode($resultado);
      
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
}

?>