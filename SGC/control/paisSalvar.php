<?php

session_start();
require_once '../class/PaisDAO.php';

$pais = new Pais();
$paisDAO = new PaisDAO();

$nome = $_POST["nome"];

if($paisDAO->validaNome($nome))
{
    if(isset($_POST["cd"]))
    {
        $_SESSION['mensagemModal'] = 'País já existe.';
        echo "<script> location.href='../pages/menu.php?pagina=novPais&cd={$_POST["cd"]}';</script>";
    }else
    {
        $_SESSION['mensagemModal'] = 'País já existe.';
        echo "<script> location.href='../pages/menu.php?pagina=novPais';</script>";
    }
}
else{
    
    $pais->setNome($nome);
    
    if(isset($_POST["cd"]))
    {
        $pais->setIdPais($_POST["cd"]);
    }

    if ($paisDAO->salvar($pais)) 
    {
        $_SESSION['mensagemModal'] = 'País Salvo!';
       echo "<script> location.href='../pages/menu.php?pagina=paises';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao salvar.';
        echo "<script> location.href='../pages/menu.php?pagina=paises';</script>";
    }
}
?>