<?php
require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';
require_once '../control/caminhos.php';

$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tipos = array();
$tipos = $tipoColecaoDAO->listar();
?> 
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Coleção </h2>
             <h5 class="pull-left"><a href="menu.php?pagina=colecoes"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/colecaoSalvar.php">
                <div class="control-group">
                    <input type="text" placeholder="Nome" class="input-xlarge form-horizontal" id="nome" name="nome" value="" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}"> 
                </div>
                <div class="control-group">
                    <select class="input-xlarge" id="tipo" name="tipo" onblur="ValidaTipo();" onChange="" required>
                        <optgroup label="">
                            <option value="0">Tipo de Coleção </option> 
                            <?php foreach ($tipos as $tipo) { ?>

                                <option value="<?php echo $tipo->getIdTipoColecao() ?>">
                                    <?php echo utf8_encode($tipo->getNome()) ?> 
                                </option>   

                            <?php } ?> 
                        </optgroup>
                    </select>
                </div>
                <div class="control-group">   
                    <textarea  id="desc" placeholder="Descrição" name="desc" class="input-xlarge" rows="4" maxlength="300"></textarea>  
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-primary">Salvar</button>
                    </div>  
                </div>
            </form>
        </div></div></div>