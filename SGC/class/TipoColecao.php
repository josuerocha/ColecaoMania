<?php

class TipoColecao
{

    public $idTipoColecao;
    public $nome;

    function __construct() 
    {
        $this->setIdTipoColecao(0);
        $this->setNome("");
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

    function getIdTipoColecao() 
    {
        return $this->idTipoColecao;
    }

    function setIdTipoColecao($idTipoColecao) 
    {
        $this->idTipoColecao = $idTipoColecao;
    }

    function getNome() 
    {
        return $this->nome;
    }

    function setNome($nome) 
    {
        $this->nome = $nome;
    }

}

?>
