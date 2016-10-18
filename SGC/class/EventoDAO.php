<?php

require_once 'Evento.php';
require_once 'ACrudDAO.php';

class EventoDAO extends ACrudDAO 
{

    function salvar($evento) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($evento->getIdEvento() == 0) 
                {
                $query = "insert into tbevento (idEvento, idUsuCriador, nome, data, hora, numero, complemento, cep, cidade, bairro, rua,estado,idPais,nroParticipantes) values ('{$evento->getIdEvento()}', '{$evento->getIdUsuCriador()}','{$evento->getNome()}','{$evento->getData()}','{$evento->getHora()}','{$evento->getNumero()}','{$evento->getComplemento()}','{$evento->getCEP()}','{$evento->getCidade()}','{$evento->getBairro()}','{$evento->getRua()}','{$evento->getEstado()}','{$evento->getIdPais()}','{$evento->getNroParticipantes()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $evento->setIdEvento($codigo);       
            } 
            else 
            {
                $query = "update tbevento set nome = '{$evento->getNome()}', data = '{$evento->getData()}', hora = '{$evento->getHora()}', numero = '{$evento->getNumero()}', complemento = '{$evento->getComplemento()}', cep = '{$evento->getCEP()}', cidade = '{$evento->getCidade()}', bairro = '{$evento->getBairro()}', rua = '{$evento->getRua()}', estado = '{$evento->getEstado()}', idPais = '{$evento->getIdPais()}',nroParticipantes = '{$evento->getNroParticipantes()}' where idEvento= {$evento->getIdEvento()}";
                $this->conexao->query($query);
            }
            $this->desconectar();
        } 
        catch (Exception $ex) 
        {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function excluir($evento) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbevento where idEvento = {$evento->getIdEvento()}";
            $this->conexao->query($query);
            $this->desconectar();
        } 
        catch (Exception $ex) 
        {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function listar() 
    {
        $eventos = array();
        try {
            $this->conectar();
            $query = "select * from tbevento order by data desc,hora asc limit 20";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $evento = new Evento();
                $evento->setIdEvento($registro['idEvento']);
                $evento->setIdUsuCriador($registro['idUsuCriador']);
                $evento->setNome($registro['nome']);
                $evento->setData($registro['data']);
                $evento->setHora($registro['hora']);
                $evento->setNumero($registro['numero']);
                $evento->setComplemento($registro['complemento']);
                $evento->setCEP($registro['cep']);
                $evento->setCidade($registro['cidade']);
                $evento->setBairro($registro['bairro']);
                $evento->setRua($registro['rua']);
                $evento->setEstado($registro['estado']);
                $evento->setIdPais($registro['idPais']);
                $evento->setNroParticipantes($registro['nroParticipantes']);
                array_push($eventos, $evento);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $eventos;
    }

    function buscarPorId($codigo) 
    {
        $evento = new Evento();
        try 
        {
            $this->conectar();
            $query = "select * from tbevento where idEvento = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $evento->setIdEvento($registro['idEvento']);
            $evento->setIdUsuCriador($registro['idUsuCriador']);
            $evento->setNome($registro['nome']);
            $evento->setData($registro['data']);
            $evento->setHora($registro['hora']);
            $evento->setNumero($registro['numero']);
            $evento->setComplemento($registro['complemento']);
            $evento->setCEP($registro['cep']);
            $evento->setCidade($registro['cidade']);
            $evento->setBairro($registro['bairro']);
            $evento->setRua($registro['rua']);
            $evento->setEstado($registro['estado']);
            $evento->setIdPais($registro['idPais']);
            $evento->setNroParticipantes($registro['nroParticipantes']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $evento;
    }
    
    function listarEventosUsu($cod) 
    {
        $eventos = array();
        try {
            $this->conectar();
            $query = "select * from tbevento where idUsuCriador={$cod}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $evento = new Evento();
                $evento->setIdEvento($registro['idEvento']);
                $evento->setIdUsuCriador($registro['idUsuCriador']);
                $evento->setNome($registro['nome']);
                $evento->setData($registro['data']);
                $evento->setHora($registro['hora']);
                $evento->setNumero($registro['numero']);
                $evento->setComplemento($registro['complemento']);
                $evento->setCEP($registro['cep']);
                $evento->setCidade($registro['cidade']);
                $evento->setBairro($registro['bairro']);
                $evento->setRua($registro['rua']);
                $evento->setEstado($registro['estado']);
                $evento->setIdPais($registro['idPais']);
                $evento->setNroParticipantes($registro['nroParticipantes']);
                array_push($eventos, $evento);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $eventos;
    }
    
     function listarEventosUsuPart() 
    {
        $eventos = array();
        try {
            $this->conectar();
            $query = "select * from tbevento where idEvento in (select idEvento from tbparticipaevento where idUsuario={$_SESSION["codigo"]})";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $evento = new Evento();
                $evento->setIdEvento($registro['idEvento']);
                $evento->setIdUsuCriador($registro['idUsuCriador']);
                $evento->setNome($registro['nome']);
                $evento->setData($registro['data']);
                $evento->setHora($registro['hora']);
                $evento->setNumero($registro['numero']);
                $evento->setComplemento($registro['complemento']);
                $evento->setCEP($registro['cep']);
                $evento->setCidade($registro['cidade']);
                $evento->setBairro($registro['bairro']);
                $evento->setRua($registro['rua']);
                $evento->setEstado($registro['estado']);
                $evento->setIdPais($registro['idPais']);
                $evento->setNroParticipantes($registro['nroParticipantes']);
                array_push($eventos, $evento);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $eventos;
    }
}

?> 