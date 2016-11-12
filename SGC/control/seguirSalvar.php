<?php

session_start();
require_once '../class/UsuarioSeguidoDAO.php';

$usuarioSeguido = new UsuarioSeguido();
$usuarioSeguidoDAO = new UsuarioSeguidoDAO();

$usuarioSeguido->setIdUsuario($_SESSION["codigo"]);
$usuarioSeguido->setIdUsuSeguido($_POST["cd"]);

if ($usuarioSeguidoDAO->salvar($usuarioSeguido)) 
{
    $_SESSION['mensagemModal'] = 'Salvo com sucesso!';
    echo "<script> location.href='../pages/menu.php?pagina=quemeusigo';</script>";
} else 
{
    $_SESSION['mensagemModal'] = 'Erro ao salvar.';
    echo "<script> location.href='../pages/menu.php?pagina=quemmesegue';</script>";
}
?>