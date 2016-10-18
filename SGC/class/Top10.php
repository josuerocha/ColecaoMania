<?php

class Top10
{

    public $nome;
    public $imagem;
    public $qtdItens;
    public $idUsuario;

    function __construct() 
    {
        $this->setIdUsuario(0);
        $this->setImagem(0);
        $this->setNome("");
        $this->setQtdItens(0);
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

     function getIdUsuario() 
    {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) 
    {
        $this->idUsuario = $idUsuario;
    }
    
    function getImagem() 
    {
        return $this->imagem;
    }

    function setImagem($imagem) 
    {
        $this->imagem = $imagem;
    }

    function getNome() 
    {
        return $this->nome;
    }

    function setNome($nome) 
    {
        $this->nome = $nome;
    }
    
    function getQtdItens() 
    {
        return $this->qtdItens;
    }

    function setQtdItens($qtdItens) 
    {
        $this->qtdItens = $qtdItens;
    }

}

?>
