<?php
include_once __DIR__ . '/../config/database.php';
include_once 'Modelo/Usuario.php';

class UsuarioDAO {
    public static function iniciarSesion($nombreUsuario, $contraseñaUsuario) {
        $conexion = DataBase::connect();

        // Preparar la consulta para evitar la inyección SQL
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        $stmt->bind_param("s", $nombreUsuario);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Verificar si se encontró un usuario
        if ($resultado->num_rows == 1) {
            // Obtener los datos del usuario
            $filaUsuario = $resultado->fetch_assoc();

            // Verificar la contraseña utilizando password_verify
            if (password_verify($contraseñaUsuario, $filaUsuario['Contraseña'])) {
                $usuario = new Usuario($filaUsuario['ID_Usuario'], $filaUsuario['Nombre'], $filaUsuario['Correo'], $filaUsuario['Contraseña'], $filaUsuario['Rol']);

                // Cerrar la consulta y la conexión
                $stmt->close();
                $conexion->close();

                return $usuario;
            }
        }

        // Cerrar la consulta y la conexión
        $stmt->close();
        $conexion->close();

        return null; // No se encontró el usuario o la contraseña es incorrecta
    }
}