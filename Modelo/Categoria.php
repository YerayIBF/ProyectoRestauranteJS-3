<?php
class Categoria {
    public $ID_Categoria;
    public $NombreCategoria;

    // Constructor
    public function __construct($ID_Categoria, $NombreCategoria) {
        $this->ID_Categoria = $ID_Categoria;
        $this->NombreCategoria = $NombreCategoria;
    }

    /**
     * Get the value of ID_Categoria
     */ 
    public function getID_Categoria()
    {
        return $this->ID_Categoria;
    }

    /**
     * Set the value of ID_Categoria
     *
     * @return  self
     */ 
    public function setID_Categoria($ID_Categoria)
    {
        $this->ID_Categoria = $ID_Categoria;

        return $this;
    }

    /**
     * Get the value of NombreCategoria
     */ 
    public function getNombreCategoria()
    {
        return $this->NombreCategoria;
    }

    /**
     * Set the value of NombreCategoria
     *
     * @return  self
     */ 
    public function setNombreCategoria($NombreCategoria)
    {
        $this->NombreCategoria = $NombreCategoria;

        return $this;
    }
}
?>