<?php
require_once '../class/NotificacaoDAO.php';
require_once '../class/Notificacao.php';

require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';

$notificacao = new Notificacao();
$notificacaoDAO = new NotificacaoDAO();

$notificacoes = array();
$notificacoes = $notificacaoDAO->listarTodas();

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

                    <h2 align="center">Minhas Notificações </h2>


                    <table id="datatables1" class="table  table-hover" >
                        <thead> 

                            <tr> 
                                <th id="evento"> </th> 
                                <th id="evento"> </th> 
                            </tr> 

                        </thead> 
                        <tbody> 
                            <?php foreach ($notificacoes as $notificacao) { ?>
                                <tr> 
                                    <td>
                                        <?php
                                         $usuario = $usuarioDAO->buscarPorId($notificacao->getIdUsuario());
                                        if ($usuario->getStatus() == 1) {                                          
                                            echo $usuario->getNome() . " " . $notificacao->getObs();
                                        } else {
                                            echo "Usuário Desativado" . " " . $notificacao->getObs();
                                        }
                                        ?><br>
                                    </td>    

                                    <td>
                                        <?php
                                        if ($usuario->getStatus() == 1) {
                                            if ($notificacao->getObs() == "adicionou um novo item") {
                                                ?>
                                                <form name="frmC" method="post" action="menu.php?pagina=colecoes">
                                                    <input type="hidden" id="cd" name="cd" value="<?php echo $notificacao->getIdUsuario() ?>"/>
                                                    <a><button type="submit" class="btn-link">Ver&nbsp;<i class="aweso-puzzle-piece aweso-large" /></i></button></a>
                                                </form>
                                                <?php } else { ?>

                                                <form name="frmC" method="post" action="menu.php?pagina=minhaListaDesejos">
                                                    <input type="hidden" id="cd" name="cd" value="<?php echo $notificacao->getIdUsuario() ?>"/>
                                                    <a><button type="submit" class="btn-link">Ver&nbsp;<i class="aweso-heart aweso-large" /></i></button></a>
                                                </form>
                                            <?php
                                            }
                                        } else {
                                            echo "Usuário Desativado";
                                        }
                                        ?>
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

