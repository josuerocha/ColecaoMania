<?php
require_once '../class/ColecaoDAO.php';
require_once '../class/Colecao.php';

require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

require_once '../class/ItemColecaoDAO.php';
require_once '../class/ItemColecao.php';
require_once '../control/caminhos.php';

require_once '../class/ListaDesejosDAO.php';
require_once '../class/ListaDesejos.php';

require_once '../class/ItemListaDesejosDAO.php';
require_once '../class/ItemListaDesejos.php';

$itemListaDesejos = new ItemListaDesejos();
$itemListaDesejosDAO = new ItemListaDesejosDAO();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();
$itensColecao = array();

$colecaoDAO = new ColecaoDAO();
$colecao = new Colecao();

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$pais = new Pais();
$paisDAO = new PaisDAO();

if (isset($_POST['cd'])) {
    $itensColecao = $itemColecaoDAO->listarItCol($_POST["cd"]);
    $colecao = $colecaoDAO->buscarPorId($_POST["cd"]);
} else {
    $itensColecao = $itemColecaoDAO->listarItCol($_GET["cd"]);
    $colecao = $colecaoDAO->buscarPorId($_GET["cd"]);
}
?>
<!-- ITENS DE COLEÇÃO
================================================== -->
<div class="container">
    <h2 align="center"><?php echo $colecao->getNome() ?> </h2>
    <h6 align="center"><i><?php echo $colecao->getDescricao() ?> </i></h6>
    <?php if ($colecao->getIdUsuDono() == $_SESSION["codigo"]) { ?>
        <h5><a href="menu.php?pagina=colecoes"><i class="aweso-hand-left"> </i>&nbsp;Ir para minhas coleções</a></h5>
        <h5>
            <form name="frm" method="post" action="menu.php?pagina=novItem">
                <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                Novo <a href="javascript: frm.submit();">
                    <i class="aweso-plus"></i>
                </a> 
            </form>
        </h5>
    <?php } else { ?>
        <?php
        $usuario = $usuarioDAO->buscarPorId($colecao->getIdUsuDono());
        $listaDesejos = new ListaDesejos();
        $listaDesejosDAO = new ListaDesejosDAO();
        $listaDesejos = $listaDesejosDAO->buscarPorId($_SESSION["codigo"]);
        ?>
        <div align="center">
            <a class="example-image-link" href="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" data-lightbox="example-set" data-title="Foto">
                <img class="media-object example-image" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" alt=""/></a>
            <?php
            $pais = $paisDAO->buscarPorId($usuario->getIdPais());
            echo $usuario->getNome() . " , " . $pais->getNome() . "-" . $usuario->getEstado();
            ?>
        </div>
        <form name="form1" method="post" enctype="multipart/form-data" class="pull-right" action="menu.php?pagina=entraremcontato">
            <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdUsuDono() ?>"/>
            <a><button type="submit" class="btn-link" >Entrar em contato&nbsp;<i class="aweso-comment aweso-large" /></i></button></a>
        </form>
        <h5><a href="menu.php?pagina=pesqOutrosItens"><i class="aweso-hand-left"> </i>&nbsp;Ir para pesquisa de itens</a></h5><br>
<?php } ?>

    <form name="form1" method="post" enctype="multipart/form-data" class="pull-right" action="menu.php?pagina=pesqItens">
        <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
        <label>Pesquisar: <input type="text" placeholder="nome" id="pesq" name="pesq" onkeypress="submitonEnter(event);"></label>
    </form>
    <br><br><br>
    <?php
    $cont = 1;
    $totalPercorrido = 0;
    foreach ($itensColecao as $itemColecao) {
        if ($cont == 1) {
            ?>
            <div class="span12 row-fluid"><?php } ?>
            <div class="span4">
                <a href="#"><!-- jquery abrir -->
                    <div  id="fade"> 
                        <a class="example-image-link" href="<?php echo ".." . $caminhoImagens . "" . $itemColecao->getImagem() ?>" data-lightbox="example-set" data-title="Clique a direita para avançar.">
                            <img class="example-image" src="<?php echo ".." . $caminhoImagens . "" . $itemColecao->getImagem() ?>" alt=""/></a>
                    </div>
                </a>
                <p>
                    <?php echo $itemColecao->getNome() ?>&nbsp&nbsp&nbsp<?php echo "Quantidade: " . $itemColecao->getQuantidade() ?><br>
                    <?php echo "Nº série: " . $itemColecao->getNroSerie() ?>
                    &nbsp&nbsp&nbsp
                    <?php
                    if ($itemColecao->getInteresse() == 1) {
                        echo 'Interesse: Doar';
                    }
                    if ($itemColecao->getInteresse() == 2) {
                        echo 'Interesse: Exibir';
                    }
                    if ($itemColecao->getInteresse() == 3) {
                        echo 'Interesse: Trocar';
                    }
                    if ($itemColecao->getInteresse() == 4) {
                        echo 'Interesse: Vender';
                    }
                    ?><br>
                    <?php
                    echo $itemColecao->getDescricao();
                    if ($colecao->getIdUsuDono() == $_SESSION["codigo"]) {
                        ?><br>

                    <form class="span1" name="frmAlt" method="post" action="menu.php?pagina=altItem">
                        <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                        <input type="hidden" id="cdI" name="cdI" value="<?php echo $itemColecao->getIdItemColecao() ?>"/>
                        <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                    </form>   

                    <form class="span1" name="frmExc" method="post" action="../control/itemExcluir.php" onsubmit="javascript: return confirm('Excluir item?');">
                        <input type="hidden" id="cd" name="cd" value="<?php echo $itemColecao->getIdColecao() ?>"/>
                        <input type="hidden" id="cdI" name="cdI" value="<?php echo $itemColecao->getIdItemColecao() ?>"/>
                        <button type="submit" class="btn-link"><i class="aweso-trash aweso-large"></i></button>
                    </form>
    <?php } else {
        if (!$itemListaDesejosDAO->verificaItem($itemColecao->getIdItemColecao(), $listaDesejos->getIdListaDesejos())) {
            ?>
                        <form class="span1" name="frmLD" method="post" action="../control/listaDesejosSalvar.php">
                            <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                            <input type="hidden" id="cdI" name="cdI" value="<?php echo $itemColecao->getIdItemColecao() ?>"/>
                            <a><button type="submit" class="btn-link"><i class="aweso-heart aweso-large" /></i></button></a>
                        </form>   
                <?php } else { ?> Está na sua lista de desejos<?php }
    } ?>
                </p>  
            </div>
            <?php
            $cont++;
            $totalPercorrido++;
            ?>
        <?php if ($cont == 4 || $totalPercorrido == sizeof($itensColecao)) {
            ?> 
            </div> 
            <?php
            $cont = 1;
        }
        ?>
<?php } if(sizeof($itensColecao)==0){ ?><h4 align="center">Nenhum item encontrado.</h4> <?php }
?>
    <br><br>
</div>

