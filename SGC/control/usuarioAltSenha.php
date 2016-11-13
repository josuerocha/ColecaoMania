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
        $_SESSION['mensagemModal'] = 'Nova senha inválida!';
        echo "<script> location.href='../pages/menu.php?pagina=senha';</script>";
    } else 
    {
 
     if($usuarioDAO->validaSenha($_SESSION["codigo"],$senhaAtual))
     {      
         $usuario->setSenha(MD5($novaSenha));
         
         if($usuarioDAO->alterarSenha($usuario))
         {
            $_SESSION['mensagemModal'] = 'Senha salva com sucesso!';
            echo "<script> location.href='../pages/menu.php?pagina=senha';</script>";
        } else 
        {
            $_SESSION['mensagemModal'] = 'Erro ao salvar senha.';
            echo "<script> location.href='../pages/menu.php?pagina=senha';</script>";
        }
     }
     else 
     {
        $_SESSION['mensagemModal'] = 'Senha atual inválida!';
        echo "<script> location.href='../pages/menu.php?pagina=senha';</script>";
     }
   }

?>