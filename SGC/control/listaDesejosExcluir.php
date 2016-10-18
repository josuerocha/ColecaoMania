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
        echo "<script>alert('Item Excluído!'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
    } else {
        echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
    }
} else {
    if ($dep == 1) {
        $itemListaDAO->excluir($itemLista);
        $itemColecaoDAO->excluir($itemColecao);
        if ($colecaoDAO->excluir($colecao)) {
            echo "<script>alert('Item Excluído!'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        } else {
            echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        }
    }
    if ($dep == 0) {
        if ($itemListaDAO->excluir($itemLista)) {
            echo "<script>alert('Item Excluído!'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        } else {
            echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
        }
    }
}
?>