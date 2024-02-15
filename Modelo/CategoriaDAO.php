<?php
include_once 'config/database.php';
include_once 'categoria.php';
class CategoriaDAO {
    public static function getAllCategories(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM categorias");
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
            
        $listaDeCategorias = array();
    
        while ($row = $result->fetch_object()) {
            $categoria = new Categoria($row->ID_Categoria, $row->NombreCategoria);
            $listaDeCategorias[] = $categoria;
        }
        return $listaDeCategorias;
    }
}
?>
