<?php

session_start();
require_once '../class/ColecaoDAO.php';
require_once '../class/ItemColecaoDAO.php';

$colecao = new Colecao();
$colecaoDAO = new ColecaoDAO();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();
$itens = array();

$colecao->setIdColecao($_POST["cd"]);
$itens = $itemColecaoDAO->pesqItColId($colecao->getIdColecao());

$dependencia = 0;

foreach ($itens as $itemColecao) {
    if ($itemColecaoDAO->verificaDependencia($itemColecao->getIdItemColecao())) {
        $dependencia++;
        $itemColecaoDAO->mudaStatus($itemColecao->getIdItemColecao(), 0);
    } else {
        $itemColecaoDAO->excluir($itemColecao);
    }
}

if ($dependencia > 0) {
    if ($colecaoDAO->mudaStatus($colecao->getIdColecao(), 0)) {
        $_SESSION['mensagemModal'] = 'Coleção Excluída!';
        echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
    } else {
        $_SESSION['mensagemModal'] = 'Erro ao excluir coleção.';
        echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
    }
} else {
    if ($colecaoDAO->excluir($colecao)) {
        $_SESSION['mensagemModal'] = 'Coleção Excluída!';
        echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
    } else {
        $_SESSION['mensagemModal'] = 'Erro ao excluir coleção.';
        echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
    }
}
?>