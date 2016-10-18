<?php

class SugestaoTipo
{

    public $idSugestaoTipo;
    public $idUsuSg;
    public $nome;

    function __construct() 
    {
        $this->setIdSugestaoTipo(0);
        $this->setIdUsuSg(0);
        $this->setNome("");
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

    function getIdSugestaoTipo() 
    {
        return $this->idSugestaoTipo;
    }

    function setIdSugestaoTipo($idSugestaoTipo) 
    {
        $this->idSugestaoTipo = $idSugestaoTipo;
    }
    
    function getIdUsuSg() 
    {
        return $this->idUsuSg;
    }

    function setIdUsuSg($idUsuSg) 
    {
        $this->idUsuSg = $idUsuSg;
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
