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
    echo "<script>alert('Pais já existe.'); location.href='../pages/menu.php?pagina=novPais&cd={$_POST["cd"]}';</script>";
    }else
    {
         echo "<script>alert('Pais já existe.'); location.href='../pages/menu.php?pagina=novPais';</script>";
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
       echo "<script>alert('Pais Salvo!');location.href='../pages/menu.php?pagina=paises';</script>";
    } else 
    {
        echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=paises';</script>";
    }
}
?>