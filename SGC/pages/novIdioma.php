<?php
require_once '../class/IdiomaDAO.php';
require_once '../class/Idioma.php';

$idioma = new Idioma();
$idiomaDAO = new IdiomaDAO();
?>
<!-- NOVO/ALTERAR IDIOMA
================================================== -->
<div  class="container">
    <div class="row" >
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Idioma </h2>
              <h5 class="pull-left"><a href="menu.php?pagina=idiomas"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" 
                  action="../control/idiomaSalvar.php" >
                
                <input type="hidden" id="cd" name="cd" value="<?php if (isset($_POST["cd"])) {echo $_POST["cd"];} ?> "/>
                
                <div class="control-group">
                    <input type="text" class="input-xlarge form-horizontal" id="nome" name="nome" maxlength="50" value="<?php if (isset($_POST["cd"])) {
    echo $idiomaDAO->buscarPorId($_POST["cd"])->getNome();
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


