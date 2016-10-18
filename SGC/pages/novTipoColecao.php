<?php

require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';
require_once '../class/SugestaoTipoDAO.php';

$tipoColecao = new TipoColecao();
$tipoColecaoDAO = new TipoColecaoDAO();

$sugestaoTipoDAO = new SugestaoTipoDAO();

?>
<!-- NOVO TIPO DE COLEÇÃO
================================================== -->
<div  class="container">

    <div class="row" >
        <div class="span12" style="text-align:center; margin: 0 auto;">
             <h2> Tipo de Coleção</h2>
             <h5 class="pull-left"><a href="menu.php?pagina=tiposDeColecao"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="../control/tipoColecaoSalvar.php"  >

            <input type="hidden" id="cd" name="cd" value="<?php if(isset($_POST["cd"])){ echo $_POST["cd"]; } ?>"/>
             
            <div class="control-group">
           
                <input type="text" class="input-xlarge form-horizontal" id="nome" name="nome" maxlength="50" value="<?php 
                                                                                                                        if(isset($_POST["cd"]))
                                                                                                                        {   
                                                                                                                            echo utf8_encode($tipoColecaoDAO->buscarPorId($_POST["cd"])->getNome());
                                                                                                                            
                                                                                                                        }
                                                                                                                        if(isset($_POST["cdS"]))
                                                                                                                        { 
                                                                                                                            echo utf8_encode($sugestaoTipoDAO->buscarPorId($_POST["cdS"])->getNome());
                                                                                                                                
                                                                                                                         } ?>" required />
                                                                                                                        
       
        </div>
        
        <div class="control-group">
            <label class="control-label" for="file-upload3"></label>
            <div class="controls">
               
                <button class="coll6 btn btn-primary">Salvar</button> 
            </div>  
        </div>
        </form>
        </div>
</div>
</div>


