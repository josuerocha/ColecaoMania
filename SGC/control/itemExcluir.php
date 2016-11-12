<?php

session_start();
require_once '../class/ItemColecaoDAO.php';

$itemColecao = new ItemColecao();
$itemColecaoDAO = new ItemColecaoDAO();

$itemColecao->setIdItemColecao($_POST["cdI"]);

if ($itemColecaoDAO->verificaDependencia($itemColecao->getIdItemColecao())) {
    if ($itemColecaoDAO->mudaStatus($itemColecao->getIdItemColecao(), 0)) {
        $_SESSION['mensagemModal'] = 'Item Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    } else {
        $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
        echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    }
} else {
     if ( $itemColecaoDAO->excluir($itemColecao)) {
         $_SESSION['mensagemModal'] = 'Item Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    } else {
        $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
        echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    }
}
?>