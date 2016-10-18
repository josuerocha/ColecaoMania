<?php

session_start();
require_once '../class/PaisDAO.php';

$pais = new Pais();
$paisDAO = new PaisDAO();

$pais->setIdPais($_POST["cd"]);


    if ($paisDAO->excluir($pais)) 
    {
        echo "<script>alert('Pais Excluído!'); location.href='../pages/menu.php?pagina=paises';</script>";
    } else 
    {
        echo "<script>alert('Erro ao excluir item.'); location.href='../pages/menu.php?pagina=paises';</script>";
    }

?>