<?php

require_once 'ListaDesejos.php';
require_once 'ACrudDAO.php';

class ListaDesejosDAO extends ACrudDAO 
{

    function salvar($listaDesejos) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($listaDesejos->getIdListaDesejos() == 0) 
                {
                $query = "insert into tblistadesejos (idUsuDono, idListaDesejos) values ('{$listaDesejos->getIdUsuDono()}','{$listaDesejos->getIdListaDesejos()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $listaDesejos->setIdListaDesejos($codigo);
               // echo $query;
            } 
            /*else 
            {
                $query = "update tblistadesejos set nome = '{$ListaDesejos->getNome()}'}, descricao = '{$ListaDesejos->getDescricao()}'}, quantidade = '{$ListaDesejos->getQuantidade()}'}, imagem = '{$ListaDesejos->getImagem()}'}, nroSerie = '{$ListaDesejos->getNroSerie()}'}, interesse = '{$ListaDesejos->getInteresse()}'}";
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

    function excluir($ListaDesejos) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tblistadesejos where idListaDesejos = {$ListaDesejos->getIdListaDesejos()}";
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
        $listasDesejo = array();
        try {
            $this->conectar();
            $query = "select * from tblistadesejos";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $ListaDesejos = new ListaDesejos();
                $ListaDesejos->setIdUsuDono($registro['idUsuDono']);
                $ListaDesejos->setIdListaDesejos($registro['idListaDesejos']);
                array_push($listasDesejo, $ListaDesejos);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $listasDesejo;
    }

    function buscarPorId($codigo) 
    {
        $ListaDesejos = new ListaDesejos();
        try 
        {
            $this->conectar();
            $query = "select * from tblistadesejos where idUsuDono = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $ListaDesejos->setIdUsuDono($registro['idUsuDono']);
            $ListaDesejos->setIdListaDesejos($registro['idListaDesejos']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $ListaDesejos;
    }

}

?> 