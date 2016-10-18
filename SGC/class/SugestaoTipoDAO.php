<?php

require_once 'SugestaoTipo.php';
require_once 'ACrudDAO.php';

class SugestaoTipoDAO extends ACrudDAO 
{

    function salvar($sugestaoTipo) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($sugestaoTipo->getIdSugestaoTipo() == 0) 
                {
                $query = "insert into tbsugestaotipo (idSugestaoTipo, idUsuario, nome) values ('{$sugestaoTipo->getIdSugestaoTipo()}','{$sugestaoTipo->getIdUsuSg()}','{$sugestaoTipo->getNome()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $sugestaoTipo->setIdSugestaoTipo($codigo);
            } 
            /*else 
            {
                $query = "update tbsugestaoTipo set nome = '{$SugestaoTipo->getNome()}'}, descricao = '{$SugestaoTipo->getDescricao()}'}, quantidade = '{$SugestaoTipo->getQuantidade()}'}, imagem = '{$SugestaoTipo->getImagem()}'}, nroSerie = '{$SugestaoTipo->getNroSerie()}'}, interesse = '{$SugestaoTipo->getInteresse()}'}";
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

    function excluir($SugestaoTipo) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbsugestaotipo where idSugestaoTipo = {$SugestaoTipo->getIdSugestaoTipo()}";
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
        $sugestoesTipo = array();
        try {
            $this->conectar();
            $query = "select * from tbsugestaotipo limit 20";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $sugestaoTipo = new SugestaoTipo();
                $sugestaoTipo->setIdSugestaoTipo($registro['idSugestaoTipo']);
                $sugestaoTipo->setIdUsuSg($registro['idUsuario']);
                $sugestaoTipo->setNome($registro['nome']);
                array_push($sugestoesTipo, $sugestaoTipo);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $sugestoesTipo;
    }

    function buscarPorId($codigo) 
    {
        $sugestaoTipo = new SugestaoTipo();
        try 
        {
            $this->conectar();
            $query = "select * from tbsugestaotipo where idSugestaoTipo = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $sugestaoTipo->setIdSugestaoTipo($registro['idSugestaoTipo']);
            $sugestaoTipo->setIdUsuSg($registro['idUsuario']);
            $sugestaoTipo->setNome($registro['nome']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $sugestaoTipo;
    }

}

?> 