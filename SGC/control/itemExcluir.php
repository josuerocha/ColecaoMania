<?php

session_start();
require_once '../class/ItemColecaoDAO.php';

$itemColecao = new ItemColecao();
$itemColecaoDAO = new ItemColecaoDAO();

$itemColecao->setIdItemColecao($_POST["cdI"]);

if ($itemColecaoDAO->verificaDependencia($itemColecao->getIdItemColecao())) {
    if ($itemColecaoDAO->mudaStatus($itemColecao->getIdItemColecao(), 0)) {
        echo "<script>alert('Item Excluído!'); location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    } else {
        echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    }
} else {
     if ( $itemColecaoDAO->excluir($itemColecao)) {
        echo "<script>alert('Item Excluído!'); location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    } else {
        echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    }
}
?>