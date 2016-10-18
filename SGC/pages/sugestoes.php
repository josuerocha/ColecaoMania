<?php
require_once '../class/SugestaoTipoDAO.php';
require_once '../class/SugestaoTipo.php';

require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';


$sugestaoTipoDAO = new SugestaoTipoDAO();
$sugestaoTipo = new SugestaoTipo();
$sugestaoTipos = array();
$sugestaoTipos = $sugestaoTipoDAO->listar();

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
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

                    <h2 align="center">Sugestões de Tipo de Coleção </h2>

                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 
                                <th>Usuário</th>
                                <th id="evento"> SugestaoTipo</th> 
                                <th id="data">Novo/Excluir </th> 
                            </tr> 

                        </thead> 
                        <tbody> 
                            <?php foreach ($sugestaoTipos as $sugestaoTipo) { ?>
                                <tr> 
                                    <td>
                                        <?php $usuario = $usuarioDAO->buscarPorId($sugestaoTipo->getIdUsuSg()); ?>
                                        <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>"/>
                                        <?php echo "<br><br><br>" . $usuario->getNome(); ?>   
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>

                                    <td>
                                        <?php echo $sugestaoTipo->getNome() ?><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>

                                    <td>
                                        <div class="row span12">
                                            <form class="span2" name="frmAlt" method="post" action="menu.php?pagina=novTipoColecao">
                                                <input type="hidden" id="cdS" name="cdS" value="<?php echo $sugestaoTipo->getIdSugestaoTipo() ?>"/>
                                                <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-plus" /></i></button></a>
                                            </form>  


                                            <form class="span1" name="frmExc" method="post" action="../control/sugestaoTipoExcluir.php" onsubmit="javascript: return confirm('Excluir Sugestao de Tipo?');">
                                                <input type="hidden" id="cd" name="cd" value="<?php echo $sugestaoTipo->getIdSugestaoTipo() ?>"/>
                                                <button type="submit" class="btn-link"><i class="aweso-trash aweso-large"></i></button>
                                            </form> 
                                        </div>
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

