<?php

session_start();
require_once '../class/TipoColecaoDAO.php';

$tipoColecao = new TipoColecao();
$tipoColecaoDAO = new TipoColecaoDAO();

$tipoColecao->setIdTipoColecao($_POST["cd"]);


    if ($tipoColecaoDAO->excluir($tipoColecao)) 
    {
        $_SESSION['mensagemModal'] = 'Tipo de Coleção Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
        echo "<script> location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }

?>