<?php
require_once '../class/ColecaoDAO.php';
require_once '../class/Colecao.php';
require_once '../class/ItemColecaoDAO.php';
require_once '../class/ItemColecao.php';
require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';
require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';
require_once '../control/caminhos.php';

$usuarioDAO = new UsuarioDAO();

$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tipos = array();
$tipos = $tipoColecaoDAO->listar();

$colecaoDAO = new ColecaoDAO();
$colecao = new Colecao();
$colecoes = array();
$colecoes = $colecaoDAO->pesqColUsu($_SESSION["codigo"], $_POST["pesq"]);

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();
$itensColecao = array();
?>
<!-- MEUS EVENTOS
================================================== -->
<div class="container">

    <h2 align="center">Minhas Coleções </h2> 
    <?php if(isset($_POST["pesq"])){ ?> <h5><a data-toggle="modal" href="menu.php?pagina=colecoes"><i class="aweso-hand-left"></i>&nbsp;Voltar</a> </h5><?php } ?>
     <h5>Nova <a data-toggle="modal" href="#novColecao"><i class="aweso-plus"></i></a> </h5>
    <form method="post" enctype="multipart/form-data" name="form1" class="pull-right" action="menu.php?pagina=pesqColecoes">
        <label>Pesquisar: <input type="text" id="pesq" name="pesq" placeholder="nome" onkeypress="submitonEnter(event);" value="<?php if(isset($_POST["pesq"])){ echo $_POST["pesq"]; }?>"></label>
    </form>

    <br><br><br>

    <?php
    $cont = 1;
    $totalPercorrido = 0;

    foreach ($colecoes as $colecao) {
        if ($cont == 1) {
            ?>

            <div class="span12 row-fluid"><?php } ?>

            <div class="span4">
                <a href="menu.php?pagina=itens&cd=<?php echo $colecao->getIdColecao() ?>">
                    <div class="cycle-slideshow" id="fade"> 
                        <?php
                        $itensColecao = $itemColecaoDAO->listarItCol($colecao->getIdColecao());

                        foreach ($itensColecao as $itemColecao) {
                            ?>
                            <img src="<?php echo ".." . $caminhoImagens . "" . $itemColecao->getImagem() ?>"/>
                        <?php } ?>

                        <?php if (sizeof($itensColecao) == 0) {
                            ?>
                            <img src="<?php echo ".." . $caminhoImagens . "" . "noimg.png" ?>"/>
                        <?php } ?>

                    </div>
                </a>
                <p>
                    <?php echo $colecao->getNome() ?><br><?php echo utf8_encode($tipoColecaoDAO->buscarPorId($colecao->getIdTipoColecao())->getNome()) ?><br>

                <form class="span1" name="frmAlt" method="post" action="menu.php?pagina=altColecao">
                    <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                    <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                </form>   

                <form class="span1" name="frmExc" method="post" action="../control/colecaoExcluir.php" onsubmit="javascript: return confirm('Excluir colecao? Se houver itens nessa coleção, eles também serão excluídos.');">
                    <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                    <button type="submit" class="btn-link"><i class="aweso-trash aweso-large"></i></button>
                </form>
                </p>  
            </div>

            <?php
            $cont++;
            $totalPercorrido++;
            ?>
            <?php if ($cont == 4 || $totalPercorrido == sizeof($colecoes)) {
                ?> 
            </div> 
            <?php
            $cont = 1;
        }
        ?>

    <?php }
    if(sizeof($colecoes)==0 && isset($_POST["pesq"])){ ?>  <h4 align="center">Nenhuma coleção encontrada.</h4> <?php } ?>
    <br><br>
    <div id="sgTipo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sampleModal1" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="sampleModal1">Sugerir Tipo</h3>
        </div>
        <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/sugestaoSalvar.php">
            <div class="modal-body">
                <div class="control-group">

                    <div class="controls">
                        <input type="text" class="input-xlarge form-horizontal" id="sgTipo" name="sgTipo" value="" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}">
                    </div>  
                </div><!-- /control-group -->
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>>
    </div><!-- /sample modal #1 -->

    <div id="addTipo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sampleModal1" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="sampleModal1">Novo Tipo</h3>
        </div>
        <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/tipoSalvar.php">
            <div class="modal-body">
                <div class="control-group">

                    <div class="controls">
                        <input type="text" class="input-xlarge form-horizontal" id="addTipo" name="addTipo" value="" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}">
                    </div>  
                </div><!-- /control-group -->
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div><!-- /sample modal #1 -->
</div>

