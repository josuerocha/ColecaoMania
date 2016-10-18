<?php

session_start();
require_once '../class/ColecaoDAO.php';

$colecao = new Colecao();
$colecaoDAO = new ColecaoDAO();

$colecao->setNome($_POST["nome"]);
$colecao->setDescricao($_POST["desc"]);
$colecao->setIdTipoColecao($_POST["tipo"]);
$colecao->setIdUsuDono($_SESSION["codigo"]);

if(isset($_POST["cd"]))
{
    $colecao->setIdColecao($_POST["cd"]);
}else
{
     $colecao->setIdColecao(0);
}

if ($colecaoDAO->salvar($colecao)) 
{
       echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=itens&cd={$colecao->getIdColecao()}';</script>";
} else 
{
    echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=colecoes';</script>";
}
?>