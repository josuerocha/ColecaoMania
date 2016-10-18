<?php
require_once '../class/ItemColecaoDAO.php';
require_once '../class/ItemColecao.php';

require_once '../class/TipoColecaoDAO.php';
require_once '../class/TipoColecao.php';

require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';
require_once '../control/caminhos.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

require_once '../class/UsuarioSeguidoDAO.php';
require_once '../class/UsuarioSeguido.php';

$paisDAO = new PaisDAO();

$usuarioSeguido = new UsuarioSeguido();
$usuarioSeguidoDAO = new UsuarioSeguidoDAO();

$tipoColecaoDAO = new TipoColecaoDAO();
$tipoColecao = new TipoColecao();
$tipos = array();
$tipos = $tipoColecaoDAO->listar();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();
$itensColecao = array();

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuarios = array();
$cont=0;

if (isset($_POST["nome"]) && isset($_POST["filtro"])) {
    if ($_POST["filtro"] == 2) {
        $usuarios = $usuarioDAO->listarNomeUsu($_POST["nome"]);
        $cont=1;
    }
}
if (isset($_POST["cidade"]) && isset($_POST["filtro"])) {
    if ($_POST["filtro"] == 1) {
        $usuarios = $usuarioDAO->listarCidadeUsu($_POST["cidade"]);
        $cont=2;
    }
}

if (isset($_POST["tipo"]) && isset($_POST["filtro"])) {
    if ($_POST["filtro"] == 3) {
        $usuarios = $usuarioDAO->listarColecaoUsu($_POST["tipo"]);
        $cont=3;
    }
}
?>

<!-- PESQUISA DE ITENS DE OUTROS USUARIOS
================================================== -->
<div class="container">
    <h2 align="center">Pesquisar Pessoas </h2><br>
    <form method="post" enctype="multipart/form-data" name="form1" class="pull-right" action="menu.php?pagina=pesqUsuarios">
        <div class="span12 row">
            <div class="span3 control-group">
                
                    <select class="input-xlarge" id="filtro" name="filtro" onblur="ValidaFiltro();" onChange="javascript: form1.submit()"  >   
                        <optgroup label="">
                            <option value="0">Filtro</option>
                            <option value="1" <?php if (isset($_POST["filtro"]) && $_POST["filtro"] == 1) { ?>selected<?php } ?>>Cidade</option>
                            <option value="2" <?php if (isset($_POST["filtro"]) && $_POST["filtro"] == 2) { ?>selected<?php } ?>>Nome</option>
                            <option value="3" <?php if (isset($_POST["filtro"]) && $_POST["filtro"] == 3) { ?>selected<?php } ?>>Tipo de Coleção</option>
                        </optgroup>
                    </select> 
            </div>
            <?php
            if (isset($_POST["filtro"])) {
                if ($_POST["filtro"] == 3) {
                    ?>
                    <div class="span3 control-group">
                       
                            <select class="input-xlarge" id="tipo" name="tipo" onblur="ValidaTipo();" onChange="javascript: form1.submit()" required>
                                <optgroup label="">
                                    <option value="0">Selecione o Tipo de Coleção </option> 
                                    <?php foreach ($tipos as $tipo) { ?>
                                        <option value="<?php echo $tipo->getIdTipoColecao(); ?>" <?php if (isset($_POST["tipo"]) && $_POST["tipo"] == $tipo->getIdTipoColecao()) { ?>selected <?php } ?>>
                                            <?php echo utf8_encode($tipo->getNome()) ?> 
                                        </option>   
                                    <?php } ?> 
                                </optgroup>
                            </select>
                    </div>
                <?php } else { ?>
                    <div class="span3 control-group">
                        <?php if ($_POST["filtro"] == 2) { ?>
                           
                                <input type="text" id="nome" name="nome" placeholder="Pesquisar pelo Nome" value="<?php
                                if (isset($_POST["nome"])) {
                                    echo $_POST["nome"];
                                }
                                ?>" onkeypress="submitonEnter(event);">
                            <?php } if ($_POST["filtro"] == 1) { ?>
                            
                                <input type="text" id="cidade" name="cidade" placeholder="Pesquisar pela Cidade" value="<?php
                                if (isset($_POST["cidade"])) {
                                    echo $_POST["cidade"];
                                }
                                ?>" onkeypress="submitonEnter(event);">
                            <?php } ?>
                    </div> 
                    <?php
                }
            }
            ?>
        </div> 
    </form>
    <br>
    <?php if ((isset($_POST["tipo"]) || isset($_POST["nome"]) || isset($_POST["cidade"]))&& sizeof($usuarios)>0) { ?>
        <table  class="table  table-hover">
            <thead> 
                <tr> 
                    <th id="titulo" >Usuário</th> 
                    <th id="comando">Ver coleções/Entrar em contato</th>
                    <th id="comando">Seguir/Deixar de seguir</th>
                </tr> 
            </thead> 
            <tbody> 
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr> 

                        <td>
                            <a class="example-image-link" href="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" data-lightbox="example-set" data-title="Foto">
                                <img class="media-object example-image" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" alt=""/></a>
                            <?php echo $usuario->getNome() . " , " . $paisDAO->buscarPorId($usuario->getIdPais())->getNome() . "-" . $usuario->getEstado() ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>

                        <td>
                            <form class="span1" name="frmC" method="post" action="menu.php?pagina=colecoes">
                                <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                <button type="submit" class="btn-link"><i class="aweso-puzzle-piece aweso-large" /></i></button>
                            </form>  
                             <form class = "span1" name = "frmMsg" method = "post" action = "menu.php?pagina=entraremcontato">
                        <input type = "hidden" id = "cd" name = "cd" value = "<?php echo $usuario->getIdUsuario() ?>"/>
                        <button type = "submit" class = "btn-link"><i class = "aweso-comment aweso-large" /></i></button>
                    </form>
                         <!--   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                        </td>

                        <td>
                            <?php if (!$usuarioSeguidoDAO->verificaSeguidor($usuario->getIdUsuario())) { ?>
                                <form class="span1" name="frmC" method="post" action="../control/seguirSalvar.php">
                                    <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                    <a><button type="submit" class="btn-link"><i class="w-icon-paw" /></i></button></a>
                                </form> 
                            <?php } else { ?>
                                <form class="span1" name="frmC" method="post" action="../control/seguirExcluir.php">
                                    <input type="hidden" id="cd" name="cd" value="<?php echo $usuario->getIdUsuario() ?>"/>
                                    <a><button type="submit" class="btn-link"><i class="w-icon-stop" /></i></button></a>
                                </form>
                            <?php } ?>
                        </td>
                    </tr> 
                <?php } ?>
            </tbody> 
        </table>
    <?php }  if($cont>0 && sizeof($usuarios)==0){ ?> <h4 align="center">Nenhum usuário encontrado.</h4> <?php } ?>  
</div>