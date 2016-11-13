<?php

session_start();
require_once '../class/ItemListaDesejosDAO.php';
require_once '../class/ListaDesejosDAO.php';
require_once '../class/ItemColecaoDAO.php';
require_once '../class/ColecaoDAO.php';

$colecao = new Colecao();
$colecaoDAO = new ColecaoDAO();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();

$itemLista = new ItemListaDesejos();
$itemListaDAO = new ItemListaDesejosDAO();

$itemLista->setIdItemColecao($_POST["cdI"]);
$itemLista->setIdListaDesejos($_POST["cd"]);

$itemColecao = $itemColecaoDAO->buscarPorId($itemLista->getIdItemColecao());
$colecao = $colecaoDAO->buscarPorId($itemColecao->getIdColecao());


$dep = $colecaoDAO->verificaDependencia($itemColecao->getIdColecao());

if ($dep > 1) {//tem dependencia, não pode excluir coleção
    $itemListaDAO->excluir($itemLista);
    if ($itemColecaoDAO->excluir($itemColecao)) {
        $_SESSION['mensagemModal'] = 'Item Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
    } else {
        $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
        echo "<script> location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
    }
} else {
    if ($dep == 1) {
        $itemListaDAO->excluir($itemLista);
        $itemColecaoDAO->excluir($itemColecao);
        if ($colecaoDAO->excluir($colecao)) {
            $_SESSION['mensagemModal'] = 'Item Excluído!';
            echo "<script> location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        } else {
            $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
            echo "<script> location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        }
    }
    if ($dep == 0) {
        if ($itemListaDAO->excluir($itemLista)) {
            $_SESSION['mensagemModal'] = 'Item Excluído!';
            echo "<script> location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        } else {
            $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
            echo "<script> location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        }
    }
}
?>