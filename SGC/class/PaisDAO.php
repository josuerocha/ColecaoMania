<?php

require_once 'Pais.php';
require_once 'ACrudDAO.php';

class PaisDAO extends ACrudDAO 
{

    function salvar($pais) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($pais->getIdPais() == 0) 
            {
                $query = "insert into tbpais (idPais,nome) values ('{$pais->getIdPais()}', '{$pais->getNome()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $pais->setIdPais($codigo);
            } else 
            {
                $query = "update tbpais set nome = '{$pais->getNome()}' where idPais={$pais->getIdPais()}";
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

    function excluir($pais) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbpais where idPais = {$pais->getIdPais()}";
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
        $paises = array();
        try 
        {
            $this->conectar();
            $query = "select * from tbpais limit 20";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $pais = new Pais();
                $pais->setIdPais($registro['idPais']);
                $pais->setNome($registro['nome']);
                array_push($paises, $pais);
            }
            $resultado->close();
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $paises;
    }

    function buscarPorId($codigo) 
    {
        $pais = new Pais();
        try 
        {
            $this->conectar();
            $query = "select * from tbpais where idPais = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $pais->setIdPais($registro['idPais']);
            $pais->setNome($registro['nome']);
            
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $pais;
    }
    
    function validaNome($nome) {
        try {
            $this->conectar();
            $query = "select * from tbpais where nome = '{$nome}'";
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