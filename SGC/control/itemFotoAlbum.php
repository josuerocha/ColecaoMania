<?php

session_start();
require_once '../class/ItemColecaoDAO.php';

$itemColecao = new ItemColecao();
$itemColecaoDAO = new ItemColecaoDAO();

$itemColecao->setIdItemColecao($_POST["cdI"]);
$itemColecao->setIdColecao($_POST["cdC"]);

$itemColecaoDAO->alteraFotoAlbum($itemColecao->getIdColecao(), $itemColecao->getIdItemColecao());

$_SESSION['mensagemModal'] = 'Foto do álbum definida!';
echo "<script>location.href='../pages/menu.php?pagina=itens&cd={$_POST["cdC"]}';</script>";

?>