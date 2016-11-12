<?php

session_start();
require_once '../class/EventoDAO.php';

$itemColecao = new Evento();
$eventoDAO = new EventoDAO();

$itemColecao->setIdEvento($_POST["cd"]);

    if ($eventoDAO->excluir($itemColecao)) 
    {
        $_SESSION['mensagemModal'] = 'Evento Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=eventos';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao excluir evento.';
        echo "<script> location.href='../pages/menu.php';</script>";
    }

?>