<?php

session_start();
require_once '../class/TipoColecaoDAO.php';

$tipoColecao = new TipoColecao();
$tipoColecaoDAO = new TipoColecaoDAO();

$nome = $_POST["nome"];

if($tipoColecaoDAO->validaNome($nome))
{
    if(isset($_POST["cd"]))
    {
        $_SESSION['mensagemModal'] = 'Tipo de coleção já existe.!';
        echo "<script> location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }else
    {
        $_SESSION['mensagemModal'] = 'Tipo de coleção já existe.!';
        echo "<script> location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }
}
else{
    
    $tipoColecao->setNome($nome);
    
    if(isset($_POST["cd"]))
    {
        $tipoColecao->setIdTipoColecao($_POST["cd"]);
    }

    if ($tipoColecaoDAO->salvar($tipoColecao)) 
    {
        $_SESSION['mensagemModal'] = 'Tipo Salvo!';
        echo "<script> location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao salvar.';
        echo "<script> location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }
}
?>