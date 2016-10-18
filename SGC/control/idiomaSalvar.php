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
    echo "<script>alert('Idioma já existe.'); location.href='../pages/menu.php?pagina=novIdioma&cd={$_POST["cd"]}';</script>";
    }else
    {
         echo "<script>alert('Idioma já existe.'); location.href='../pages/menu.php?pagina=novIdioma';</script>";
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
       echo "<script>alert('Idioma Salvo!');location.href='../pages/menu.php?pagina=idiomas';</script>";
    } else 
    {
        echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=idiomas';</script>";
    }
}
?>