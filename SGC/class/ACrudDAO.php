<?php

require_once 'BancoDados.php';

abstract class ACrudDAO 
{
//teste
    protected $conexao;

    protected function conectar() 
    {
        $banco = new BancoDados();
        $this->conexao = $banco->getConexao();
    }

    protected function desconectar() 
    {
        $this->conexao->close();
    }

    abstract function salvar($objeto);

    abstract function excluir($objeto);

    abstract function listar();

    abstract function buscarPorId($codigo);
}

?> 