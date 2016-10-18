<?php
/* Altera status da mensagem*/

require_once '../class/MensagemDAO.php';

$mensagem = new Mensagem();
$mensagemDAO = new MensagemDAO();

$mensagem = $mensagemDAO->buscarPorId($_POST["cdM"]);


if ($mensagemDAO->salvar($mensagem)) {
    ?>

    <form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>
<?php }else{ ?>
<form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
        <input type="hidden" id="erro" name="erro" value="<?php echo '1' ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>
 <?php } ?>   
