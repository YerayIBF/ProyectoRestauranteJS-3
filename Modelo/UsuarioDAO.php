<?php
include_once 'config/database.php';
include_once 'Usuario.php';

class UsuarioDAO {


    public static function registrarUsuario($nombreUsuario, $correoUsuario, $contraseñaHash) {
        $conexion = DataBase::connect();

        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }

        $stmt = $conexion->prepare("INSERT INTO usuarios (Nombre, Correo, Contraseña, Rol) VALUES (?, ?, ?, 'Cliente')");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $stmt->bind_param("sss", $nombreUsuario, $correoUsuario, $contraseñaHash);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexion->close();

        return $resultado;
    }

    //Metodo para iniciar sesion

    public static function iniciarSesion($nombreUsuario, $contraseñaUsuario) {
        $conexion = DataBase::connect();
    
        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }
    
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }
    
        $stmt->bind_param("s", $nombreUsuario);
    
        $stmt->execute();
        if (!$stmt->execute()) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }
    
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows == 1) {
            $filaUsuario = $resultado->fetch_object();
    
            if (password_verify($contraseñaUsuario, $filaUsuario->Contraseña)) {
                $usuario = new Usuario(
                    $filaUsuario->ID_Usuario,
                    $filaUsuario->Nombre,
                    $filaUsuario->Correo,
                    $filaUsuario->Contraseña,
                    $filaUsuario->Rol,
                    $filaUsuario->Puntos
                );
        
                $stmt->close();
                $conexion->close();
    
                return $usuario;
            } else {
                echo "Contraseña incorrecta";
                echo "Nombre de usuario: " . $nombreUsuario . "<br>";
                echo "Contraseña: " . $contraseñaUsuario . "<br>";
            }
        } else {
            echo "Nombre de usuario no encontrado";
        }
    
        $stmt->close();
        $conexion->close();
    
      
    }
}
?>