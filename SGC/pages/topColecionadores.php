<?php
require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';

require_once '../class/ItemColecaoDAO.php';
require_once '../class/ItemColecao.php';

require_once '../class/Top10.php';
require_once '../control/caminhos.php';

$top10 = new Top10();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();

$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tipos = array();
$tipos = $tipoColecaoDAO->listar();

$resultados = array();
?>

<div class="container">

    <h2 align="center">Top 10 </h2>
    <h6 align="center"><i>Escolha um tipo de coleção para visualizar o ranking. </i></h6>
    <form   method="post" enctype="multipart/form-data" name="form1" action="menu.php?pagina=topColecionadores">
        <div class="control-group">
           
                <select class="input-xlarge" id="tipo" name="tipo" onblur="ValidaTipo();" onChange="this.form.submit();" required>
                    <optgroup label="">
                        <option value="0">Selecione o Tipo de Coleção</option> 
                        <?php foreach ($tipos as $tipo) { ?>
                            <option value="<?php echo $tipo->getIdTipoColecao(); ?>" <?php if (isset($_POST["tipo"])) {
                            if ($_POST["tipo"] == $tipo->getIdTipoColecao()) { ?> selected <?php }
                        } ?> >
                            <?php echo utf8_encode($tipo->getNome()) ?> 
                            </option>   
<?php } ?> 
                    </optgroup>
                </select>
        </div>
    </form>

    <?php
    if (isset($_POST["tipo"])) {
        $resultados = $itemColecaoDAO->top10($_POST["tipo"]);
        ?>
        <table  class="table  table-hover" >
            <thead> 

                <tr> 
                    <th id="evento">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
                    <th id="evento">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
                    <th id="evento">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
                    <th id="evento">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 

                </tr> 

            </thead> 
            <tbody> 
                <?php
                $cont = 1;
                $cotl=0;
                foreach ($resultados as $top10) {
                    $cotl=1;
                    if ($top10->getQtdItens() > 0) {
                        ?>
                        <tr> 
                            <td>
                                <?php echo $cont."º lugar"; ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>    

                            <td>
                                <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $top10->getImagem() ?>"/>
                                <?php echo "<br><br><br>" . $top10->getNome(); ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>  

                            <td>
                                <?php if($top10->getQtdItens()==1){
                                echo $top10->getQtdItens()." item";}else{echo $top10->getQtdItens()." itens";} ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>  

                            <td>
                                <?php if($top10->getIdUsuario() != $_SESSION["codigo"]){ ?>
                                <form class="span1" name="frmC" method="post" action="menu.php?pagina=colecoes">
                                    <input type="hidden" id="top10" name="top10" value="<?php echo $top10->getIdUsuario() ?>"/>
                                     <input type="hidden" id="tipo" name="tipo" value="<?php echo $_POST["tipo"] ?>"/>
                                    <a><button type="submit" class="btn-link"><i class="aweso-puzzle-piece aweso-large" /></i></button></a>
                                </form>
                                
                                <form class = "span1" name = "frmMsg" method = "post" action = "menu.php?pagina=entraremcontato">
                                    <input type = "hidden" id = "cd" name = "cd" value = "<?php echo $top10->getIdUsuario() ?>"/>
                                    <a><button type = "submit" class = "btn-link"><i class = "aweso-comment aweso-large" /></i></button></a>
                                </form>
                                <?php }else{ ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="aweso-smile">&nbsp;Você</i>
                                <?php } ?>
                            </td>
                        </tr> 

        <?php }  
    $cont++; } if($cotl==0) { ?> <h4 align="center">Nenhum colecionador encontrado.</h4>
  <?php } } ?>
        </tbody> 
    </table>

</div>
