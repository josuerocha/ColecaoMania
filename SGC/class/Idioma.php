<?php

class Idioma
{

    public $idIdioma;
    public $nome;

    function __construct() 
    {
        $this->setIdIdioma(0);
        $this->setNome("");
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

    function getIdIdioma() 
    {
        return $this->idIdioma;
    }

    function setIdIdioma($idIdioma) 
    {
        $this->idIdioma = $idIdioma;
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
