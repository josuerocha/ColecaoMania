<?php
require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';


$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tiposColecao = array();
$tiposColecao = $tipoColecaoDAO->listar();
?>
<!-- MEUS EVENTOS
================================================== -->
<div class="container">


    <!-- row, content manager -->
    <div class="row-fluid" >

        <div class="widget-content">
            <div class="tab-content">
                <!-- posts -->
                <div class="tab-pane fade in active" id="posts">

                    <h2 align="center">Tipos de Coleção </h2>
                    <h5>Novo <a href="menu.php?pagina=novTipoColecao"><i class="aweso-plus"></i></a> </h5>

                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 

                                <th id="evento"> Tipo</th> 
                                <th id="data">Alterar/Excluir </th> 
                            </tr> 

                        </thead> 
                        <tbody> 
<?php foreach ($tiposColecao as $tipoColecao) { ?>
                                <tr> 
                                    <td>
    <?php echo utf8_encode($tipoColecao->getNome()) ?><br>

                                    </td>


                                    <td>
                                        <form class="span1" name="frmAlt" method="post" action="menu.php?pagina=novTipoColecao">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $tipoColecao->getIdTipoColecao() ?>"/>
                                            <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                                        </form>  

                                        <form class="span1" name="frmExc" method="post" action="../control/tipoColecaoExcluir.php" onsubmit="javascript: return confirm('Excluir tipo de coleção?');">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $tipoColecao->getIdTipoColecao() ?>"/>
                                            <button type="submit" class="btn-link"><i class="aweso-trash aweso-large"></i></button>
                                        </form>
                                    </td> 
                                </tr> 
<?php } ?>
                        </tbody> 
                    </table>
                </div><!-- /posts -->
            </div>
        </div>

    </div>
</div>

