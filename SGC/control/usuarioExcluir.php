<?php

session_start();
require_once '../class/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setIdUsuario($_SESSION["codigo"]);

//echo $usuarioDAO->buscaCodPerfil($_SESSION["codigo"]);
if (!$usuarioDAO->adminCount()) 
{
    if ($usuarioDAO->excluir($usuario)) 
    {
        $usuarioDAO->mudaTipo($_SESSION["codigo"], 2);
        session_destroy();
        echo "<script>alert('Conta Desativada!'); location.href='../pages/index.php';</script>";
    } else 
    {
        echo "<script>alert('Erro ao desativar conta.'); location.href='../pages/menu.php';</script>";
    }
} else {
    echo "<script>alert('Administrador não pode ser desativado!'); location.href='../pages/menu.php';</script>";
}
?>