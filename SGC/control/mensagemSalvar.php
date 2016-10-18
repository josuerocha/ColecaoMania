<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

require_once '../class/MensagemDAO.php';

if (!empty($_POST["chat-text"])) {
    $mensagem = new Mensagem();
    $mensagemDAO = new MensagemDAO();

    $mensagem->setIdUsuEnvia($_SESSION["codigo"]);
    $mensagem->setIdUsuRecebe($_POST["idUsuRecebe"]);
    $mensagem->setData(date("Y-m-d"));
    $mensagem->setHora(date("H:i:s"));
    $mensagem->setTexto($_POST["chat-text"]);

    if ($mensagemDAO->salvar($mensagem)) 
    {?>
   <form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
            <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["idUsuRecebe"] ?>"/>
        </form>
        <script type="text/javascript">
            document.frmC.submit();
        </script> 

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