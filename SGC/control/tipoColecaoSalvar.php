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
    echo "<script>alert('Tipo de coleção já existe.'); location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }else
    {
         echo "<script>alert('Tipo de coleção já existe.'); location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
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
       echo "<script>alert('Tipo Salvo!');location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    } else 
    {
        echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=tiposDeColecao';</script>";
    }
}
?>