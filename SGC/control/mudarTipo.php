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
 echo "<script>alert('Você é o único Administrador!'); location.href='../pages/menu.php?pagina=usuarios';</script>";
}else
{
     
if ( $usuarioDAO->mudaTipo($_POST["cd"], $tipo))
{
    if($tipo == 2 && $_POST["cd"] == $_SESSION["codigo"] )
    {
         echo "<script>alert('Tipo alterado!'); location.href='../pages/menu.php?pagina=dados';</script>";
    }else
    {
        echo "<script>alert('Tipo alterado!'); location.href='../pages/menu.php?pagina=usuarios';</script>";
    }
}
else
{
    echo "<script>alert('Erro ao alterar tipo'); location.href='../pages/menu.php?pagina=usuarios';</script>";
}
}
?>