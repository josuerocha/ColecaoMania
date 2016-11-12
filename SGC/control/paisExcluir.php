<?php

session_start();
require_once '../class/PaisDAO.php';

$pais = new Pais();
$paisDAO = new PaisDAO();

$pais->setIdPais($_POST["cd"]);


    if ($paisDAO->excluir($pais)) 
    {
        $_SESSION['mensagemModal'] = 'País Excluído!';
        echo "<script> location.href='../pages/menu.php?pagina=paises';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao excluir item.';
        echo "<script> location.href='../pages/menu.php?pagina=paises';</script>";
    }

?>