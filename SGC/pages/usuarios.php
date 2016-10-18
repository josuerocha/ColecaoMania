<?php
require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';
require_once '../control/caminhos.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$paisDAO = new PaisDAO();

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuarios = array();
$usuarios = $usuarioDAO->listar();
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

                    <h2 align="center">Usuários Cadastrados </h2>


                    <table id="datatables1" class="table  table-hover">
                        <thead> 
                            <tr> 
                                <th id="titulo" >Usuário</th> 
                                <th id="tipo">Tipo</th> 
                                <th id="comando">Alterar</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php foreach ($usuarios as $usuario) { ?>
                                <tr> 

                                    <td><img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>"/>
                                        <?php echo "<br><br><br>" . $usuario->getNome() . " <br> " . $usuario->getEmail() ?>
                                        <?php echo "<br>Data de Nascimento: " . $data = implode("/", array_reverse(explode("-", $usuario->dataNasc))); ?> 
                                    </td>

                                    <td><?php
                                        if ($usuario->getTipo() == 1) {
                                            echo "Administrador";
                                        } else {
                                            echo "Usuário Comum";
                                        }
                                        ?></td> 
                                    <td> 
                                        <form class="span1" name="frmExc" method="post" action="../control/mudarTipo.php" onsubmit="javascript: return confirm('Mudar tipo de usuário?');">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                            <button type="submit" class="btn-link">
                                                <?php if ($usuario->getTipo() == 1) {
                                                    ?><i class="aweso-star aweso-eye-open aweso-2x"></i>
                                                    <?php
                                                } else {
                                                    if ($usuario->getTipo() == 2) {
                                                        ?>
                                                        <i class="aweso-star-empty aweso-eye-close aweso-2x"></i><?php
                                                    }
                                                }
                                                ?>
                                            </button>
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

