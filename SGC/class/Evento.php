<?php

class Evento 
{

    public $idEvento;
    public $idUsuCriador;
    public $nome;
    public $data;
    public $hora;
    public $numero;
    public $complemento;
    public $cep;
    public $cidade;
    public $bairro;
    public $rua;
    public $estado;
    public $idPais;
    public $nroParticipantes;

    function __construct() 
    {
        $this->setIdEvento(0);
        $this->setIdUsuCriador(0);
        $this->setNome("");
        $this->setData("");
        $this->setHora("");
        $this->setNumero("");
        $this->setComplemento("");
        $this->setCEP("");
        $this->setCidade("");
        $this->setBairro("");
        $this->setRua("");
        $this->setEstado("");
        $this->setIdPais(0);
        $this->setNroParticipantes(0);
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }

    function getIdEvento() 
    {
        return $this->idEvento;
    }

    function setIdEvento($idEvento) 
    {
        $this->idEvento = $idEvento;
    }
    
    function getIdUsuCriador() 
    {
        return $this->idUsuCriador;
    }

    function setIdUsuCriador($idUsuCriador) 
    {
        $this->idUsuCriador = $idUsuCriador;
    }

    function getNome() 
    {
        return $this->nome;
    }

    function setNome($nome) 
    {
        $this->nome = $nome;
    }

    function getData() 
    {
        return $this->data;
    }

    function setData($data) 
    {
        $this->data = $data;
    }

    function getHora() 
    {
        return $this->hora;
    }

    function setHora($hora) 
    {
        $this->hora = $hora;
    }
    
     function getNumero() 
    {
        return $this->numero;
    }

    function setNumero($numero) 
    {
        $this->numero = $numero;
    }
    
    function getComplemento() 
    {
        return $this->complemento;
    }

    function setComplemento($complemento) 
    {
        $this->complemento = $complemento;
    }
    
    function getCEP() 
    {
        return $this->cep;
    }

    function setCEP($cep) 
    {
        $this->cep = $cep;
    }
    
     function getCidade() 
    {
        return $this->cidade;
    }

    function setCidade($cidade) 
    {
        $this->cidade = $cidade;
    }
    
     function getBairro() 
    {
        return $this->bairro;
    }

    function setBairro($bairro) 
    {
        $this->bairro = $bairro;
    }
    
    function getRua() 
    {
        return $this->rua;
    }

    function setRua($rua) 
    {
        $this->rua = $rua;
    }
    
    function getEstado() 
    {
        return $this->estado;
    }

    function setEstado($estado) 
    {
        $this->estado = $estado;
    }
    
    function getIdPais() 
    {
        return $this->idPais;
    }

    function setIdPais($idPais) 
    {
        $this->idPais = $idPais;
    }
    
    function getNroParticipantes() 
    {
        return $this->nroParticipantes;
    }

    function setNroParticipantes($nroParticipantes) 
    {
        $this->nroParticipantes = $nroParticipantes;
    }
}

?>
