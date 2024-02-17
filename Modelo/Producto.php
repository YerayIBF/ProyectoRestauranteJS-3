<?php
include_once 'config/database.php';
class Producto {
    public $ID_Producto;
    public $nombre;
    public $precio;
    public $img;
    public $categoria; 
    public $cantidad;

    // Constructor
    public function __construct($ID_Producto, $nombre, $precio, $img, $categoria) {
        $this->ID_Producto = $ID_Producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->img = $img;
        $this->categoria = $categoria; 
        $this->cantidad = 0;

    }
    
 

public function incrementarCantidad() {
    $this->cantidad++;
}

public function getCantidad() {
    return $this->cantidad;
}

public function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
}
    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
    
    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getID_Producto()
    {
        return $this->ID_Producto;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setID_Producto($ID_Producto)
    {
        $this->ID_Producto = $ID_Producto;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}

?>