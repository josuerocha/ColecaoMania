<?php

require_once 'Colecao.php';
require_once 'ACrudDAO.php';

class ColecaoDAO extends ACrudDAO 
{

    function salvar($colecao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($colecao->getIdColecao() == 0) 
            {
                $colecao->setStatus(1);
                $query = "insert into tbcolecao (idColecao, idTipoColecao, nome, descricao,idUsuDono,status) values ('{$colecao->getIdColecao()}', '{$colecao->getIdTipoColecao()}','{$colecao->getNome()}','{$colecao->getDescricao()}','{$colecao->getIdUsuDono()}','{$colecao->getStatus()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $colecao->setIdColecao($codigo);
            } else 
            {
                $query = "update tbcolecao set nome = '{$colecao->getNome()}', descricao= '{$colecao->getDescricao()}' where idColecao = {$colecao->getIdColecao()}";
                $this->conexao->query($query);
            }
            $this->desconectar();
        } catch (Exception $ex) 
        {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function excluir($colecao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbcolecao where idColecao = {$colecao->getIdColecao()}";
            $this->conexao->query($query);
            $this->desconectar();
        } catch (Exception $ex) 
        {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function listar() 
    {
        $colecoes = array();
        try 
        {
            $this->conectar();
            $query = "select * from tbcolecao where status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $colecao = new Colecao();
                $colecao->setIdColecao($registro['idColecao']);
                $colecao->setIdTipoColecao($registro['idTipoColecao']);
                $colecao->setNome($registro['nome']);
                $colecao->setDescricao($registro['descricao']);
                $colecao->setIdUsuDono($registro['idUsuDono']);
                $colecao->setStatus($registro['status']);
                array_push($colecoes, $colecao);
            }
            $resultado->close();
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $colecoes;
    }

    function buscarPorId($codigo) 
    {
        $colecao = new Colecao();
        try 
        {
            $this->conectar();
            $query = "select * from tbcolecao where idColecao = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $colecao->setIdColecao($registro['idColecao']);
            $colecao->setIdTipoColecao($registro['idTipoColecao']);
            $colecao->setNome($registro['nome']);
            $colecao->setDescricao($registro['descricao']);
            $colecao->setIdUsuDono($registro['idUsuDono']);
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $colecao;
    }
    
    function mudaStatus($colecao, $status) {
        $situacao = TRUE;
        try {
            $this->conectar();

            $query = "update tbcolecao set status = '{$status}' where idColecao = '{$colecao}'";
            $this->conexao->query($query);

            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }
    
 function verificaDependencia($colecao) {
     //$quantidade = 0;
        try {
            $this->conectar();
            $query = "select * from (tbitemcolecao as I) inner join (tbcolecao as C) on I.idColecao=C.idColecao where C.idColecao={$colecao} and C.status=0 and I.status=0";
            //echo $query;
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            //echo $quantidade;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $quantidade;
    }
    
       function listarColUsu($cod) 
    {
        $colecoes = array();
        try 
        {
            $this->conectar();
            $query = "select * from tbcolecao where idUsuDono={$cod} and status=1";
            
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $colecao = new Colecao();
                $colecao->setIdColecao($registro['idColecao']);
                $colecao->setIdTipoColecao($registro['idTipoColecao']);
                $colecao->setNome($registro['nome']);
                $colecao->setDescricao($registro['descricao']);
                $colecao->setIdUsuDono($registro['idUsuDono']);
                $colecao->setStatus($registro['status']);
                array_push($colecoes, $colecao);
            }
            $resultado->close();
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $colecoes;
    }
    
    function pesqColUsu($cod,$nome) 
    {
        $colecoes = array();
        try 
        {
            $this->conectar();
            $query = "select * from tbcolecao where idUsuDono={$cod} and nome like  '%{$nome}%' and status=1";
            
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $colecao = new Colecao();
                $colecao->setIdColecao($registro['idColecao']);
                $colecao->setIdTipoColecao($registro['idTipoColecao']);
                $colecao->setNome($registro['nome']);
                $colecao->setDescricao($registro['descricao']);
                $colecao->setIdUsuDono($registro['idUsuDono']);
                array_push($colecoes, $colecao);
            }
            $resultado->close();
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $colecoes;
    }
}

?> 