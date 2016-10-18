<?php
require_once '../class/ColecaoDAO.php';
require_once '../class/Colecao.php';
require_once '../class/ItemColecaoDAO.php';
require_once '../class/ItemColecao.php';
require_once '../control/caminhos.php';

if (isset($_POST["cd"])) {
    $itemColecaoDAO = new ItemColecaoDAO();
    $itemColecao = new ItemColecao();
    $itensColecao = array();
    $itensColecao = $itemColecaoDAO->listarItCol($_POST["cd"]);
    $colecaoDAO = new ColecaoDAO();
    $itemColecao = new Colecao();
    $itemColecao = $colecaoDAO->buscarPorId($_POST["cd"]);
}
?>
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Item de Coleção </h2>
            
            <form  name="frm" method="post" action="menu.php?pagina=itens" >
                    <input type="hidden" name="cd" id="cd" value="<?php echo $_POST["cd"] ?>"/>
                    <a><button type="submit" class="btn-link pull-left"><i class="aweso-hand-left"></i>&nbsp;Voltar</button></a>
            </form>
            <br>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/itemSalvar.php">
                
                <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
                 
                <div class="control-group">
                    <label  for="file-upload3">Foto do Item</label>

                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                            <img src="" />
                        </div>

                        <div>
                            <span class="btn btn-info btn-file">
                                <span class="fileupload-new">Selecione</span>
                                <span class="fileupload-exists">Alterar</span>
                                <input id="arquivo" name="arquivo" type="file" />
                            </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <input type="text" placeholder="Nome" class="input-xlarge form-horizontal" id="nome" name="nome" value="" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}">    
                </div>
                
                <div class="row">
                    <div class="control-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Nº Série"  style="width: 90px;" class="input-mini form-horizontal" id="nro" name="nro" value="" maxlength="150" >  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Quantidade" style="width: 90px;"  class="input-mini form-horizontal" id="qtd" name="qtd" value="" maxlength="150" required pattern="^[0-9]+$">
                    </div>
                </div>
                
                <div class="control-group">

                    <select class="input-xlarge" id="interesse" name="interesse" onblur="ValidaInteresse();" onChange=""  >
                        <optgroup label="">
                            <option value="0">Interesse </option> 
                            <option value="1">Doar</option>
                            <option value="2">Exibir</option>
                            <option value="3">Trocar</option>
                            <option value="4">Vender</option>
                        </optgroup>
                    </select>

                </div>

                <div class="control-group">

                    <textarea  id="desc" name="desc" placeholder="Descrição" class="input-xlarge" rows="4" maxlength="300"></textarea>

                </div>

                <div class="control-group">
                    <div class="controls">
                      
                        <button class="btn btn-primary">Salvar</button>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</div>