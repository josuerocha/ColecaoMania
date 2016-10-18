<?php

session_start();
require_once '../class/IdiomaDAO.php';

$idioma = new Idioma();
$idiomaDAO = new IdiomaDAO();

$idioma->setIdIdioma($_POST["cd"]);


    if ($idiomaDAO->excluir($idioma)) 
    {
        echo "<script>alert('Idioma Excluído!'); location.href='../pages/menu.php?pagina=idiomas';</script>";
    } else 
    {
        echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=idiomas';</script>";
    }

?>