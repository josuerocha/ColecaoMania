<?php
/* Altera status da notificação*/

require_once '../class/NotificacaoDAO.php';

$notificacao = new Notificacao();
$notificacaoDAO = new NotificacaoDAO();

$notificacao = $notificacaoDAO->buscarPorId($_POST["cdN"]);
$notificacaoDAO->salvar($notificacao);

if ($notificacao->getObs() == "adicionou um novo item") {
    ?>

    <form name="frmC" method="post" action="../pages/menu.php?pagina=colecoes">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>

<?php } else { ?>
    <form name="frmC" method="post" action="../pages/menu.php?pagina=minhaListaDesejos">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>
<?php } ?>

