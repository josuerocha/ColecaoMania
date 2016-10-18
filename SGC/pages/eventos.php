<?php
require_once '../class/EventoDAO.php';
require_once '../class/Evento.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$paisDAO = new PaisDAO();
$pais = new Pais();
$paises = array();
$paises = $paisDAO->listar();

$evento = new Evento();
$eventoDAO = new EventoDAO();

$eventos = array();
$eventos = $eventoDAO->listarEventosUsu($_SESSION["codigo"]);
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

                    <h2 align="center">Meus Eventos </h2>
                    <h5>Novo <a href="menu.php?pagina=novEvento"><i class="aweso-plus"></i></a> </h5>

                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 

                                <th id="evento"> Evento</th> 
                                <th id="evento"> Local</th> 
                                <th id="data">Alterar/Excluir </th> 
                            </tr> 

                        </thead> 
                        <tbody> 
                            <?php foreach ($eventos as $evento) { ?>
                                <tr> 
                                    <td>
                                        <?php echo $evento->getNome() ?><br>
                                        <?php echo $data = implode("/", array_reverse(explode("-", $evento->getData()))); ?> às <?php echo $evento->getHora() ?>
                                    </td>

                                    <td>
                                        <?php echo $paisDAO->buscarPorId($evento->getIdPais())->getNome() ?>, <?php echo $evento->getEstado() ?><br>
                                        <?php echo $evento->getCidade() ?>, <?php echo $evento->getBairro() ?><br>
                                        <?php echo $evento->getRua() ?>, <?php echo $evento->getNumero() ?><br>
                                        <?php echo $evento->getCEP() ?>
                                        <?php echo $evento->getComplemento() ?>

                                    </td>

                                    <td>

                                        <form class="span1" name="frmAlt" method="post" action="menu.php?pagina=altEvento">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $evento->getIdEvento() ?>"/>
                                            <a><button type="submit" class="btn-link" ><i class="aweso-edit aweso-large" /></i></button></a>
                                        </form>   

                                        <form class="span1" name="frmExc" method="post" action="../control/eventoExcluir.php" onsubmit="javascript: return confirm('Excluir evento?');">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $evento->getIdEvento() ?>"/>
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

