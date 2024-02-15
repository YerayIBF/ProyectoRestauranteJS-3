<?php

class Cliente extends Usuario {
    public function __construct($ID_Usuario, $Nombre, $Correo, $Contraseña,$Rol) {
        parent::__construct($ID_Usuario, $Nombre, $Correo, $Contraseña,$Rol);
    }
}


?>