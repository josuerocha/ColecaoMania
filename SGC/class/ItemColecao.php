<?php

class ItemColecao
{

    public $idItemColecao;
    public $idColecao;
    public $nome;
    public $descricao;
    public $quantidade;
    public $imagem;
    public $nroSerie;
    public $interesse;
    public $status;


    function __construct() 
    {
        $this->setStatus(0);
        $this->setIdItemColecao(0);
        $this->setIdColecao(0);
        $this->setNome("");
        $this->setDescricao("");
        $this->setQuantidade("");
        $this->setImagem("");
        $this->setNroSerie("");
        $this->setInteresse(0);
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

    function getIdItemColecao() 
    {
        return $this->idItemColecao;
    }
    
    function getStatus() 
    {
        return $this->status;
    }

    function setStatus($status) 
    {
        $this->status = $status;
    }
    
    function setIdItemColecao($idItemColecao) 
    {
        $this->idItemColecao = $idItemColecao;
    }
    
    function getIdColecao() 
    {
        return $this->idColecao;
    }

    function setIdColecao($idColecao) 
    {
        $this->idColecao = $idColecao;
    }

    function getNome() 
    {
        return $this->nome;
    }

    function setNome($nome) 
    {
        $this->nome = $nome;
    }

    function getDescricao() 
    {
        return $this->descricao;
    }

    function setDescricao($descricao) 
    {
        $this->descricao = $descricao;
    }

    function getQuantidade() 
    {
        return $this->quantidade;
    }

    function setQuantidade($quantidade) 
    {
        $this->quantidade = $quantidade;
    }
    
     function getImagem() 
    {
        return $this->imagem;
    }

    function setImagem($imagem) 
    {
        $this->imagem = $imagem;
    }
    
    function getNroSerie() 
    {
        return $this->nroSerie;
    }

    function setNroSerie($nroSerie) 
    {
        $this->nroSerie = $nroSerie;
    }
    
     function getInteresse() 
    {
        return $this->interesse;
    }

    function setInteresse($interesse) 
    {
        $this->interesse = $interesse;
    }
    
}

?>
