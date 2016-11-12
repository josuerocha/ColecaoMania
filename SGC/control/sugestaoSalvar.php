<?php

session_start();
require_once '../class/SugestaoTipoDAO.php';

$sugestaoTipo = new SugestaoTipo();
$sugestaoTipoDAO = new SugestaoTipoDAO();

$sugestaoTipo->setNome($_POST["sgTipo"]);
$sugestaoTipo->setIdUsuSg($_SESSION["codigo"]);

if ($sugestaoTipoDAO->salvar($sugestaoTipo)) 
{
    $_SESSION['mensagemModal'] = 'Sugestão enviada ao Administrador.';
    echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
} else 
{
    $_SESSION['mensagemModal'] = 'Erro ao salvar.';
    echo "<script> location.href='../pages/menu.php?pagina=colecoes';</script>";
}
?>