<?php

class ListaDesejos
{

    public $idListaDesejos;
    public $idUsuDono;

    function __construct() 
    {
        $this->setIdListaDesejos(0);
        $this->setIdUsuDono(0);
    }

    function __destruct() 
    {
        
    }

    function getIdUsuDono() 
    {
        return $this->idUsuDono;
    }

    function setIdUsuDono($idUsuDono) 
    {
        $this->idUsuDono = $idUsuDono;
    }

    function getIdListaDesejos() 
    {
        return $this->idListaDesejos;
    }

    function setIdListaDesejos($idListaDesejos) 
    {
        $this->idListaDesejos = $idListaDesejos;
    }
    
}

?>
