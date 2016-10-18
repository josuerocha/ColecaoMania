<?php

session_start();
require_once '../class/ItemListaDesejosDAO.php';
require_once '../class/ListaDesejosDAO.php';
require_once '../class/UsuarioDAO.php';
require_once '../class/NotificacaoDAO.php';
require_once '../class/ItemColecaoDAO.php';
require_once '../class/ColecaoDAO.php';

$itemLista = new ItemListaDesejos();
$itemListaDAO = new ItemListaDesejosDAO();

$notificacao = new Notificacao();
$notificacaoDAO = new NotificacaoDAO();

$itemColecao = new ItemColecao();
$itemColecaoDAO = new ItemColecaoDAO();

$colecao = new Colecao();
$colecaoDAO = new ColecaoDAO();

$listaDesejos = new ListaDesejos();
$listaDesejosDAO = new ListaDesejosDAO();
$listaDesejos = $listaDesejosDAO->buscarPorId($_SESSION["codigo"]);

$itemLista->setIdItemColecao($_POST["cdI"]);
$itemLista->setIdListaDesejos($listaDesejos->getIdListaDesejos());

$notificacao->setIdUsuario($_SESSION["codigo"]);//usuario que adicionou item a lista de desejos

$itemColecao = $itemColecaoDAO->buscarPorId($itemLista->getIdItemColecao());
$colecao = $colecaoDAO->buscarPorId($itemColecao->getIdColecao());
$notificacao->setIdUsuNotf($colecao->getIdUsuDono());//usuario dono do item
$notificacao->setObs("adicionou um item seu na lista de desejos");
$notificacao->setIdItemNotf($listaDesejos->getIdListaDesejos());

if ($itemListaDAO->salvar($itemLista) ) 
{
    if( $notificacaoDAO->salvar($notificacao))
    {
         echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=minhaListaDesejos';</script>";
    }
      
} else 
{
    echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=pesqOutrosItensLista';</script>";
}
//toda vez que o usuario exclui um item dependente da lista ele apenas tem seu status modificado para 0, quando o item e 
//excluido da lista ele realmente e excluido definitivamente
?>
