<?php

require_once 'Notificacao.php';
require_once 'ACrudDAO.php';

class NotificacaoDAO extends ACrudDAO 
{

    function salvar($notificacao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($notificacao->getIdNotf() == 0) 
                {
                $notificacao->setStatus(1);
                $query = "insert into tbnotificacoes (idNotf, idUsuario, idUsuNotf, idItemNotf, status, obs ) values ('{$notificacao->getIdNotf()}','{$notificacao->getIdUsuario()}','{$notificacao->getIdUsuNotf()}','{$notificacao->getIdItemNotf()}','{$notificacao->getStatus()}','{$notificacao->getObs()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $notificacao->setIdNotf($codigo);
               
            } 
            else 
            {
                $query = "update tbnotificacoes set status = 0 where idNotf = {$notificacao->getIdNotf()}";
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

    function excluir($notificacao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbnotificacoes where idNotf = {$notificacao->getIdNotf()}";
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

    function listar() //lista quem eu sigo
    {
        $notificacoes = array();
        try {
            $this->conectar();
            $query = "select * from tbnotificacoes where idUsuNotf = {$_SESSION["codigo"]} and status=1 limit 4";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $notificacao = new Notificacao();
                $notificacao->setIdUsuario($registro['idUsuario']);
                $notificacao->setIdUsuNotf($registro['idUsuNotf']);
                $notificacao->setObs($registro['obs']);
                $notificacao->setIdNotf($registro['idNotf']);
                $notificacao->setStatus($registro['status']);
                array_push($notificacoes, $notificacao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $notificacoes;
    }

    function buscarPorId($cod) 
    {
        $notificacao = new Notificacao();
        try 
        {
            $this->conectar();
            $query = "select * from tbnotificacoes where idNotf = {$cod}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $notificacao->setIdUsuario($registro['idUsuario']);
            $notificacao->setIdUsuNotf($registro['idUsuNotf']);
            $notificacao->setObs($registro['obs']);
            $notificacao->setIdNotf($registro['idNotf']);
            $notificacao->setStatus($registro['status']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $notificacao;
    }
    
 function notfCount() {
        try {
            $this->conectar();
            $query = "select * from tbnotificacoes where idUsuNotf = {$_SESSION["codigo"]} and status=1";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $quantidade;
 }
 
 function listarTodas() //lista quem eu sigo
    {
        $notificacoes = array();
        try {
            $this->conectar();
            $query = "select * from tbnotificacoes where idUsuNotf = {$_SESSION["codigo"]}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $notificacao = new Notificacao();
                $notificacao->setIdUsuario($registro['idUsuario']);
                $notificacao->setIdUsuNotf($registro['idUsuNotf']);
                $notificacao->setObs($registro['obs']);
                $notificacao->setIdNotf($registro['idNotf']);
                $notificacao->setStatus($registro['status']);
                array_push($notificacoes, $notificacao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $notificacoes;
    }
}

?> 