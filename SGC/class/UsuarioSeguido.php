<?php

class UsuarioSeguido
{

    public $idUsuSeguido;
    public $idUsuario;

    function __construct() 
    {
        $this->setIdUsuSeguido(0);
        $this->setIdUsuario(0);
    }

    function __destruct() 
    {
        
    }

    function getIdUsuario() 
    {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) 
    {
        $this->idUsuario = $idUsuario;
    }

    function getIdUsuSeguido() 
    {
        return $this->idUsuSeguido;
    }

    function setIdUsuSeguido($idUsuSeguido) 
    {
        $this->idUsuSeguido = $idUsuSeguido;
    }
    
}

?>
