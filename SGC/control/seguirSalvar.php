<?php

session_start();
require_once '../class/UsuarioSeguidoDAO.php';

$usuarioSeguido = new UsuarioSeguido();
$usuarioSeguidoDAO = new UsuarioSeguidoDAO();

$usuarioSeguido->setIdUsuario($_SESSION["codigo"]);
$usuarioSeguido->setIdUsuSeguido($_POST["cd"]);

if ($usuarioSeguidoDAO->salvar($usuarioSeguido)) 
{
       echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=quemeusigo';</script>";
} else 
{
    echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=quemmesegue';</script>";
}
?>