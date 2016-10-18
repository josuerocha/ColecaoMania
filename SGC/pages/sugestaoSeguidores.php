<?php
require_once '../class/UsuarioSeguidoDAO.php';
require_once '../class/UsuarioSeguido.php';
require_once '../control/caminhos.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$paisDAO = new PaisDAO();
$pais = new Pais();

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuarioSeguido = new UsuarioSeguido();
$usuarioSeguidoDAO = new UsuarioSeguidoDAO();

$usuarios = array();
$usuarios = $usuarioDAO->listarSugestoes();
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

                    <h2 align="center">Sugestões</h2>
                    <h6 align="center"><i>Pessoas que residem na mesma cidade que você ou que colecionam o mesmo tipo de coleção. </i></h6>

                    <table id="datatables1" class="table  table-hover">
                        <thead> 
                            <tr> 
                                <th id="titulo" >Usuário</th> 
                                <th id="comando">Ver coleções</th>
                                <th id="comando">Seguir</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php
                            foreach ($usuarios as $usuario) {
                                  if (!$usuarioSeguidoDAO->verificaSeguidor($usuario->getIdUsuario())) { 
                                ?>
                                <tr> 
                                   
                                        <td><img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>"/>
                                            <?php echo "<br><br><br>" . $usuario->getNome() . " , " . $paisDAO->buscarPorId($usuario->getIdPais())->getNome() . "-" . $usuario->getEstado() ?>

                                        </td>

                                        <td>
                                            <form class="span1" name="frmC" method="post" action="menu.php?pagina=colecoes">
                                                <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                                <a><button type="submit" class="btn-link"><i class="aweso-puzzle-piece aweso-large" /></i></button></a>
                                            </form>  
                                        </td>

                                        <td>

                                            <form class="span1" name="frmC" method="post" action="../control/seguirSalvar.php">
                                                <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                                <a><button type="submit" class="btn-link"><i class="w-icon-paw" /></i></button></a>
                                            </form> 


                                        </td>
                                </tr> 
                            <?php } } ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

