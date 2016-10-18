<?php

session_start();
require_once '../class/EventoDAO.php';

$itemColecao = new Evento();
$eventoDAO = new EventoDAO();

$itemColecao->setIdEvento($_POST["cd"]);

    if ($eventoDAO->excluir($itemColecao)) 
    {
        echo "<script>alert('Evento Excluído!'); location.href='../pages/menu.php?pagina=eventos';</script>";
    } else 
    {
        echo "<script>alert('Erro ao excluir evento.'); location.href='../pages/menu.php';</script>";
    }

?>