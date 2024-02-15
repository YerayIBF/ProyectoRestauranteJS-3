<?php
include_once 'config/database.php';
include_once 'Producto.php';
include_once 'Categoria.php';
include_once 'CategoriaDAO.php';
    class ProductoDAO {
        public static function getAllProducts(){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT p.*, c.ID_Categoria AS Categoria  FROM productos p LEFT JOIN categorias c  ON p.Categoria = c.ID_Categoria");
            $stmt->execute();
            $result = $stmt->get_result();
            $con->close();
                
            $listaDeProductos = array();
        
            while ($row = $result->fetch_object()) {
                $producto = new Producto($row->ID_Producto, $row->Nombre, $row->Precio, $row->Img, $row->Categoria);
                $listaDeProductos[] = $producto;
            }
            return $listaDeProductos;
        }
        
        public static function getProductoByID($id){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT p.*, c.ID_Categoria AS Categoria FROM productos p LEFT JOIN categorias c ON p.Categoria = c.ID_Categoria  WHERE p.ID_Producto = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $con->close();
        
            if ($row = $result->fetch_object()) {
                return new Producto($row->ID_Producto, $row->Nombre, $row->Precio, $row->Img, $row->Categoria);
            } else {
                return null;
            }
        }
    
        // Los métodos restantes se mantienen sin cambios, ya que no interactúan directamente con la tabla 'productos'.
    
    
    public static function actualizarproductos($producto_id, $nombre, $precio, $imagen_nombre) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE productos SET Nombre = ?, Precio = ?, Img = ? WHERE ID_Producto = ?");
        $stmt->bind_param("sssi", $nombre, $precio, $imagen_nombre, $producto_id);
    
        $actualizado = $stmt->execute();
        
        $stmt->close();
        $con->close();
    
        return $actualizado;
    }
    
    


    public static function crearproducto($nombre, $precio, $imagen_nombre) {
        $con = DataBase::connect();
        $stmt = $con->prepare("INSERT INTO productos (Nombre, Precio, Img) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $precio, $imagen_nombre);
    
        $creado = $stmt->execute();
    
        $stmt->close();
        $con->close();
    
        return $creado;
    }

    public static function eliminarProducto($producto_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("DELETE FROM productos WHERE ID_Producto = ?");
        $stmt->bind_param("i", $producto_id);
    
        $eliminado = $stmt->execute();
    
        $stmt->close();
        $con->close();
    
        return $eliminado;
    }
}    
?>