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

        session_start();
        $_SESSION['mensagemModal'] = 'Conta Desativada!';
        echo "<script> location.href='../pages/index.php';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao desativar conta.';
        echo "<script> location.href='../pages/menu.php';</script>";
    }
} else {
    $_SESSION['mensagemModal'] = 'Administrador não pode ser desativado!';
    echo "<script> location.href='../pages/menu.php';</script>";
}
?>