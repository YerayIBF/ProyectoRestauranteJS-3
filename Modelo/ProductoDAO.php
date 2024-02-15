<?php
include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../modelo/Producto.php';

class ProductoDAO {
    public static function getAllProducts(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos");
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
            
        $listaDeProductos = array();
    
        while ($row = $result->fetch_object()) {
            $producto = new Producto($row->ID_Producto, $row->Nombre, $row->Precio, $row->Img);
            $listaDeProductos[] = $producto;
        }
        return $listaDeProductos;
    }
    
    public static function getProductoByID($id){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM producto WHERE ID_Producto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
    
        if ($row = $result->fetch_object()) {
            return new Producto($row->ID_Producto, $row->Nombre, $row->Precio, $row->Img);
        } else {
            return null;
        }
    }
}    
?>