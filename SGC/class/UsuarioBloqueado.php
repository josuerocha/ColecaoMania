<?php

class UsuarioBloqueado
{

    public $idUsuBloqueado;
    public $idUsuario;

    function __construct() 
    {
        $this->setIdUsuBloqueado(0);
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

    function getIdUsuBloqueado() 
    {
        return $this->idUsuBloqueado;
    }

    function setIdUsuBloqueado($idUsuBloqueado) 
    {
        $this->idUsuBloqueado = $idUsuBloqueado;
    }
    
}

?>
