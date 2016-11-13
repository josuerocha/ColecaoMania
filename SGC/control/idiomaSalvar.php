<?php

session_start();
require_once '../class/IdiomaDAO.php';

$idioma = new Idioma();
$idiomaDAO = new IdiomaDAO();

$nome = $_POST["nome"];

if($idiomaDAO->validaNome($nome))
{
    if(isset($_POST["cd"]))
    {
        $_SESSION['mensagemModal'] = 'Idioma já existe.';
        echo "<script> location.href='../pages/menu.php?pagina=novIdioma&cd={$_POST["cd"]}';</script>";
    }else
    {
        $_SESSION['mensagemModal'] = 'Idioma já existe.';
        echo "<script> location.href='../pages/menu.php?pagina=novIdioma';</script>";
    }
}
else{
    
    $idioma->setNome($nome);
    
    if(isset($_POST["cd"]))
    {
        $idioma->setIdIdioma($_POST["cd"]);
    }

    if ($idiomaDAO->salvar($idioma)) 
    {
        $_SESSION['mensagemModal'] = 'Idioma já existe.';
       echo "<script> location.href='../pages/menu.php?pagina=idiomas';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao salvar.';
        echo "<script> location.href='../pages/menu.php?pagina=idiomas';</script>";
    }
}
?>