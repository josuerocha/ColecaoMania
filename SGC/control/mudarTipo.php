<?php

session_start();
require_once '../class/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->buscarPorId($_POST["cd"]);

if($usuario->getTipo() == 1)
{
    $tipo = 2;
}else
{
    $tipo = 1;
}
if(!$usuarioDAO->adminCount() && $usuario->getTipo() == 1)
{
    $_SESSION['mensagemModal'] = 'Você é o único Administrador!';
    echo "<script> location.href='../pages/menu.php?pagina=usuarios';</script>";
}else
{
     
if ( $usuarioDAO->mudaTipo($_POST["cd"], $tipo))
{
    if($tipo == 2 && $_POST["cd"] == $_SESSION["codigo"] )
    {
        $_SESSION['mensagemModal'] = 'Tipo alterado!';
        echo "<script> location.href='../pages/menu.php?pagina=dados';</script>";
    }else
    {
        $_SESSION['mensagemModal'] = 'Tipo alterado!';
        echo "<script> location.href='../pages/menu.php?pagina=usuarios';</script>";
    }
}
else
{
    $_SESSION['mensagemModal'] = 'Erro ao alterar tipo.';
    echo "<script> location.href='../pages/menu.php?pagina=usuarios';</script>";
}
}
?>