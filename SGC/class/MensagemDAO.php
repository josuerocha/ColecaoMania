<?php

require_once 'Mensagem.php';
require_once 'ACrudDAO.php';

class MensagemDAO extends ACrudDAO {

    function salvar($mensagem) {
        $situacao = TRUE;
        try {
            $this->conectar();
            if ($mensagem->getIdMensagem() == 0) {
                $mensagem->setStatus(1);
                $query = "insert into tbmensagem (idMensagem, idUsuEnvia, idUsuRecebe, texto, hora, data,status) values ('{$mensagem->getIdMensagem()}','{$mensagem->getIdUsuEnvia()}','{$mensagem->getIdUsuRecebe()}','{$mensagem->getTexto()}','{$mensagem->getHora()}','{$mensagem->getData()}','{$mensagem->getStatus()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $mensagem->setIdMensagem($codigo);
            } else {
                $query = "update tbmensagem set status = 0 where idUsuEnvia = {$mensagem->getIdUsuEnvia()}";
                $this->conexao->query($query);
            }
            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function excluir($Mensagem) {
        $situacao = TRUE;
        try {
            $this->conectar();
            $query = "delete from tbmensagem where idMensagem = {$Mensagem->getIdMensagem()}";
            $this->conexao->query($query);
            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function listar() {
        $mensagens = array();
        try {
            $this->conectar();
            $query = "select * from tbmensagem where idUsuario={$_SESSION["codigo"]}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $mensagem = new Mensagem();
                $mensagem->setIdMensagem($registro['idMensagem']);
                $mensagem->setIdUsuEnvia($registro['idUsuEnvia']);
                $mensagem->setIdUsuRecebe($registro['idUsuRecebe']);
                $mensagem->setTexto($registro['texto']);
                $mensagem->setHora($registro['hora']);
                $mensagem->setData($registro['data']);
                $mensagem->setStatus($registro['status']);
                array_push($mensagens, $mensagem);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $mensagens;
    }

    function buscarPorId($codigo) {
        $mensagem = new Mensagem();
        try {
            $this->conectar();
            $query = "select * from tbmensagem where idMensagem = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $mensagem->setIdMensagem($registro['idMensagem']);
            $mensagem->setIdUsuEnvia($registro['idUsuEnvia']);
            $mensagem->setIdUsuRecebe($registro['idUsuRecebe']);
            $mensagem->setTexto($registro['texto']);
            $mensagem->setHora($registro['hora']);
            $mensagem->setData($registro['data']);
            $mensagem->setStatus($registro['status']);
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $mensagem;
    }

    function listarConversa($idUsu) {
        $mensagens = array();
        try {
            $this->conectar();
            $query = "select * from tbmensagem where (idUsuRecebe={$idUsu} or idUsuRecebe={$_SESSION["codigo"]}) and (idUsuEnvia={$_SESSION["codigo"]} or idUsuEnvia={$idUsu}) order by idMensagem desc limit 10";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $mensagem = new Mensagem();
                $mensagem->setIdMensagem($registro['idMensagem']);
                $mensagem->setIdUsuEnvia($registro['idUsuEnvia']);
                $mensagem->setIdUsuRecebe($registro['idUsuRecebe']);
                $mensagem->setTexto($registro['texto']);
                $mensagem->setHora($registro['hora']);
                $mensagem->setData($registro['data']);
                $mensagem->setStatus($registro['status']);
                array_push($mensagens, $mensagem);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $mensagens;
    }

    function listarConversaAntiga($idUsu) {
        $mensagens = array();
        try {
            $this->conectar();
            $query = "select * from tbmensagem where idUsuRecebe like {$idUsu} or {$_SESSION["codigo"]} and idUsuEnvia like {$_SESSION["codigo"]} or {$idUsu}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $mensagem = new Mensagem();
                $mensagem->setIdMensagem($registro['idMensagem']);
                $mensagem->setIdUsuEnvia($registro['idUsuEnvia']);
                $mensagem->setIdUsuRecebe($registro['idUsuRecebe']);
                $mensagem->setTexto($registro['texto']);
                $mensagem->setHora($registro['hora']);
                $mensagem->setData($registro['data']);
                $mensagem->setStatus($registro['status']);
                array_push($mensagens, $mensagem);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $mensagens;
    }

    function buscarUltimas() {
        $mensagens = array();
        try {
            $this->conectar();

            $queryID = "select idUsuEnvia from tbmensagem where idUsuRecebe={$_SESSION["codigo"]} GROUP by idUsuEnvia ORDER by data, hora";
            $resultadoID = $this->conexao->query($queryID);
            while ($registro1 = mysqli_fetch_assoc($resultadoID)) {
                $idUsuEnvia = $registro1['idUsuEnvia'];
                //echo $idUsuEnvia . "<br>";
                $query = "select * from tbmensagem where idUsuRecebe={$_SESSION["codigo"]} and idUsuEnvia={$idUsuEnvia} ORDER by idMensagem desc LIMIT 1";
                //echo $query;
                $resultado = $this->conexao->query($query);
                //$this->desconectar();
                //while ($registro = mysqli_fetch_assoc($resultado)) {
                $registro = mysqli_fetch_assoc($resultado);
                $mensagem = new Mensagem();
                $mensagem->setIdMensagem($registro['idMensagem']);
                $mensagem->setIdUsuEnvia($registro['idUsuEnvia']);
                $mensagem->setIdUsuRecebe($registro['idUsuRecebe']);
                $mensagem->setTexto($registro['texto']);
                $mensagem->setHora($registro['hora']);
                $mensagem->setData($registro['data']);
                $mensagem->setStatus($registro['status']);
                array_push($mensagens, $mensagem);
                //}
                $resultado->close();
            }
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $mensagens;
    }

    function msgCount() {
        try {
            $this->conectar();
            $query = "select * from tbmensagem where idUsuRecebe = {$_SESSION["codigo"]} and status=1";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $quantidade;
    }

}

?> 