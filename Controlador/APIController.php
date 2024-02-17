<?php
include_once 'Modelo/Reseña.php';
include_once 'Modelo/ReseñasDAO.php';
include_once 'Modelo/producto.php';
include_once 'Modelo/productoDAO.php';
include_once 'Modelo/UsuarioDAO.php';

class APIController
{

    public function index()
    {
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
            } elseif ($accion == 'calcular_y_actualizar_puntos') {
                // Obtener los datos necesarios para calcular y actualizar puntos
                $usuarioID = $_POST['usuario_id'];
                $totalCompra = $_POST['total_compra'];

                $this->calcularYActualizarPuntos($usuarioID, $totalCompra);
            }
        }
    }

    private function buscarReseñas()
    {
        try {
            $reseñas = ReseñasDAO::MostrarReseñas();
            return $reseñas;
        } catch (Exception $e) {
            echo json_encode(["message" => "Error al buscar reseñas: " . $e->getMessage()]);
            return array(); // Devuelve un array vacío en caso de error
        }
    }

    private function insertarReseña()
    {
        // Código para insertar una reseña, sin cambios
    }

    private function calcularYActualizarPuntos($usuarioID, $totalCompra)
    {
        try {

            $puntosGanados = $totalCompra * 5;

            // Obtener los puntos actuales del cliente
            $puntosActuales = UsuarioDAO::obtenerPuntosCliente($usuarioID);

            // Calcular los nuevos puntos sumando los puntos actuales con los puntos ganados
            $nuevosPuntos = $puntosActuales + $puntosGanados;

            // Actualizar los puntos del cliente en la base de datos
            $actualizacionExitosa = UsuarioDAO::actualizarPuntosCliente($usuarioID, $nuevosPuntos);

            // Devolver el resultado de la actualización como JSON
            if ($actualizacionExitosa) {
                echo json_encode(["success" => true, "new_points" => $nuevosPuntos]);
            } else {
                echo json_encode(["success" => false, "message" => "Error al actualizar los puntos del usuario"]);
            }
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => "Error al calcular y actualizar puntos: " . $e->getMessage()]);
        }
    }

    public static function MostrarPedidoFinalizado()
    {
        include_once 'vista/header.php';
        include_once 'vista/PedidoFinalizado.php';
        include_once 'vista/footer.php';
    }
}
