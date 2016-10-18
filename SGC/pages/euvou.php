<?php
require_once '../class/EventoDAO.php';
require_once '../class/Evento.php';

require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$paisDAO = new PaisDAO();
$pais = new Pais();
$paises = array();
$paises = $paisDAO->listar();

$evento = new Evento();
$eventoDAO = new EventoDAO();

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$eventos = array();
$eventos = $eventoDAO->listarEventosUsuPart();
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

                    <h2 align="center">Presenças Confirmadas </h2>
                    <h5><a href="menu.php?pagina=pesqEventos"><i class="aweso-hand-left"> </i>&nbsp;Ir para eventos</a></h5>
                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 
                                <th id="evento"> Evento</th> 
                                <th id="evento"> Local</th> 
                                <th id="data">Criador</th> 
                                <th id="data">Participar</th> 
                            </tr> 

                        </thead> 
                        <tbody> 
                            <?php foreach ($eventos as $evento) { ?>
                                <tr> 
                                    <td>
                                        <?php echo $evento->getNome() ?><br>
                                        <?php echo $data = implode("/", array_reverse(explode("-", $evento->getData()))); ?> às <?php echo $evento->getHora() ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>

                                    <td>
                                        <?php echo $paisDAO->buscarPorId($evento->getIdPais())->getNome() ?>, <?php echo $evento->getEstado() ?><br>
                                        <?php echo $evento->getCidade() ?>, <?php echo $evento->getBairro() ?><br>
                                        <?php echo $evento->getRua() ?>, <?php echo $evento->getNumero() ?><br>
                                        <?php echo $evento->getCEP() ?>
                                        <?php echo $evento->getComplemento() ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>

                                    <td>
                                       <?php
                                        $usuario = $usuarioDAO->buscarPorId($evento->getIdUsuCriador());
                                        if ($usuario->getStatus() == 1) {
                                            ?>
                                            <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>"/>
                                            <?php
                                            echo "<br><br><br>" . $usuario->getNome();
                                        } else {
                                            ?>
                                            <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . "noimg.png" ?>"/>
                                            <?php
                                            echo "<br><br><br>" . "Usuário Desativado";
                                        }
                                        ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>

                                    <td>
                                        <?php
                                        if ($evento->getNroParticipantes() == 1) {
                                            echo $evento->getNroParticipantes() . "&nbsp;pessoa&nbsp;confirmou&nbsp;presença" . "<br>";
                                        } else {
                                            echo $evento->getNroParticipantes() . "&nbsp;pessoas&nbsp;confirmaram&nbsp;presença" . "<br>";
                                        }
                                        ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;Você confirmou presença&nbsp;<br>
                                        <form class="span1" method="post" action="../control/presencaEventoExcluir.php">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $evento->getIdEvento() ?>"/>
                                            <a><button type="submit" class="btn-link">&nbsp;&nbsp;Remover&nbsp;presença&nbsp;<i class="aweso-group aweso-large"></i></button></a>
                                        </form>                                      
                                    </td> 
                                </tr> 
<?php } ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

