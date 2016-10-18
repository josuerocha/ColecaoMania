<?php

session_start();
require_once '../class/SugestaoTipoDAO.php';

$sugestaoTipo = new SugestaoTipo();
$sugestaoTipoDAO = new SugestaoTipoDAO();

$sugestaoTipo->setIdSugestaoTipo($_POST["cd"]);


    if ($sugestaoTipoDAO->excluir($sugestaoTipo)) 
    {
        echo "<script>alert('Sugestão de Tipo Excluída!'); location.href='../pages/menu.php?pagina=sugestoes';</script>";
    } else 
    {
        echo "<script>alert('Erro ao excluir Sugestao de Tipo.'); location.href='../pages/menu.php?pagina=sugestoes';</script>";
    }

?>