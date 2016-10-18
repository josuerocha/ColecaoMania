<?php

require_once 'ParticipaEvento.php';
require_once 'ACrudDAO.php';

class ParticipaEventoDAO extends ACrudDAO 
{

    function salvar($participaEvento) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($participaEvento->getIdUsuario() != 0) 
                {
                $query = "insert into tbparticipaevento (idUsuario, idEvento) values ('{$participaEvento->getIdUsuario()}','{$participaEvento->getIdEvento()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $participaEvento->setIdUsuario($codigo);
            } 
            /*else 
            {
                $query = "update tbparticipaevento`` set nome = '{$UsuarioSeguido->getNome()}'}, descricao = '{$UsuarioSeguido->getDescricao()}'}, quantidade = '{$UsuarioSeguido->getQuantidade()}'}, imagem = '{$UsuarioSeguido->getImagem()}'}, nroSerie = '{$UsuarioSeguido->getNroSerie()}'}, interesse = '{$UsuarioSeguido->getInteresse()}'}";
                $this->conexao->query($query);
            }*/
            $this->desconectar();
        } 
        catch (Exception $ex) 
        {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function excluir($participaEvento) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbparticipaevento where idEvento = {$participaEvento->getIdEvento()} and idUsuario = {$participaEvento->getIdUsuario()}";
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
        $participacoes = array();
        try {
            $this->conectar();
            $query = "select * from tbparticipaevento";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $participaEvento = new ParticipaEvento();
                $participaEvento->setIdUsuario($registro['idUsuario']);
                $participaEvento->setIdEvento($registro['idEvento']);
                array_push($participacoes , $participaEvento);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $participacoes ;
    }

    function buscarPorId($participa) 
    {
        $participaEvento = new ParticipaEvento();
        try 
        {
            $this->conectar();
            $query = "select * from tbparticipaevento where idUsuario = {$participa->getIdUsuario()} and idEvento = {$participa->getIdEvento()}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $participaEvento->setIdUsuario($registro['idUsuario']);
            $participaEvento->setIdEvento($registro['idEvento']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $participaEvento;
    }

    function verifPresenca($participaEvento) 
    {
        try {
            $this->conectar();
            $query = "select * from tbparticipaevento where idUsuario = '{$participaEvento->getIdUsuario()}' and idEvento = '{$participaEvento->getIdEvento()}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
           
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }
}

?> 