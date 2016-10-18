<?php

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$pais = new Pais();
$paisDAO = new PaisDAO();

?>
<!-- QUICK POST
================================================== -->
<!-- widget quick post -->
<div  class="container">
   
    <!-- widget, content manager -->

    <div class="row" >
        <div class="span12" style="text-align:center; margin: 0 auto;">
             <h2> País </h2>
               <h5 class="pull-left"><a href="menu.php?pagina=paises"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" 
              action="../control/paisSalvar.php"  >

        <div class="control-group">
            <input type="hidden" id="cd" name="cd" value="<?php if(isset($_POST["cd"])){ echo $_POST["cd"]; } ?>"/>
            <input type="text" class="input-xlarge form-horizontal" id="nome" name="nome" maxlength="50" value="<?php if(isset($_POST["cd"])){ echo $paisDAO->buscarPorId($_POST["cd"])->getNome();}?>" required />
        </div><!-- /control-group -->
        
        <div class="control-group">
            <label class="control-label" for="file-upload3"></label>
            <div class="controls">
                 
                <button class="coll6 btn btn-primary">Salvar</button> 
            </div>  
        </div><!-- /control-group -->
        </form>
        </div>
</div><!-- /row -->
</div><!-- /container -->


