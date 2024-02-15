
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
}
?>


