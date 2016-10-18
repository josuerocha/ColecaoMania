<?php

class Pais
{

    public $idPais;
    public $nome;

    function __construct() 
    {
        $this->setIdPais(0);
        $this->setNome("");
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

    function getIdPais() 
    {
        return $this->idPais;
    }

    function setIdPais($idPais) 
    {
        $this->idPais = $idPais;
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
