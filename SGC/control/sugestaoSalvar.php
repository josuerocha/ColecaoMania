<?php

session_start();
require_once '../class/SugestaoTipoDAO.php';

$sugestaoTipo = new SugestaoTipo();
$sugestaoTipoDAO = new SugestaoTipoDAO();

$sugestaoTipo->setNome($_POST["sgTipo"]);
$sugestaoTipo->setIdUsuSg($_SESSION["codigo"]);

if ($sugestaoTipoDAO->salvar($sugestaoTipo)) 
{
       echo "<script>alert('Sugestão enviada ao Administrador.');location.href='../pages/menu.php?pagina=colecoes';</script>";
} else 
{
    echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=colecoes';</script>";
}
?>