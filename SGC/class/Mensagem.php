<?php

class Mensagem
{

    public $idMensagem;
    public $idUsuEnvia;
    public $idUsuRecebe;
    public $texto;
    public $hora;
    public $data;
    public $status;

    function __construct() 
    {
        $this->setIdMensagem(0);
        $this->setIdUsuEnvia(0);
        $this->setIdUsuRecebe(0);
        $this->setTexto("");
        $this->setHora("");
        $this->setData("");
        $this->setStatus(0);
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getTexto();
    }

    function getIdMensagem() 
    {
        return $this->idMensagem;
    }

    function setIdMensagem($idMensagem) 
    {
        $this->idMensagem = $idMensagem;
    }
    
    function getIdUsuEnvia() 
    {
        return $this->idUsuEnvia;
    }

    function setIdUsuEnvia($idUsuEnvia) 
    {
        $this->idUsuEnvia = $idUsuEnvia;
    }
    
    function getIdUsuRecebe() 
    {
        return $this->idUsuRecebe;
    }

    function setIdUsuRecebe($idUsuRecebe) 
    {
        $this->idUsuRecebe = $idUsuRecebe;
    }

    function getTexto() 
    {
        return $this->texto;
    }

    function setTexto($texto) 
    {
        $this->texto = $texto;
    }

    function getHora() 
    {
        return $this->hora;
    }

    function setHora($hora) 
    {
        $this->hora = $hora;
    }

    function getData() 
    {
        return $this->data;
    }

    function setData($data) 
    {
        $this->data = $data;
    }
    function getStatus() 
    {
        return $this->status;
    }

    function setStatus($status) 
    {
        $this->status = $status;
    }
    
}

?>
