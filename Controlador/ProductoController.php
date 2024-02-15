<?php
include_once __DIR__ . '/../Modelo/ProductoDAO.php';
include_once __DIR__ . '/../Modelo/UsuarioDAO.php';
include_once __DIR__ . '/../config/parameters.php';
include_once __DIR__ . '/../modelo/Producto.php';

class productoController{
    public function index(){
        //llamo al modelo para obtener los datos
        $TodosProductos = ProductoDAO::getAllProducts();
        //cabecera
        include_once '../views/Header.php';
        //productos
        include_once '../views/Carta.php';
        //foooter
        include_once '../views/Footer.php';
    }

    public function crearProducto() {

    }

    public function editarProducto() {

    }

    public function eliminarProducto() {
    }

   
    public function login() {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombreUsuario"], $_POST["contraseñaUsuario"])) {
            $nombreUsuario = $_POST["nombreUsuario"];
            $contraseñaUsuario = $_POST["contraseñaUsuario"];
        }
        
            $usuarioAutenticado = UsuarioDAO::iniciarSesion($nombreUsuario, $contraseñaUsuario);
    
            if ($usuarioAutenticado) {
                
                $_SESSION['ID_Usuario'] = $usuarioAutenticado->getID_Usuario();
    
             
                header("Location: index.php?controller=producto&action=index");
                exit();
            } else {
              
                $errorMensaje = "Credenciales incorrectas. Por favor, intenta de nuevo.";
            }
        }
    }
        
    ?>


    
   
