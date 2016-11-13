<?php

class Colecao
{

    public $idColecao;
    public $descricao;
    public $nome;
    public $idTipoColecao;
    public $idUsuDono;
    public $status;
    public $idFotoAlbum;

    function __construct() 
    {
         $this->setStatus(0);
        $this->setIdColecao(0);
        $this->setNome("");
        $this->setDescricao("");
        $this->setIdTipoColecao(0);
        $this->setIdUsuDono(0);
        $this->setIdFotoAlbum(0);
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }
    
    function getIdFotoAlbum()
    {
        return $this->idFotoAlbum;
    }
    
    function setIdFotoAlbum($idFoto)
    {
        $this->idFotoAlbum = $idFoto;
    }

    function getStatus() 
    {
        return $this->status;
    }

    function setStatus($status) 
    {
        $this->status = $status;
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

    function getIdTipoColecao() 
    {
        return $this->idTipoColecao;
    }

    function setIdTipoColecao($idTipoColecao) 
    {
        $this->idTipoColecao = $idTipoColecao;
    }
    
    function getIdUsuDono() 
    {
        return $this->idUsuDono;
    }

    function setIdUsuDono($idUsuDono) 
    {
        $this->idUsuDono = $idUsuDono;
    }

}

?>
