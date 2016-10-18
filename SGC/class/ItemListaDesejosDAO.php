<?php

require_once 'ItemListaDesejos.php';
require_once 'ACrudDAO.php';

class ItemListaDesejosDAO extends ACrudDAO 
{

    function salvar($itemListaDesejos) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($itemListaDesejos->getIdListaDesejos() != 0) 
                {
                $query = "insert into tbitemlistadesejos (idItemColecao, idListaDesejos) values ('{$itemListaDesejos->getIdItemColecao()}','{$itemListaDesejos->getIdListaDesejos()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $itemListaDesejos->setIdListaDesejos($codigo);
            } 
            /*else 
            {
                $query = "update tbitemlistadesejos set nome = '{$itemListaDesejos->getNome()}'}, descricao = '{$itemListaDesejos->getDescricao()}'}, quantidade = '{$itemListaDesejos->getQuantidade()}'}, imagem = '{$itemListaDesejos->getImagem()}'}, nroSerie = '{$itemListaDesejos->getNroSerie()}'}, interesse = '{$itemListaDesejos->getInteresse()}'}";
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

    function excluir($itemListaDesejos) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbitemlistadesejos where idItemColecao = {$itemListaDesejos->getIdItemColecao()} and idListaDesejos = {$itemListaDesejos->getIdListaDesejos()}";
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
        $itensListaDesejos = array();
        try {
            $this->conectar();
            $query = "select * from tbitemlistadesejos";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemListaDesejos = new ItemListaDesejos();
                $itemListaDesejos->setIdItemColecao($registro['idItemColecao']);
                $itemListaDesejos->setIdListaDesejos($registro['idListaDesejos']);
                array_push($itensListaDesejos, $itemListaDesejos);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensListaDesejos;
    }

    function buscarPorId($codigo) 
    {
        $itemListaDesejos = new ItemListaDesejos();
        try 
        {
            $this->conectar();
            $query = "select * from tbitemlistadesejos where idListaDesejos = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $itemListaDesejos->setIdItemColecao($registro['idItemColecao']);
            $itemListaDesejos->setIdListaDesejos($registro['idListaDesejos']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $itemListaDesejos;
    }

     function listarItensLista($idLista) 
    {
        $itensListaDesejos = array();
        try {
            $this->conectar();
            $query = "select * from tbitemlistadesejos where idListaDesejos = {$idLista}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemListaDesejos = new ItemListaDesejos();
                $itemListaDesejos->setIdItemColecao($registro['idItemColecao']);
                $itemListaDesejos->setIdListaDesejos($registro['idListaDesejos']);
                array_push($itensListaDesejos, $itemListaDesejos);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensListaDesejos;
    }
    
     function verificaItem($idItem, $idLista) {
        try {
            $this->conectar();
            $query = "select * from tbitemlistadesejos where idListaDesejos = '{$idLista}' and idItemColecao = '{$idItem}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }
    
    function listarItensNome($idLista,$nome) 
    {
        $itensListaDesejos = array();
        try {
            $this->conectar();
            $query = "SELECT L.idItemColecao,idListaDesejos FROM (tbitemlistadesejos as L) "
                    . "INNER JOIN (tbitemcolecao as C) on L.idItemColecao = C.idItemColecao "
                    . "WHERE idListaDesejos={$idLista} and nome like '%{$nome}%'";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemListaDesejos = new ItemListaDesejos();
                $itemListaDesejos->setIdItemColecao($registro['idItemColecao']);
                $itemListaDesejos->setIdListaDesejos($registro['idListaDesejos']);
                array_push($itensListaDesejos, $itemListaDesejos);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensListaDesejos;
    }
}

?> 