<?php
require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';
require_once '../class/Conecta.php';
require_once '../class/ACrudDAO.php';

$paisDAO = new PaisDAO();
$pais = new Pais();
$paises = array();
$paises = $paisDAO->listar();
?>
<!-- ENDERECO ================================================== -->
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Endereço </h2><br>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/usuEndAlterar.php">

                <div class="control-group">
                    <input type="text" placeholder="CEP" class="input-medium form-horizontal" id="cep" name="cep" value="<?php echo $usuario->getCEP() ?>" maxlength="8" > 
                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="text" placeholder="Estado" class="input-mini form-horizontal" id="estado" name="estado" value="<?php echo $usuario->getEstado() ?>" maxlength="100">
                </div>
                <div class="control-group">
                    &nbsp;
                    <input type="text" placeholder="Cidade" class="input-xlarge form-horizontal" id="cidade" name="cidade" value="<?php echo $usuario->getCidade() ?>" maxlength="100">
                </div><div class="control-group">
                    &nbsp;
                    <input type="text" placeholder="Bairro" class="input-xlarge form-horizontal" id="bairro" name="bairro" value="<?php echo $usuario->getBairro() ?>" maxlength="100">
                </div><!-- /control-group -->


                <div class="control-group">
                    <input type="text" placeholder="Logradouro" class="input-xlarge form-horizontal" id="rua" name="rua" value="<?php echo $usuario->getRua() ?>" maxlength="150">
                </div><!-- /control-group -->

                <div class="control-group">
                    <input type="text" placeholder="Número" class="input-mini form-horizontal" id="num" name="num" value="<?php echo $usuario->getNumero() ?>" maxlength="4"> 
                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <input type="text" placeholder="Complemento" class="input-medium form-horizontal" id="comp" name="comp" value="<?php echo $usuario->getComplemento() ?>" maxlength="50">  
                </div><!-- /control-group -->

                <div class="control-group">
                    <select class="form-horizontal" id="pais" name="pais" onblur="ValidaPais()" onChange=""  >
                        <optgroup label="">

                            <?php foreach ($paises as $pais) { ?>

                                <option value="<?php echo $pais->getIdPais() ?>" <?php if ($pais->getIdPais() == $usuario->getIdPais()) { ?> selected <?php } ?>>
                                    <?php echo utf8_encode($pais->getNome()) ?> 
                                </option>   

                            <?php } ?> 
                        </optgroup>
                    </select>
                </div><!-- /control-group -->

                <div class="control-group">
                    <label class="control-label" for="file-upload3"></label>
                    <div class="controls">
                        
                        <button class="coll6 btn btn-primary">Salvar</button> 
                    </div>  
                </div><!-- /control-group -->

            </form>
        </div>
    </div>
</div>



