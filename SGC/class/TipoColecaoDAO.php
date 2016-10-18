<?php

require_once 'TipoColecao.php';
require_once 'ACrudDAO.php';

class TipoColecaoDAO extends ACrudDAO 
{

    function salvar($tipoColecao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($tipoColecao->getIdTipoColecao() == 0) 
                {
                $query = "insert into tbtipocolecao (idTipoColecao, nome) values ('{$tipoColecao->getIdTipoColecao()}','{$tipoColecao->getNome()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $tipoColecao->setIdTipoColecao($codigo);
                
            } 
            else 
            {
                $query = "update tbtipocolecao set nome = '{$tipoColecao->getNome()}' where idTipoColecao = {$tipoColecao->getIdTipoColecao()}";
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

    function excluir($TipoColecao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbtipocolecao where idTipoColecao = {$TipoColecao->getIdTipoColecao()}";
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
        $tiposColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbtipocolecao order by nome limit 20";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $tipoColecao = new TipoColecao();
                $tipoColecao->setIdTipoColecao($registro['idTipoColecao']);
                $tipoColecao->setNome($registro['nome']);
                array_push($tiposColecao, $tipoColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $tiposColecao;
    }

    function buscarPorId($codigo) 
    {
        $tipoColecao = new TipoColecao();
        try 
        {
            $this->conectar();
            $query = "select * from tbtipocolecao where idTipoColecao = {$codigo}";
            
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $tipoColecao->setIdTipoColecao($registro['idTipoColecao']);
            $tipoColecao->setNome($registro['nome']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $tipoColecao;
    }
    
    function validaNome($nome) {
        try {
            $this->conectar();
            $query = "select * from tbtipocolecao where nome = '{$nome}'";
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