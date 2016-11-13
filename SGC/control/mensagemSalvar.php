<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

require_once '../class/MensagemDAO.php';
require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';
require_once '../control/caminhos.php';

if (!empty($_POST["chattext"])) {
    $mensagem = new Mensagem();
    $mensagemDAO = new MensagemDAO();

    $mensagem->setIdUsuEnvia($_SESSION["codigo"]);
    $mensagem->setIdUsuRecebe($_POST["idUsuRecebe"]);
    $mensagem->setData(date("Y-m-d"));
    $mensagem->setHora(date("H:i:s"));
    $mensagem->setTexto($_POST["chattext"]);

    if ($mensagemDAO->salvar($mensagem)) 
    {   
        $usuarioDAO = new UsuarioDAO();
        ?>



 <ol class="chats">
                            <?php
                            require_once '../class/MensagemDAO.php';
                            require_once '../class/Mensagem.php';

                            $mensagemDAO = new MensagemDAO();
                            $mensagem = new Mensagem();
                            $mensagens = array();
                            $mensagens = $mensagemDAO->listarConversa($_POST["idUsuRecebe"]);
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
        $_SESSION['mensagemModal'] = 'Usuário Desativado'; } ?> | <?php echo $mensagem->getHora() ?></time>
                                        </div>
                                </li>

                            <?php }  ?>
                        </ol><!-- /chat -->




        <?php
    } else {
        ?>

        <form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
            <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["idUsuRecebe"] ?>"/>
            <input type="hidden" id="erro" name="erro" value="<?php echo '1' ?>"/>
        </form>
        <script type="text/javascript">
            document.frmC.submit();
        </script>
        <?php
    }
} else {
    ?>
    <form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["idUsuRecebe"] ?>"/>
        <input type="hidden" id="end" name="end" value="<?php echo '1' ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>
    <?php
}
?>