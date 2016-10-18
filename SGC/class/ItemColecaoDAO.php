<?php

require_once 'ItemColecao.php';
require_once 'ACrudDAO.php';

class ItemColecaoDAO extends ACrudDAO 
{

    function salvar($itemColecao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            if ($itemColecao->getIdItemColecao() == 0) 
                {
                $itemColecao->setStatus(1);
                $query = "insert into tbitemColecao (idItemColecao, idColecao, nome, descricao, quantidade, imagem, nroSerie, interesse,status) values ('{$itemColecao->getIdItemColecao()}', '{$itemColecao->getIdColecao()}','{$itemColecao->getNome()}','{$itemColecao->getDescricao()}','{$itemColecao->getQuantidade()}','{$itemColecao->getImagem()}','{$itemColecao->getNroSerie()}','{$itemColecao->getInteresse()}','{$itemColecao->getStatus()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $itemColecao->setIdItemColecao($codigo);
            } 
            else 
            {
                $query = "update tbitemColecao set nome = '{$itemColecao->getNome()}', descricao = '{$itemColecao->getDescricao()}', quantidade = '{$itemColecao->getQuantidade()}', imagem = '{$itemColecao->getImagem()}', nroSerie = '{$itemColecao->getNroSerie()}', interesse = '{$itemColecao->getInteresse()}' where idItemColecao={$itemColecao->getIdItemColecao()}";
                 
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

    function excluir($itemColecao) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbitemColecao where idItemColecao = {$itemColecao->getIdItemColecao()}";
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
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }

    function buscarPorId($codigo) 
    {
        $itemColecao = new ItemColecao();
        try 
        {
            $this->conectar();
            $query = "select * from tbitemColecao where idItemColecao = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $itemColecao->setIdItemColecao($registro['idItemColecao']);
            $itemColecao->setIdColecao($registro['idColecao']);
            $itemColecao->setNome($registro['nome']);
            $itemColecao->setDescricao($registro['descricao']);
            $itemColecao->setQuantidade($registro['quantidade']);
            $itemColecao->setImagem($registro['imagem']);
            $itemColecao->setNroSerie($registro['nroSerie']);
            $itemColecao->setInteresse($registro['interesse']);
            $itemColecao->setStatus($registro['status']);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $itemColecao;
    }
    
     function listarItCol($cod) 
    {
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where idColecao={$cod} and status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }

        function buscaFoto($cod) {

        try {
            $this->conectar();
            $query = "select imagem from tbitemcolecao where idItemColecao = '{$cod}'";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $foto = $registro['imagem'];
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $foto;
    }
    
    function pesqItCol($cod,$nome) 
    {
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where idColecao={$cod} and nome like '%{$nome}%' and status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }
    
    function pesqItColId($cod) 
    {
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where idColecao={$cod} ";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }
    
    function excluirColIt($cod) 
    {
        $situacao = TRUE;
        try 
        {
            $this->conectar();
            $query = "delete from tbitemColecao where idColecao = {$cod}";
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
    
    function mudaStatus($item, $status) {
        $situacao = TRUE;
        try {
            $this->conectar();

            $query = "update tbitemColecao set status = '{$status}' where idItemColecao = '{$item}'";
            $this->conexao->query($query);

            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }
    
    function pesqItNome($nome,$idTp) 
    {
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where nome like '%{$nome}%' and status=1 and idColecao in (SELECT idColecao FROM tbcolecao WHERE idTipoColecao = {$idTp})";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }
    
     function pesqItNroSerie($nroSerie,$idTp) 
    {
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where nroSerie like '%{$nroSerie}%' and status=1  and idColecao in (SELECT idColecao FROM tbcolecao WHERE idTipoColecao = {$idTp} )";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }
    
     function pesqItDesc($desc,$idTp) 
    {
        $itensColecao = array();
        try {
            $this->conectar();
            $query = "select * from tbitemColecao where descricao like '%{$desc}%' and status=1 and idColecao in (SELECT idColecao FROM tbcolecao WHERE idTipoColecao = {$idTp}  )";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $itemColecao = new ItemColecao();
                $itemColecao->setIdItemColecao($registro['idItemColecao']);
                $itemColecao->setIdColecao($registro['idColecao']);
                $itemColecao->setNome($registro['nome']);
                $itemColecao->setDescricao($registro['descricao']);
                $itemColecao->setQuantidade($registro['quantidade']);
                $itemColecao->setImagem($registro['imagem']);
                $itemColecao->setNroSerie($registro['nroSerie']);
                $itemColecao->setInteresse($registro['interesse']);
                $itemColecao->setStatus($registro['status']);
                array_push($itensColecao, $itemColecao);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $itensColecao;
    }
    
    function top10($idTp) 
    {
        $resultados = array();
        try {
            $this->conectar();
            $query = "select U.idUsuario,U.nome,U.imagem,count(I.idItemColecao) as qtd from (tbusuario as U) inner join (tbcolecao as C) on U.idUsuario = C.idUsuDono 
inner join (tbitemcolecao as I) on C.idColecao = I.idColecao inner join (tbtipocolecao as T) on T.idTipoColecao = C.idTipoColecao
where T.idTipoColecao='{$idTp}' and U.status=1 and I.status=1 group by U.idUsuario order by qtd desc limit 10";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) 
            {
                $top10 = new Top10();
                 $top10->setIdUsuario($registro['idUsuario']);
                $top10->setNome($registro['nome']);
                 $top10->setImagem($registro['imagem']);
                 $top10->setQtdItens($registro['qtd']);
                array_push($resultados ,  $top10);
            }
            $resultado->close();
        } 
        catch (Exception $ex)
        {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $resultados ;
    }
    
     function verificaDependencia($item) {
        try {
            $this->conectar();
            $query = "select * from (tbitemcolecao as I) inner join (tbitemlistadesejos as L) on I.idItemColecao=L.idItemColecao ";
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