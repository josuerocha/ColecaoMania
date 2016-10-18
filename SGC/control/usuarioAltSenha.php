<?php
session_start();
require_once '../class/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setIdUsuario($_SESSION["codigo"]);
$senhaAtual = MD5($_POST["senhaAtual"]);
$novaSenha = $_POST["senha"];

    if (strlen($novaSenha)<8) 
    {
        echo "<script>alert('Nova senha inválida!'); location.href='../pages/menu.php?pagina=senha';</script>";
    } else 
    {
 
     if($usuarioDAO->validaSenha($_SESSION["codigo"],$senhaAtual))
     {      
         $usuario->setSenha(MD5($novaSenha));
         
         if($usuarioDAO->alterarSenha($usuario))
         {
            echo "<script>alert('Senha salva com sucesso!'); location.href='../pages/menu.php?pagina=senha';</script>";
        } else 
        {
            echo "<script>alert('Erro ao salvar senha.'); location.href='../pages/menu.php?pagina=senha';</script>";
        }
     }
     else 
     {
        echo "<script>alert('Senha atual inválida!'); location.href='../pages/menu.php?pagina=senha';</script>";
     }
   }

?>