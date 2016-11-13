<?php

session_start();
require_once '../class/IdiomaDAO.php';

$idioma = new Idioma();
$idiomaDAO = new IdiomaDAO();

$idioma->setIdIdioma($_POST["cd"]);


    if ($idiomaDAO->excluir($idioma)) 
    {
        $_SESSION['mensagemModal'] = 'Idioma Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=idiomas';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
        echo "<script> location.href='../pages/menu.php?pagina=idiomas';</script>";
    }

?>