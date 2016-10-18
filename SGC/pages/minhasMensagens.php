<?php
require_once '../class/MensagemDAO.php';
require_once '../class/Mensagem.php';
require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';
require_once '../control/caminhos.php';

$mensagemDAO = new MensagemDAO();
$mensagem = new Mensagem();

$usuEnvia = new Usuario();
$usuRecebe = new Usuario();
$usuarioDAO = new UsuarioDAO();

$mensagens = array();
$mensagens = $mensagemDAO->buscarUltimas();

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

                    <h2 align="center">Caixa de Entrada </h2>

                    <table id="datatables1" class="table  table-hover">
                        <thead> 
                            <tr> 
                                <th id="titulo" ></th> 
                                 <th id="titulo" ></th> 
                                <th id="tipo"></th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php foreach ($mensagens as $mensagem) {
                                $usuEnvia = $usuarioDAO->buscarPorId($mensagem->getIdUsuEnvia());
                                $usuRecebe = $usuarioDAO->buscarPorId($mensagem->getIdUsuRecebe());
                                ?>                            
                                <tr> 
                                    <td>
                                       <?php if($usuEnvia->getStatus()==1){ ?>
                                        <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuEnvia->getImagem() ?>"/>
                                       <?php echo "<br><br><br>" . $usuEnvia->getNome(); }
                                       else{
                                       ?>
                                         <img class="media-object pull-left" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . "noimg.png" ?>"/>
                                       <?php echo "<br><br><br>" . "Usuário Desativado";
                                       } ?>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    </td>

                                    <td><?php
                                        $data = implode("/", array_reverse(explode("-", $mensagem->getData())));
                                       
                                        ?>
                                     <form class="span10" name="frmExc" method="post" action="menu.php?pagina=entraremcontato" >
                                            <input type="hidden" id="cd" name="cd" value="<?php echo $mensagem->getIdUsuEnvia() ?>"/>
                                            <button type="submit" class="btn-link">
                                                <?php  echo $mensagem->getTexto() ?>
                                            </button>
                                        </form>
                                    </td> 
                                    <td>                                        
                                        <?php  echo $data.'|'.$mensagem->getHora(); ?>                                      
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

