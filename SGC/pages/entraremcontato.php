<?php
require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';
require_once '../control/caminhos.php';
require_once '../class/UsuarioBloqueadoDAO.php';
require_once '../class/UsuarioBloqueado.php';

$usuBloqDAO = new UsuarioBloqueadoDAO();
$usuBloq = new UsuarioBloqueado();
$usuRecebe = new Usuario();
$usuEnvia = new Usuario();
$usuarioDAO = new UsuarioDAO();

if (isset($_POST["cd"])) {
    $usuRecebe = $usuarioDAO->buscarPorId($_POST["cd"]);
} /* else {
  $usuRecebe = $usuarioDAO->buscarPorId($_GET ["cd"]);
  } */

if (isset($_POST["end"])) {
    echo "<script>alert('Complete seu endereço!');</script>";
}

if (isset($_POST["erro"])) {
    echo "<script>alert('Erro ao salvar.');</script>";
}

$usuEnvia = $usuarioDAO->buscarPorId($_SESSION["codigo"]);


?>


<div class="container">

    <div class="row">
         <?php if ($usuRecebe->getStatus() == 1) { ?>
            <div class="span1">
                <h2>
                   <?php echo $usuRecebe->getNome();  ?>
                </h2> 
            </div>
        <?php }else { ?>

        <div class="span1">
            <h2>
            <?php echo 'Usuário Desativado';  ?>
            </h2>
        </div>
        <?php } ?>
        <div class="span4">
            <?php 
            if($usuRecebe->getStatus()==1){
            if (!$usuBloqDAO->verifSeuBloqueio($usuRecebe->getIdUsuario())) { ?> 
            <form  name="frmBloq" method="post" action="../control/usuarioBloquear.php" onsubmit="javascript: return confirm('Bloquear?');">
                    <input type="hidden" name="cd" id="cd" value="<?php echo $usuRecebe->getIdUsuario() ?>"/>
                    <button type="submit" class="btn-link"><i class="aweso-lock"></i>&nbsp;Bloquear</button>
                </form>
            <?php } else { ?>
            <form  name="frmBloq" method="post" action="../control/usuarioDesbloquear.php" onsubmit="javascript: return confirm('Desbloquear?');">
                    <input type="hidden" name="cd" id="cd" value="<?php echo $usuRecebe->getIdUsuario() ?>"/>
                    <button type="submit" class="btn-link"><i class="aweso-unlock"></i>&nbsp;Desbloquear</button>
                </form>
            <?php } if (!$usuBloqDAO->verifBloqueio($usuRecebe->getIdUsuario())) { ?>
            <form  name="frmEnd" method="post" action="../control/enviarEndereco.php" onsubmit="javascript: return confirm('Enviar endereço?');">
                <input type="hidden" name="idUsuRecebe" id="idUsuRecebe" value="<?php echo $usuRecebe->getIdUsuario() ?>"/>
                <button type="submit" class="btn-link"><i class="aweso-trash aweso-home"></i>&nbsp;Enviar meu endereço</button>
            </form>
            <?php }} ?>
        </div>
    </div>
    <hr>
  
        <!--Inicio respostas-->
        <div class="widget border-cyan" id="widget-chat">
            <div id="stats-chart" class="widget-content">
                <!-- chat container, use mscrollbar -->
                <div id="chat" class="chat-container" data-scrollbar="mscroll" data-theme="dark-thick" data-button="true" style="height: 420px;max-height: 420px;">
                    <!-- chat module -->
                    <div id="lugar" class="chat-module">
                        <!-- chat -->
                        <ol class="chats">
                            <?php
                            require_once '../class/MensagemDAO.php';
                            require_once '../class/Mensagem.php';

                            $mensagemDAO = new MensagemDAO();
                            $mensagem = new Mensagem();
                            $mensagens = array();
                            $mensagens = $mensagemDAO->listarConversa($usuRecebe->getIdUsuario());
                            $mensagens = array_reverse($mensagens);
                            $usuEnviaMsg = new Usuario();
                            
                            foreach ($mensagens as $mensagem) {
                                $usuEnviaMsg = $usuarioDAO->buscarPorId($mensagem->getIdUsuEnvia())
                                ?>
                                <li class="other">
                                    <div class="avatar">
                                        <?php if($usuEnviaMsg->getStatus() == 1){ ?>
                                        <img src="<?php echo "../" . $caminhoImagens . "" . $usuEnviaMsg->getImagem() ?>" alt="" title="<?php echo $usuEnviaMsg->getNome(); ?>" />
                                        <?php } else{ ?>
                                        <img src="<?php echo "../" . $caminhoImagens . "" . "noimg.png" ?>" alt="" title="<?php echo "Usuário Desativado"; ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="messages">
                                        <div class="message-box">
                                            <p><?php echo $mensagem->getTexto(); ?></p>
                                            <time datetime="<?php echo $data = implode("/", array_reverse(explode("-
                                            </div>", $mensagem->getData()))); ?>">
                                                
                                                <?php 
                                                if($usuEnviaMsg->getStatus()==1){
                                                echo $usuEnviaMsg->getNome();}else{
        echo 'Usuário Desativado';} ?> | <?php echo $mensagem->getHora() ?></time>
                                        </div>
                                </li>

                            <?php }  ?>
                        </ol><!-- /chat -->
                    </div><!-- /chat module -->
                </div><!-- /chat container -->
                <!--Fim respostas-->
                
                <?php if(sizeof($mensagens)==0){ ?>
                <div class="chat-action bg-silver">
                        <form  id="form-chat" method="post" enctype="multipart/form-data" action="../control/mensagemSalvar.php">
                            <div class="input-append input-append-inline" style="width: 100%">
                                <input type="hidden" name="idUsuRecebe" id="idUsuRecebe" value="<?php echo $usuRecebe->getIdUsuario() ?>"/>
                                <input type="hidden" name="hora" id="hora" value="<?php echo date("H:i:s"); ?>"/>
                                <input type="hidden" name="foto" id="foto" value="<?php echo "../" . $caminhoImagens . "" . $usuEnviaMsg->getImagem() ?>"/>
                                <input type="hidden" name="nome" id="nome" value="<?php echo $usuEnviaMsg->getNome(); ?>"/>
                                <input class="input-block-level" name="chattext" id="chat-text" type="text" autocomplete="off" onkeypress="submitonEnter(event);" /> 
                                <button class="btn bg-cyan" type="submit"><i class="aweso-comment-alt"></i></button>
                            </div>
                        </form>
                    </div>
                
                <?php } ?>

                <?php
                if (!$usuBloqDAO->verifBloqueio($usuRecebe->getIdUsuario())) {
                    if($usuEnviaMsg->getStatus()==1){
                    ?>
                    <!-- QUICK POST
                    ================================================== -->
                    <!-- widget quick post -->
                    <div class="chat-action bg-silver">
                        <form  id="form-chat" method="post" enctype="multipart/form-data" action="../control/mensagemSalvar.php">
                            <div class="input-append input-append-inline" style="width: 100%">
                                <input type="hidden" name="idUsuRecebe" id="idUsuRecebe" value="<?php echo $usuRecebe->getIdUsuario() ?>"/>
                                <input type="hidden" name="hora" id="hora" value="<?php echo date("H:i:s"); ?>"/>
                                <input type="hidden" name="foto" id="foto" value="<?php echo "../" . $caminhoImagens . "" . $usuEnviaMsg->getImagem() ?>"/>
                                <input type="hidden" name="nome" id="nome" value="<?php echo $usuEnviaMsg->getNome(); ?>"/>
                                <input class="input-block-level" name="chattext" id="chat-text" type="text" autocomplete="off" onkeypress="submitonEnter(event);" /> 
                                <button class="btn bg-cyan" type="submit"><i class="aweso-comment-alt"></i></button>
                            </div>
                        </form>
                    </div>
                    <?php
                    }} else {
                    echo "<h3>Você foi bloqueado!</h3>";
                }
                ?>
                    
            </div>
        </div>
 
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                        <script src="componentes/js/entraremcontato.js"></script>