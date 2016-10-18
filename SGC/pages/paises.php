<?php
require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';


$idiomaDAO = new PaisDAO();
$idioma = new Pais();
$paises = array();
$paises = $idiomaDAO->listar();


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

                    <h2 align="center">Países </h2>
                    <h5>Novo <a href="menu.php?pagina=novPais"><i class="aweso-plus"></i></a> </h5>

                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 

                                <th id="evento"> País</th> 
                                <th></th>
                                <th id="data">Alterar/Excluir </th> 
                            </tr> 

                        </thead> 
                        <tbody> 
                           <?php foreach ($paises as $idioma) { ?>
                                <tr> 
                                    <td>
                                        <?php echo utf8_encode($idioma->getNome())?><br>
                                       
                                    </td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    
                                    <td>
                                        
                                         <form class="span1" name="frmNov" method="post" action="menu.php?pagina=novPais">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $idioma->getIdPais()?>"/>
                                            <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                                        </form> 

                                        <form class="span1" name="frmExc" method="post" action="../control/paisExcluir.php" onsubmit="javascript: return confirm('Excluir país?');">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $idioma->getIdPais() ?>"/>
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

