<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

require_once '../class/MensagemDAO.php';
require_once '../class/UsuarioDAO.php';
$usuEnvia = new Usuario();

$usuarioDAO = new UsuarioDAO();

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$paisDAO = new PaisDAO();
$pais = new Pais();

//$usuRecebe = $usuarioDAO->buscarPorId($_POST["idUsuRecebe"]);
$usuEnvia = $usuarioDAO->buscarPorId($_SESSION["codigo"]);

if (!empty($usuEnvia->getCEP()) && !empty($usuEnvia->getNumero())) {
    $mensagem = new Mensagem();
    $mensagemDAO = new MensagemDAO();

    $mensagem->setIdUsuRecebe($_POST["idUsuRecebe"]);
    $mensagem->setIdUsuEnvia($_SESSION["codigo"]);
    $mensagem->setData(date("Y-m-d"));
    $mensagem->setHora(date("H:i:s"));
    $endereco = $paisDAO->buscarPorId($usuEnvia->getIdPais())->getNome().' , '.$usuEnvia->getEstado().'<br>'.$usuEnvia->getCidade().' , '.$usuEnvia->getBairro().'<br>'.$usuEnvia->getRua().' , '.$usuEnvia->getNumero().'<br>'.$usuEnvia->getCEP().' '.$usuEnvia->getComplemento();
    $mensagem->setTexto($endereco);

    if ($mensagemDAO->salvar($mensagem)) {
        ?>
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