<?php
//include_once 'vista/login.php';
include_once 'modelo/ProductoDAO.php';
include_once 'modelo/UsuarioDAO.php';
include_once 'config/parameters.php';
include_once 'modelo/Producto.php';
include_once 'modelo/PedidoDAO.php';
include_once 'modelo/Pedido.php';
include_once 'modelo/Usuario.php';
include_once 'Controlador/APIController.php';
//



class ProductoController{
    public function index() {
        // Llamo al modelo para obtener los datos
        $TodosProductos = ProductoDAO::getAllProducts();
        // Cabecera

        //  Home
        include_once 'vista/header.php';
        include_once 'vista/home.php';
        include_once 'vista/footer.php';
        // Footer
    }

    public function crearproducto() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $imagen_nombre = $_POST["imagen_nombre"];
    
            // Validar y limpiar datos si es necesario
    
            // Lógica para insertar el nuevo producto en la base de datos
            $creado = ProductoDAO::crearproducto($nombre, $precio, $imagen_nombre);
    
            if ($creado) {
                // Redirige a la página de la carta u otra ubicación
                header("Location: " . url_base . '?controller=Producto&action=cartamostrar');
                exit();
            } else {
                echo "Error al crear el producto.";
            }
        }
    }

    public function editarproducto() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto_id"])) {
            $producto_id = $_POST["producto_id"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $imagen_nombre = $_POST["imagen_nombre"];
    
            $actualizado = ProductoDAO::actualizarproductos($producto_id, $nombre, $precio, $imagen_nombre);
    
            if ($actualizado) {
                header("Location: " . url_base . '?controller=Producto&action=cartamostrar');
                exit();
            } else {
                echo "Error al actualizar el producto.";
            }
        }
    }

    public function eliminarproducto() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto_id"])) {
            $producto_id = $_POST["producto_id"];
    
            $eliminado = ProductoDAO::eliminarproducto($producto_id);
    
            if ($eliminado) {
                header("Location: " . url_base . '?controller=Producto&action=cartamostrar');
                exit();
            } else {
                echo "Error al eliminar el producto.";
            }
        }
    }


    
    public function loginmostrar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_SESSION['ID_Usuario'])) {
           header("Location: " . url_base . '?controller=Producto&action=homemostrar');
            exit();
        } else {
            include_once 'vista/header.php';
            include_once 'vista/login.php';
            include_once 'vista/footer.php';
            
        }
    }

    public function cartamostrar() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $rolUsuario = isset($_SESSION['rolUsuario']) ? $_SESSION['rolUsuario'] : '';
        }
        
        include_once 'modelo/ProductoDAO.php';
        $productos = ProductoDAO::getAllProducts();
        include_once 'vista/header.php';
        include_once 'vista/carta.php';
        include_once 'vista/footer.php';
    }

    public function  homemostrar() {
        include_once 'vista/header.php';
        include_once 'vista/home.php';
        include_once 'vista/footer.php';
    }

    public function editarmostrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto_id"])) {
            $producto_id = $_POST["producto_id"];
            // Obtener detalles del producto para pasar a la página de edición
            $producto = ProductoDAO::getProductoById($producto_id);
            include_once 'vista/editar.php';
        }
    }

    public function crearmostrar() {
        include_once 'vista/Crear.php';
    }

    public function cestamostrar(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cesta = isset($_SESSION['cesta']) ? $_SESSION['cesta'] : array();

        $precioTotal = 0;
        foreach ($cesta as $producto) {
            $precioTotal += $producto->getPrecio();
        }
        include_once 'vista/header.php';
        include_once 'vista/cesta.php';
        include_once 'vista/footer.php';
    }

    public function reseñasmostrar(){
        include_once 'vista/header.php';
        include_once 'vista/Reseñas.php';
        include_once 'vista/footer.php'; 
    }
    
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["action"]) && $_GET["action"] == "login") {
            $nombreUsuario = $_POST["nombreUsuario"];
            $contraseñaUsuario = $_POST["contraseñaUsuario"];
    
            $usuarioAutenticado = UsuarioDAO::iniciarSesion($nombreUsuario, $contraseñaUsuario);
    
            if ($usuarioAutenticado != null) {
                session_start();
                $_SESSION['ID_Usuario'] = $usuarioAutenticado->getID_Usuario();
                $_SESSION['Rol'] = $usuarioAutenticado->getRol();
                $_SESSION['Puntos'] = $usuarioAutenticado->getPuntos();
                
                header("Location: " . url_base . '?controller=Producto&action=homemostrar');
                exit();
            } else {
                echo "Credenciales incorrectas. Por favor, intenta de nuevo.";
            }
        }
    }

    public function registro() {
     
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["action"])) {
            if ($_GET["action"] == "registro") {
                //Recuperar los datos del formulario
                $nombreUsuario = $_POST["nombreUsuario"];
                $correoUsuario = $_POST["correoUsuario"];
                $contraseñaUsuario = $_POST["contraseñaUsuario"];
        
                //Hash de la contraseña antes de almacenarla
                $hashContraseña = password_hash($contraseñaUsuario, PASSWORD_DEFAULT);
        
                // Lógica para registrar al usuario en mi base de datos
                $conexion = DataBase::connect();
                $stmt = $conexion->prepare("INSERT INTO usuarios (Nombre, Correo, Contraseña, Rol) VALUES (?, ?, ?, 'Cliente')");
                $stmt->bind_param("sss", $nombreUsuario, $correoUsuario, $hashContraseña);
        
                if ($stmt->execute()) {
                    // Registro exitoso, redirige al usuario
                    header("Location: ".   url_base . '?controller=Producto&action=homemostrar');
                
                } else {
                    echo "Error al registrar el usuario.";
                    
                }
                $stmt->close();
                $conexion->close();
            }
        }
    }


    public function finalizarPedido() {
        // Iniciar la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Obtener el carrito de la sesión
        $carrito = isset($_SESSION['cesta']) ? $_SESSION['cesta'] : array();
    
        // Verificar si hay productos en el carrito
        if (count($carrito) > 0) {
           
            $usuario_id = isset($_SESSION['ID_Usuario']) ? $_SESSION['ID_Usuario'] : null;
    
      
            $pedidoGuardado = PedidoDAO::guardarPedido($usuario_id, $carrito);
    
            // Limpiar el carrito después de finalizar el pedido
            unset($_SESSION['cesta']);
    
            if ($pedidoGuardado) {
                echo "Pedido finalizado con éxito.";
            } else {
                echo "Error al finalizar el pedido.";
            }
        } else {
            echo "El carrito está vacío. Añade productos antes de finalizar el pedido.";
        }
    }    
        

    public function eliminarproductocesta() {
     
        $producto_id = $_POST["producto_id"];
    
        // Obtener el carrito de las cookies
        $carrito = isset($_COOKIE['cesta']) ? unserialize($_COOKIE['cesta']) : array();

        foreach ($carrito as $key => $productoEnCarrito) {
            if ($productoEnCarrito->getID_Producto() == $producto_id) {
                unset($carrito[$key]);
                break;
            }
        }
    
        
        setcookie('carrito', serialize($carrito), time() + (86400 * 30), "/"); // Caducidad de 30 días
    
      
        header("Location: " . url_base . '?controller=Producto&action=cestamostrar');
        exit();
    }

    public function agregarcesta() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto_id"])) {
          // Obtener el ID del producto que se va a añadir al carrito
    $producto_id = $_POST["producto_id"];

    // Obtener detalles del producto (por ejemplo, de la base de datos)
    $producto = ProductoDAO::getProductoByID($producto_id);

    // Obtener el carrito de las cookies
    $cesta = isset($_COOKIE['cesta']) ? unserialize($_COOKIE['cesta']) : array();

    // Verificar si el producto ya está en el carrito
    $productoexistente = false;
    foreach ($cesta as &$productoencesta) {
        if ($productoencesta->getID_Producto() == $producto->getID_Producto()) {
            // Incrementar la cantidad si el producto ya está en el carrito
            $productoencesta['cantidad']++;
            $productoexistente = true;
            break;
        }
    }

    // Si el producto no está en el carrito, añadirlo con cantidad 1
  

    // Guardar el carrito actualizado en las cookies
    setcookie('cesta', serialize($cesta), time() + (86400 * 30), "/"); 
    // Redirigir a la página de la carta
    header("Location: " . url_base . '?controller=Producto&action=cartamostrar');
    exit();
}
    }
}


        
        
    ?>