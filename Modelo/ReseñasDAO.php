
<?php
require_once 'Reseña.php';
class ReseñasDAO {
    public static function MostrarReseñas() {
        $conexion = DataBase::connect();
        
        $query = "SELECT r.*, u.Nombre AS NombreUsuario 
        FROM reseñas r
        INNER JOIN usuarios u ON r.Usuario = u.ID_Usuario";

$resultado = $conexion->query($query);

$reseñas = [];
while ($fila = $resultado->fetch_assoc()) {
  $res = new Reseña(
      $fila['ID_Reseña'], 
      $fila['Titulo'],
      $fila['Comentario'],
      $fila['Valoracion'],
      $fila['NombreUsuario'],  
      $fila['Pedido']
  );
  $reseñas[] = $res;
}
$conexion->close();
return $reseñas;
    }


    public static function insertarReseña(Reseña $reseña) {
        
        
        $conexion = DataBase::connect();
    
        // Preparar la consulta con sentencias preparadas
        $query = "INSERT INTO reseñas (Titulo, Comentario, Valoracion, Usuario, Pedido) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        
        // Vincular parámetros
        $stmt->bind_param("ssiii", $reseña->getTitulo(), $reseña->getComentario(), $reseña->getValoracion(), $reseña->getUsuario(), $reseña->getPedido());
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            $stmt->close();
            $conexion->close();
            return true;
        } else {
            $stmt->close();
            $conexion->close();
            return false;
        }
    }
}
?>



