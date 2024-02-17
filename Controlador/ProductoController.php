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
            $rolUsuario = isset($_SESSION['Rol']) ? $_SESSION['Rol'] : '';
        }
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
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

       
         $totalCompra = 0;
    foreach ($cesta as $producto) {
        $totalProducto = $producto->getPrecio() * $producto->getCantidad();
        $totalCompra += $totalProducto;
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


  

    public function eliminarproductocesta() {
        session_start(); // Iniciar la sesión si aún no se ha iniciado
        
        // Verificar si la sesión y la variable de la cesta están definidas y son un array
        if (isset($_SESSION['cesta']) && is_array($_SESSION['cesta'])) {
            // Obtener el ID del producto a eliminar
            if (isset($_POST["producto_id"])) {
                $producto_id = $_POST["producto_id"];
    
                // Buscar el índice del producto en el array de la cesta
                $index = array_search($producto_id, array_column($_SESSION['cesta'], 'ID_Producto'));
    
                // Verificar si se encontró el producto en la cesta
                if ($index !== false) {
                    // Eliminar el producto de la cesta
                    unset($_SESSION['cesta'][$index]);
                    header("Location: " . url_base . '?controller=Producto&action=cestamostrar');
                    exit(); 
                } 
            } 
        } 
    }
        
    

    public function agregarcesta() {
      
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
  
        if (!isset($_SESSION['ID_Usuario'])) {
            header("Location: " . url_base . '?controller=Producto&action=loginmostrar');
            exit();
        }
        if (isset($_POST["producto_id"])) {
            $producto_id = $_POST["producto_id"];
            
            // Obtener el producto desde la base de datos usando el ID
            $producto = ProductoDAO::getProductoByID($producto_id);
    
            if ($producto != null) {
                // Inicializar la cesta si no existe en la sesión
                if (!isset($_SESSION['cesta'])) {
                    $_SESSION['cesta'] = array();
                }
    
                // Verificar si el producto ya está en la cesta
                $producto_encontrado = false;
                foreach ($_SESSION['cesta'] as $indice => $item) {
                    if ($item->getID_Producto() == $producto_id) {
                        // El producto ya está en la cesta, aumentar su cantidad
                        $_SESSION['cesta'][$indice]->setCantidad($item->getCantidad() + 1);
                        $producto_encontrado = true;
                        break;
                    }
                }
    
                // Si el producto no estaba en la cesta, agregarlo con cantidad 1
                if (!$producto_encontrado) {
                    $producto->setCantidad(1); // Cantidad predeterminada
                    $_SESSION['cesta'][] = $producto;
                }
                
            

                header("Location: " . url_base . '?controller=Producto&action=cartamostrar');
                exit();
            } else {
                echo "Error: Producto no encontrado.";
            }
        } else {
            echo "Error: No se ha proporcionado el ID del producto.";
        }
    }

    
    public function finalizarPedido() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['ID_Usuario'])) {
            // Redirigir al usuario a iniciar sesión si no lo está
            header("Location: " . url_base . '?controller=Producto&action=loginmostrar');
            exit();
        }
    
        // Obtener el ID de usuario de la sesión
        $usuarioID = $_SESSION['ID_Usuario'];
    
        // Verificar si hay productos en el carrito
        if (!isset($_SESSION['cesta']) || empty($_SESSION['cesta'])) {
            echo "Error: No hay productos en el carrito.";
            exit();
        }
    
        try {
            // Guardar el pedido en la base de datos
            $pedidoDAO = new PedidoDAO();
            $pedido = $pedidoDAO->guardarpedido($usuarioID, $_SESSION['cesta']);
    
            if ($pedido) {
                // Eliminar los productos del carrito
                unset($_SESSION['cesta']);
    
                // Redirigir a una página de confirmación de compra o a otra ubicación
                header("Location: " . url_base . '?controller=Producto&action=confirmacionCompra');
                exit();
            } else {
                echo "Error al guardar el pedido.";
                exit();
            }
        } catch (Exception $e) {
            echo "Error al finalizar la compra: " . $e->getMessage();
            exit();
        }
    }
        
    
       
}



        
    ?>