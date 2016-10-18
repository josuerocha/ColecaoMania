<?php

class ParticipaEvento
{

    public $idEvento;
    public $idUsuario;

    function __construct() 
    {
        $this->setIdEvento(0);
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

    function getIdEvento() 
    {
        return $this->idEvento;
    }

    function setIdEvento($idEvento) 
    {
        $this->idEvento = $idEvento;
    }
    
}

?>