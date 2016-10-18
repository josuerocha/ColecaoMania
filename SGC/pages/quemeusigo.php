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

$usuariosSeguidos = array();
$usuariosSeguidos = $usuarioSeguidoDAO->listar();
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

                    <h2 align="center">Pessoas que eu sigo </h2>


                    <table id="datatables1" class="table  table-hover">
                        <thead> 
                            <tr> 
                                <th id="titulo" >Usuário</th> 
                                <th id="comando">Ver coleções/Entrar em contato</th>
                                <th id="comando">Deixar de seguir</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php
                            foreach ($usuariosSeguidos as $usuarioSeguido) {
                                $usuario = $usuarioDAO->buscarPorId($usuarioSeguido->getIdUsuSeguido());
                                ?>
                                <tr> 

                                    <td>
                                        <?php if($usuario->getStatus() == 1){ ?>
                                        <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>"/>
                                        <?php echo "<br><br><br>" . $usuario->getNome() . " , " . $paisDAO->buscarPorId($usuario->getIdPais())->getNome() . "-" . $usuario->getEstado(); }else{ ?>
                                        <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . "noimg.png" ?>"/>
                                        <?php echo "<br><br><br>" . "Usuário Desativado" . " , " . $paisDAO->buscarPorId($usuario->getIdPais())->getNome() . "-" . $usuario->getEstado(); } ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>

                                    <td>
                                         <?php if($usuario->getStatus() == 1){ ?>
                                        <form class="span1" name="frmC" method="post" action="menu.php?pagina=colecoes">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                            <a><button type="submit" class="btn-link"><i class="aweso-puzzle-piece aweso-large" /></i></button></a>
                                        </form>
                                        
                                        <form class = "span1" name = "frmMsg" method = "post" action = "menu.php?pagina=entraremcontato">
                                            <input type = "hidden" id = "cd" name = "cd" value = "<?php echo $usuario->getIdUsuario() ?>"/>
                                            <a><button type = "submit" class = "btn-link"><i class = "aweso-comment aweso-large" /></i></button></a>
                                        </form>
                                         <?php }else{ ?>
                                         <form class="span1" name="frmC" method="post" action="#">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                            <a><button type="submit" class="btn-link"><i class="aweso-puzzle-piece aweso-large" /></i></button></a>
                                        </form>
                                        
                                        <form class = "span1" name = "frmMsg" method = "post" action = "#">
                                            <input type = "hidden" id = "cd" name = "cd" value = "<?php echo $usuario->getIdUsuario() ?>"/>
                                           <a> <button type = "submit" class = "btn-link"><i class = "aweso-comment aweso-large" /></i></button></a>
                                        </form>
                                         <?php } ?>
                                    </td>

                                    <td>
                                         <?php if($usuario->getStatus() == 1){ ?>
                                        <form class="span1" name="frmC" method="post" action="../control/seguirExcluir.php">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                            <a><button type="submit" class="btn-link"><i class="w-icon-stop" /></i></button></a>
                                        </form> 
                                         <?php }else{ ?>
                                        <form class="span1" name="frmC" method="post" action="#">
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                            <a><button type="submit" class="btn-link"><i class="w-icon-stop" /></i></button></a>
                                        </form>
                                         <?php } ?>
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

