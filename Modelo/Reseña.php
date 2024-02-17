<?php
class Reseña {
    public $ID_Reseña;
    public $Titulo;
    public $Comentario;
    public $Valoracion;
    public $Usuario;
    public $Pedido;

    public function __construct($ID_Reseña, $Titulo, $Comentario, $Valoracion, $Usuario, $Pedido) {
        $this->ID_Reseña = $ID_Reseña;
        $this->Titulo = $Titulo;
        $this->Comentario = $Comentario;
        $this->Valoracion = $Valoracion;
        $this->Usuario = $Usuario;
        $this->Pedido = $Pedido;
    }

    /**
     * Get the value of Pedido
     */ 
    
    public function getPedido()
    {
        return $this->Pedido;
    }

    /**
     * Set the value of Pedido
     *
     * @return  self
     */ 
    public function setPedido($Pedido)
    {
        $this->Pedido = $Pedido;

        return $this;
    }

    /**
     * Get the value of Usuario
     */ 
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @return  self
     */ 
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    /**
     * Get the value of Valoracion
     */ 
    public function getValoracion()
    {
        return $this->Valoracion;
    }

    /**
     * Set the value of Valoracion
     *
     * @return  self
     */ 
    public function setValoracion($Valoracion)
    {
        $this->Valoracion = $Valoracion;

        return $this;
    }

    /**
     * Get the value of Comentario
     */ 
    public function getComentario()
    {
        return $this->Comentario;
    }

    /**
     * Set the value of Comentario
     *
     * @return  self
     */ 
    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario;

        return $this;
    }

    /**
     * Get the value of Titulo
     */ 
    public function getTitulo()
    {
        return $this->Titulo;
    }

    /**
     * Set the value of Titulo
     *
     * @return  self
     */ 
    public function setTitulo($Titulo)
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    /**
     * Get the value of ID_Reseña
     */ 
    public function getID_Reseña()
    {
        return $this->ID_Reseña;
    }

    /**
     * Set the value of ID_Reseña
     *
     * @return  self
     */ 
    public function setID_Reseña($ID_Reseña) {
        $this->ID_Reseña = $ID_Reseña;
    }
}
?>