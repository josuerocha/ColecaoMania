<?php

require_once 'UsuarioSeguido.php';
require_once 'ACrudDAO.php';

class UsuarioSeguidoDAO extends ACrudDAO 
{

    function salvar($usuarioSeguido) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($usuarioSeguido->getIdUsuSeguido() != 0) 
                {
                $query = "insert into tbusuarioseguido (idUsuario, idUsuSeguido) values ('{$usuarioSeguido->getIdUsuario()}','{$usuarioSeguido->getIdUsuSeguido()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $usuarioSeguido->setIdUsuSeguido($codigo);
                
            } 
            /*else 
            {
                $query = "update tbusuarioseguido set nome = '{$UsuarioSeguido->getNome()}'}, descricao = '{$UsuarioSeguido->getDescricao()}'}, quantidade = '{$UsuarioSeguido->getQuantidade()}'}, imagem = '{$UsuarioSeguido->getImagem()}'}, nroSerie = '{$UsuarioSeguido->getNroSerie()}'}, interesse = '{$UsuarioSeguido->getInteresse()}'}";
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

    function excluir($UsuarioSeguido) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbusuarioseguido where idUsuSeguido = {$UsuarioSeguido->getIdUsuSeguido()} and idUsuario = {$UsuarioSeguido->getIdUsuario()}";
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
        $usuariosseguidos = array();
        try {
            $this->conectar();
            $query = "select * from tbusuarioseguido where idUsuario = {$_SESSION["codigo"]}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $UsuarioSeguido = new UsuarioSeguido();
                $UsuarioSeguido->setIdUsuario($registro['idUsuario']);
                $UsuarioSeguido->setIdUsuSeguido($registro['idUsuSeguido']);
                array_push($usuariosseguidos, $UsuarioSeguido);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuariosseguidos;
    }

    function buscarPorId($usuSeguido) 
    {
        $UsuarioSeguido = new UsuarioSeguido();
        try 
        {
            $this->conectar();
            $query = "select * from tbusuarioseguido where idUsuSeguido = {$suSeguido->getIdUsuSeguido()} and idUsuario = {$usuSeguido->getIdUsuario()}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $UsuarioSeguido->setIdUsuario($registro['idUsuario']);
            $UsuarioSeguido->setIdUsuSeguido($registro['idUsuSeguido']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $UsuarioSeguido;
    }
    
     function listarQuemMeSegue() 
    {
        $usuariosseguidos = array();
        try {
            $this->conectar();
            $query = "select * from tbusuarioseguido where idUsuSeguido = {$_SESSION["codigo"]}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $UsuarioSeguido = new UsuarioSeguido();
                $UsuarioSeguido->setIdUsuario($registro['idUsuario']);
                $UsuarioSeguido->setIdUsuSeguido($registro['idUsuSeguido']);
                array_push($usuariosseguidos, $UsuarioSeguido);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuariosseguidos;
    }
    
     function verificaSeguidor($idSeg) {
        try {
            $this->conectar();
            $query = "select * from tbusuarioseguido where idUsuario = '{$_SESSION["codigo"]}' and idUsuSeguido = '{$idSeg}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }
    
    function countSeguidor() {
        try {
            $this->conectar();
            $query = "select * from tbusuarioseguido where idUsuario = '{$_SESSION["codigo"]}'";
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