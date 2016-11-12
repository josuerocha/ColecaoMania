<?php

session_start();
require_once '../class/SugestaoTipoDAO.php';

$sugestaoTipo = new SugestaoTipo();
$sugestaoTipoDAO = new SugestaoTipoDAO();

$sugestaoTipo->setIdSugestaoTipo($_POST["cd"]);


    if ($sugestaoTipoDAO->excluir($sugestaoTipo)) 
    {
        $_SESSION['mensagemModal'] = 'Sugestão de Tipo Excluída!';
        echo "<script> location.href='../pages/menu.php?pagina=sugestoes';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao excluir Sugestao de Tipo.';
        echo "<script> location.href='../pages/menu.php?pagina=sugestoes';</script>";
    }

?>