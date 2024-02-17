<?php
class Pedido {
    private $idPedido;
    private $precioTotal;
    private $usuario;
    private $propina;
    private $precioStandard;

    // Constructor para inicializar los atributos del Pedido
    public function __construct($idPedido, $precioTotal, $usuario, $propina, $precioStandard) {
        $this->idPedido = $idPedido;
        $this->precioTotal = $precioTotal;
        $this->usuario = $usuario;
        $this->propina = $propina;
        $this->precioStandard = $precioStandard;
    }



    /**
     * Get the value of precioStandard
     */ 
    public function getPrecioStandard()
    {
        return $this->precioStandard;
    }

    /**
     * Set the value of precioStandard
     *
     * @return  self
     */ 
    public function setPrecioStandard($precioStandard)
    {
        $this->precioStandard = $precioStandard;

        return $this;
    }

    /**
     * Get the value of propina
     */ 
    public function getPropina()
    {
        return $this->propina;
    }

    /**
     * Set the value of propina
     *
     * @return  self
     */ 
    public function setPropina($propina)
    {
        $this->propina = $propina;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of idPedido
     */ 
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set the value of idPedido
     *
     * @return  self
     */ 
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    /**
     * Get the value of precioTotal
     */ 
    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    /**
     * Set the value of precioTotal
     *
     * @return  self
     */ 
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;

        return $this;
    }
}
?>