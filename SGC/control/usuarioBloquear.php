<?php

session_start();
require_once '../class/UsuarioBloqueadoDAO.php';

$usuarioBloqueado = new UsuarioBloqueado();
$usuarioBloqueadoDAO = new UsuarioBloqueadoDAO();

$usuarioBloqueado->setIdUsuario($_SESSION["codigo"]);
$usuarioBloqueado->setIdUsuBloqueado($_POST["cd"]);

if ($usuarioBloqueadoDAO->salvar($usuarioBloqueado)) 
{  ?>

    <form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>

<?php } else { ?>
    
     <form name="frmC" method="post" action="../pages/menu.php?pagina=entraremcontato">
        <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
        <input type="hidden" id="erro" name="erro" value="<?php echo '1' ?>"/>
    </form>
    <script type="text/javascript">
        document.frmC.submit();
    </script>
<?php
}
?>