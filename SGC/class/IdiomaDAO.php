<?php

require_once 'Idioma.php';
require_once 'ACrudDAO.php';

class IdiomaDAO extends ACrudDAO 
{

    function salvar($idioma) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($idioma->getIdIdioma() == 0) 
            {
                $query = "insert into tbidioma (idIdioma,nome) values ('{$idioma->getIdIdioma()}', '{$idioma->getNome()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $idioma->setIdIdioma($codigo);
            } else 
            {
                $query = "update tbidioma set nome = '{$idioma->getNome()}' where idIdioma={$idioma->getIdIdioma()}";
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

    function excluir($idioma) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbidioma where idIdioma = {$idioma->getIdIdioma()}";
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
        $idiomas = array();
        try 
        {
            $this->conectar();
            $query = "select * from tbidioma limit 20";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $idioma = new Idioma();
                $idioma->setIdIdioma($registro['idIdioma']);
                $idioma->setNome($registro['nome']);
                array_push($idiomas, $idioma);
            }
            $resultado->close();
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $idiomas;
    }

    function buscarPorId($codigo) 
    {
        $idioma = new Idioma();
        try 
        {
            $this->conectar();
            $query = "select * from tbidioma where idIdioma = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $idioma->setIdIdioma($registro['idIdioma']);
            $idioma->setNome($registro['nome']);
            
        } catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $idioma;
    }
    
     function validaNome($nome) {
        try {
            $this->conectar();
            $query = "select * from tbidioma where nome = '{$nome}'";
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