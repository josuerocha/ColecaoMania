<?php
require_once '../class/IdiomaDAO.php';
require_once '../class/Idioma.php';


$idiomaDAO = new IdiomaDAO();
$idioma = new Idioma();
$idiomas = array();
$idiomas = $idiomaDAO->listar();
?>
<!-- MEUS IDIOMAS
================================================== -->
<div class="container">


    <!-- row, content manager -->
    <div class="row-fluid" >

        <div class="widget-content">
            <div class="tab-content">
                <!-- posts -->
                <div class="tab-pane fade in active" id="posts">

                    <h2 align="center">Idiomas </h2>
                    <h5>Novo <a href="menu.php?pagina=novIdioma"><i class="aweso-plus"></i></a> </h5>

                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 

                                <th id="evento"> Idioma</th> 
                                <th></th>
                                <th id="data">Alterar/Excluir </th> 
                            </tr> 

                        </thead> 
                        <tbody> 
<?php foreach ($idiomas as $idioma) { ?>
                                <tr> 
                                    <td>
    <?php echo $idioma->getNome() ?><br>

                                    </td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                                    <td>
                                        <form class="span1" name="frmNov" method="post" action="menu.php?pagina=novIdioma">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $idioma->getIdIdioma() ?>"/>
                                            <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                                        </form> 

                                        <form class="span1" name="frmExc" method="post" action="../control/idiomaExcluir.php" onsubmit="javascript: return confirm('Excluir idioma?');">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $idioma->getIdIdioma() ?>"/>
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

