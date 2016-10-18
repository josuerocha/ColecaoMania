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
    echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=endereco';</script>";
} else 
{
    echo "<script>alert('Erro ao salvar o Sucesso.'); location.href='../pages/menu.php?pagina=endereco';</script>";
}
?>