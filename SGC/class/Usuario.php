<?php

class Usuario 
{

    public $idUsuario;
    public $nome;
    public $senha;
    public $email;
    public $imagem;
    public $telefone;
    public $dataNasc;
    public $tipo;
    public $numero;
    public $complemento;
    public $cep;
    public $cidade;
    public $bairro;
    public $rua;
    public $idIdioma;
    public $estado;
    public $idPais;
    public $status;

    function __construct() 
    {
        $this->setStatus(0);
        $this->setIdUsuario(0);
        $this->setNome("");
        $this->setSenha("");
        $this->setEmail("");
        $this->setImagem("");
        $this->setDataNasc("");
        $this->setTipo(0);
        $this->setTelefone("");
        $this->setNumero("");
        $this->setComplemento("");
        $this->setCEP("");
        $this->setCidade("");
        $this->setBairro("");
        $this->setRua("");
        $this->setIdIdioma(0);
        $this->setEstado("");
        $this->setIdPais(0);
    }

    function __destruct() 
    {
        
    }

    function __toString() 
    {
        return $this->getNome();
    }
    
    function getStatus() 
    {
        return $this->status;
    }

    function setStatus($status) 
    {
        $this->status = $status;
    }
    
    function getIdUsuario() 
    {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) 
    {
        $this->idUsuario = $idUsuario;
    }

    function getNome() 
    {
        return $this->nome;
    }

    function setNome($nome) 
    {
        $this->nome = $nome;
    }

    function getSenha() 
    {
        return $this->senha;
    }

    function setSenha($senha) 
    {
        $this->senha = $senha;
    }

    function getEmail() 
    {
        return $this->email;
    }

    function setEmail($email) 
    {
        $this->email = $email;
    }

    function getImagem() 
    {
        return $this->imagem;
    }

    function setImagem($imagem) 
    {
        $this->imagem = $imagem;
    }

    function getDataNasc() 
    {
        return $this->dataNasc;
    }

    function setDataNasc($dataNasc) 
    {
        $this->dataNasc = $dataNasc;
    }

    function getTipo() 
    {
        return $this->perfil;
    }

    function setTipo($perfil) 
    {
        $this->perfil = $perfil;
    }
    
    function getTelefone() 
    {
        return $this->telefone;
    }

    function setTelefone($telefone) 
    {
        $this->telefone = $telefone;
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
    
    function getIdIdioma() 
    {
        return $this->idIdioma;
    }

    function setIdIdioma($idIdioma) 
    {
        $this->idIdioma = $idIdioma;
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
}
?>
