<?php

class ItemListaDesejos
{

    public $idItemColecao;
    public $idListaDesejos;

    function __construct() 
    {
        $this->setIdItemColecao(0);
        $this->setIdListaDesejos(0);
    }

    function __destruct() 
    {
        
    }

    function getIdItemColecao() 
    {
        return $this->idItemColecao;
    }

    function setIdItemColecao($idItemColecao) 
    {
        $this->idItemColecao = $idItemColecao;
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
