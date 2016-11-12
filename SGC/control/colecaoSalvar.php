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
    $_SESSION['mensagemModal'] = 'Salvo com sucesso!';
    echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$colecao->getIdColecao()}';</script>";
} else 
{
    $_SESSION['mensagemModal'] = 'Erro ao salvar.';
    echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
}
?>