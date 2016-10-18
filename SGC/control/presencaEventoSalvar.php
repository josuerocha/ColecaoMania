<?php

session_start();
require_once '../class/EventoDAO.php';
require_once '../class/ParticipaEventoDAO.php';

$evento = new Evento();
$eventoDAO = new EventoDAO();

$evento->setIdEvento($_POST["cd"]);
$evento = $eventoDAO->buscarPorId($evento->getIdEvento());
$evento->setNroParticipantes($evento->getNroParticipantes()+1);

$participacao = new ParticipaEvento();
$participacaoDAO = new ParticipaEventoDAO();

$participacao->setIdEvento($evento->getIdEvento());
$participacao->setIdUsuario($_SESSION["codigo"]);

if ($eventoDAO->salvar($evento) && $participacaoDAO->salvar($participacao)) 
{
       echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=euvou';</script>";
} else 
{
    echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=euvou';</script>";
}
?>