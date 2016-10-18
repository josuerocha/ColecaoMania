<?php

class Notificacao
{

    public $idUsuNotf;
    public $idUsuario;
    public $obs;
    public $idNotf;
    public $status;
    public $idItemNotf;

    function __construct() 
    {
        $this->setIdUsuNotf(0);
        $this->setIdUsuario(0);
        $this->setObs("");
        $this->setIdNotf(0);
        $this->setStatus(0);
        $this->setIdItemNotf(0);
    }

    function __destruct() 
    {
        
    }

    function getIdUsuario() 
    {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) 
    {
        $this->idUsuario = $idUsuario;
    }

    function getIdUsuNotf() 
    {
        return $this->idUsuNotf;
    }

    function setIdUsuNotf($idUsuNotf) 
    {
        $this->idUsuNotf = $idUsuNotf;
    }
    
     function getObs() 
    {
        return $this->obs;
    }

    function setObs($obs) 
    {
        $this->obs = $obs;
    }
    
    function getIdNotf() 
    {
        return $this->idNotf;
    }

    function setIdNotf($idNotf) 
    {
        $this->idNotf = $idNotf;
    }
    
    function getStatus() 
    {
        return $this->status;
    }

    function setStatus($status) 
    {
        $this->status = $status;
    }
    
     function getIdItemNotf() 
    {
        return $this->idItemNotf;
    }

    function setIdItemNotf($idItemNotf) 
    {
        $this->idItemNotf = $idItemNotf;
    }
}

?>
