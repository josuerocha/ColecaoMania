<?php

session_start();
require_once '../class/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->buscarPorId($_SESSION["codigo"]);
$usuario->setCEP($_POST["cep"]);
$usuario->setEstado($_POST["estado"]);
$usuario->setCidade($_POST["cidade"]);
$usuario->setBairro($_POST["bairro"]);
$usuario->setRua($_POST["rua"]);
$usuario->setNumero($_POST["num"]);
$usuario->setComplemento($_POST["comp"]);

if ($usuarioDAO->salvar($usuario)) 
{
    $_SESSION['mensagemModal'] = 'Salvo com sucesso!';
   echo "<script> location.href='../pages/menu.php?pagina=endereco'; </script>";
} else 
{
    $_SESSION['mensagemModal'] = 'Erro ao salvar o Sucesso';
    echo "<script> location.href='../pages/menu.php?pagina=endereco'; </script>";
}
?>