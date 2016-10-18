<?php

session_start();
require_once '../class/TipoColecaoDAO.php';

$tipoColecao = new TipoColecao();
$tipoColecaoDAO = new TipoColecaoDAO();

$tipoColecao->setIdTipoColecao($_POST["cd"]);


    if ($tipoColecaoDAO->excluir($tipoColecao)) 
    {
        echo "<script>alert('Tipo de Coleção Excluído!'); location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    } else 
    {
        echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }

?>