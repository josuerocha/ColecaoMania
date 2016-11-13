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
require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$pais = new Pais();
$paisDAO = new PaisDAO();

$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();

$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tipos = array();
$tipos = $tipoColecaoDAO->listar();

$colecaoDAO = new ColecaoDAO();
$colecao = new Colecao();
$colecoes = array();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();
$itensColecao = array();
?>
<!-- COLEÇÕES
================================================== -->
<div class="container">
    <?php
    if (isset($_POST["top10"])) {
        if ($_POST["top10"] != $_SESSION["codigo"]) {
            $usuario = $usuarioDAO->buscarPorId($_POST["top10"]);
            $colecoes = $colecaoDAO->listarColUsu($usuario->getIdUsuario());
            ?>

            <h2 align="center">Coleções </h2>
            <div align="center">
                <a class="example-image-link" href="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" data-lightbox="example-set" data-title="Foto">
                    <img class="media-object example-image" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" alt=""/></a>
                <?php
                $pais = $paisDAO->buscarPorId($usuario->getIdPais());
                echo $usuario->getNome() . " , " . $pais->getNome() . "-" . $usuario->getEstado();
                ?><br>

                <form name="frmC" method="post" action="menu.php?pagina=topColecionadores">
                    <input type="hidden" id="tipo" name="tipo" value="<?php echo $_POST["tipo"] ?>"/>
                    <a><button type="submit" class="btn-link pull-left"><i class="aweso-hand-left"> </i>&nbsp;Ir para top10 </button></a>
                </form>

            </div>
            <?php
        }
    } else {
        if (isset($_POST["cd"])) {
            if ($_POST["cd"] != $_SESSION["codigo"]) {
                $usuario = $usuarioDAO->buscarPorId($_POST["cd"]);
                $colecoes = $colecaoDAO->listarColUsu($usuario->getIdUsuario());
                ?>

                <h2 align="center">Coleções </h2>
                <div align="center">
                    <a class="example-image-link" href="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" data-lightbox="example-set" data-title="Foto">
                        <img class="media-object example-image" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" alt=""/></a>
                    <?php
                    $pais = $paisDAO->buscarPorId($usuario->getIdPais());
                    echo $usuario->getNome() . " , " . $pais->getNome() . "-" . $usuario->getEstado();
                    ?><br>
                    <h5 class="pull-left"><a href="menu.php?pagina=pesqUsuarios"><i class="aweso-hand-left"> </i>&nbsp;Ir para pesquisa de pessoas</a></h5><br>
                </div>
                <?php
            }
        } else {
            $colecoes = $colecaoDAO->listarColUsu($_SESSION["codigo"]);
            ?>
            <h2 align="center">Minhas Coleções </h2>

            <h5>Nova <a  href="menu.php?pagina=novColecao"><i class="aweso-plus"></i></a> </h5>

            <?php if ($usuarioDAO->buscaTipo($_SESSION["codigo"]) == 2) { ?>
                <h5>Sugerir Tipo <a  data-toggle="modal" href="#sgTipo"><i class="aweso-plus"></i></a> </h5>
            <?php } ?>
        <?php }
    } ?>
    <form name="form1" method="post" enctype="multipart/form-data" class="pull-right" action="menu.php?pagina=pesqColecoes">
        <label>Pesquisar: <input type="text" placeholder="nome" id="pesq" name="pesq" onkeypress="submitonEnter(event);"></label>
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

                <form name="frm" method="post" action="menu.php?pagina=itens">
                    <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>

                    <button class="btn-link" href="javascript: frm.submit();">
                        <div class="cycle-slideshow" id="fade"> 
                            <?php
                            $itensColecao = $itemColecaoDAO->listarItCol($colecao->getIdColecao());

                            $itemColecao = $itemColecaoDAO->buscarPorId($colecao->getIdFotoAlbum());
                            ?>
                            <img src="<?php echo ".." . $caminhoImagens . "" . $itemColecao->getImagem(); ?>"/>



                            <?php if (sizeof($itensColecao) == 0) {
                                ?>
                                <img src="<?php echo ".." . $caminhoImagens . "" . "noimg.png" ?>"/>
                            <?php } ?>

                        </div>
                    </button>
                </form>  


                <p>
                    <?php echo $colecao->getNome() ?><br><?php
                    echo utf8_encode($tipoColecaoDAO->buscarPorId($colecao->getIdTipoColecao())->getNome());
                    if (!isset($_POST["cd"])) {
                        if ($colecao->getIdUsuDono() == $_SESSION["codigo"]) {
                            ?>
                        <form class="span1" name="frmAlt" method="post" action="menu.php?pagina=altColecao">
                            <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                            <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                        </form>   

                        <form class="span1" name="frmExc" method="post" action="../control/colecaoExcluir.php" onsubmit="javascript: return confirm('Excluir colecao? Se houver itens nessa coleção, eles também serão excluídos.');">
                            <input type="hidden" id="cd" name="cd" value="<?php echo $colecao->getIdColecao() ?>"/>
                            <button type="submit" class="btn-link"><i class="aweso-trash aweso-large"></i></button>
                        </form>


                    <?php }
                } ?>
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
    ?>
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
        </form>>
    </div><!-- /sample modal #1 -->

</div>

