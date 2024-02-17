<?php
include_once 'config/database.php';
include_once 'Pedido.php';

class PedidoDAO {

    public function guardarpedido($usuario_ID, $carrito) {
        try {
            $conexion = DataBase::connect();
    
            // Inicializar el precio total
            $precioTotal = 0;
    
            // Recorrer el carrito
            foreach ($carrito as $producto) {
                // Obtener el precio del producto y la cantidad
                $precioProducto = $producto->getPrecio();
                $cantidad = $producto->getCantidad();
    
                // Calcular el precio total sumando el precio del producto multiplicado por la cantidad
                $precioTotal += $precioProducto * $cantidad;
            }
    
            // Insertar el pedido en la tabla de pedidos
            $query = "INSERT INTO pedidos (Precio_Total, Usuario, Propina, PrecioStandard) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($query);
    
            // Valor predeterminado para la propina (0)
            $propina = 0;
    
            // Valor predeterminado para el precio estándar (0)
            $precioStandard = 0;
    
            // Asignar los parámetros y ejecutar la consulta
            $stmt->bind_param("iiii", $precioTotal, $usuario_ID, $propina, $precioStandard);
            $stmt->execute();
    
            // Obtener el ID del pedido recién insertado
            $pedidoID = $stmt->insert_id;
    
            // Cerrar la conexión
            $conexion->close();
    
            // Devolver verdadero si el pedido se guardó correctamente
            return true;
        } catch (Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante el proceso
            echo "Error al guardar el pedido: " . $e->getMessage();
            return false;
        }
    }
public static function obtenerTodosLosPedidos() {
        $conexion = DataBase::connect();
        $query = "SELECT * FROM pedidos";
        $result = $conexion->query($query);
        $pedidos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedido = new Pedido(
                    $row['ID_Pedido'],
                    $row['Precio_Total'],
                    $row['Usuario'],
                    $row['Propina'],
                    $row['PrecioStandard']
                );
                $pedidos[] = $pedido;
            }
        }

        $conexion->close();
        return $pedidos;
    }
}

?>