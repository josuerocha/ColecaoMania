<?php

require_once 'UsuarioBloqueado.php';
require_once 'ACrudDAO.php';

class UsuarioBloqueadoDAO extends ACrudDAO 
{

    function salvar($usuarioBloqueado) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($usuarioBloqueado->getIdUsuBloqueado() != 0) 
                {
                $query = "insert into tbusuariobloqueado (idUsuario, idUsuBloqueado) values ('{$usuarioBloqueado->getIdUsuario()}','{$usuarioBloqueado->getIdUsuBloqueado()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $usuarioBloqueado->setIdUsuBloqueado($codigo);
            } 
            /*else 
            {
                $query = "update tbusuariobloqueado set nome = '{$UsuarioBloqueado->getNome()}'}, descricao = '{$UsuarioBloqueado->getDescricao()}'}, quantidade = '{$UsuarioBloqueado->getQuantidade()}'}, imagem = '{$UsuarioBloqueado->getImagem()}'}, nroSerie = '{$UsuarioBloqueado->getNroSerie()}'}, interesse = '{$UsuarioBloqueado->getInteresse()}'}";
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

    function excluir($UsuarioBloqueado) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbusuariobloqueado where idUsuBloqueado = {$UsuarioBloqueado->getIdUsuBloqueado()} and idUsuario = {$UsuarioBloqueado->getIdUsuario()}";
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
        $usuariosBloqueados = array();
        try {
            $this->conectar();
            $query = "select * from tbusuariobloqueado";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $UsuarioBloqueado = new UsuarioBloqueado();
                $UsuarioBloqueado->setIdUsuario($registro['idUsuario']);
                $UsuarioBloqueado->setIdUsuBloqueado($registro['idUsuBloqueado']);
                array_push($usuariosBloqueados, $UsuarioBloqueado);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuariosBloqueados;
    }

    function buscarPorId($idUsuBloq) 
    {
        $UsuarioBloqueado = new UsuarioBloqueado();
        try 
        {
            $this->conectar();
            $query = "select * from tbusuariobloqueado where idUsuBloqueado = {$idUsuBloq} and idUsuario = {$_SESSION["codigo"]}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $UsuarioBloqueado->setIdUsuario($registro['idUsuario']);
            $UsuarioBloqueado->setIdUsuBloqueado($registro['idUsuBloqueado']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $UsuarioBloqueado;
    }

     function verifBloqueio($idUsu) {
          $quantidade=0;
        try {
            $this->conectar();
            $query = "select * from tbusuariobloqueado where idUsuBloqueado = {$_SESSION["codigo"]} and idUsuario = {$idUsu}";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }
    
    function verifSeuBloqueio($idUsu) {
          $quantidade=0;
        try {
            $this->conectar();
            $query = "select * from tbusuariobloqueado where idUsuBloqueado = {$idUsu} and idUsuario = {$_SESSION["codigo"]}";
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