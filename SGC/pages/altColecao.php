<?php
require_once '../class/ColecaoDAO.php';
require_once '../class/Colecao.php';

require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';
require_once '../control/caminhos.php';

$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tipos = array();
$tipos = $tipoColecaoDAO->listar();

if (isset($_POST['cd'])) {
    $colecaoDAO = new ColecaoDAO();
    $itemColecao = new Colecao();
    $itemColecao = $colecaoDAO->buscarPorId($_POST["cd"]);
}
?>
<!-- ALTERAR COLEÇÃO
================================================== --> 
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Coleção </h2>
             <h5 class="pull-left"><a href="menu.php?pagina=colecoes"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/colecaoSalvar.php" >
                 <input type="hidden" id="cd" name="cd" value="<?php echo $itemColecao->getIdColecao() ?>"/>
                 
                <div class="control-group">
                    <input type="text" class="input-xlarge form-horizontal" placeholder="Nome" id="nome" name="nome" value="<?php echo $itemColecao->getNome() ?>" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}"> 
                </div><!-- /control-group -->

                <div class="control-group">
                        <select class="input-xlarge" id="tipo" name="tipo" onblur="ValidaTipo();" onChange="" >
                            <optgroup label="">
                                <option value="0">Tipo de Coleção </option> 
                                <?php foreach ($tipos as $tipo) { ?>

                                    <option value="<?php echo $tipo->getIdTipoColecao() ?>" <?php if ($itemColecao->getIdTipoColecao() == $tipo->getIdTipoColecao()) { ?> selected <?php } ?>>
                                        <?php echo utf8_encode($tipo->getNome()) ?> 
                                    </option>   

                                <?php } ?> 
                            </optgroup>
                        </select>
                </div><!-- /control-group -->

                <div class="control-group">
                    <textarea  id="desc" placeholder="Descrição" name="desc" class="input-xlarge" rows="6" maxlength="300"><?php echo $itemColecao->getDescricao() ?></textarea>
                </div><!-- /control-group -->
                
                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>