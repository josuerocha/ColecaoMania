<?php
require_once '../class/ListaDesejosDAO.php';
require_once '../class/ListaDesejos.php';

require_once '../class/ItemColecaoDAO.php';
require_once '../class/ItemColecao.php';
require_once '../control/caminhos.php';

require_once '../class/ItemListaDesejosDAO.php';
require_once '../class/ItemListaDesejos.php';

require_once '../class/UsuarioDAO.php';
require_once '../class/Usuario.php';

require_once '../class/ColecaoDAO.php';
require_once '../class/Colecao.php';

require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$pais = new Pais();
$paisDAO = new PaisDAO();

$itemColecaoDAO = new ItemColecaoDAO();
$itemColecao = new ItemColecao();

$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();

$colecaoDAO = new ColecaoDAO();
$colecao = new Colecao();

$itemListaDesejos = new ItemListaDesejos();
$itemListaDesejosDAO = new ItemListaDesejosDAO();
$itensLista = array();

$listaDesejos = new ListaDesejos();
$listaDesejosDAO = new ListaDesejosDAO();

if (isset($_POST["cd"])) {
    $listaDesejos = $listaDesejosDAO->buscarPorId($_POST["cd"]);
} else {
    $listaDesejos = $listaDesejosDAO->buscarPorId($_SESSION["codigo"]);
}

if (isset($_POST["pesq"])) {
    $itensLista = $itemListaDesejosDAO->listarItensNome($listaDesejos->getIdListaDesejos(), $_POST["pesq"]); //FAZER METODO QUE RETORNA PESQUISA POR NOME
} else {
    $itensLista = $itemListaDesejosDAO->listarItensLista($listaDesejos->getIdListaDesejos());
}
?>
<!-- MINHA LISTA DE DESEJOS
================================================== -->
<div class="container">
    <?php
    if (isset($_POST["cd"])) {
        $usuario = $usuarioDAO->buscarPorId($listaDesejos->getIdUsuDono());
        ?>
        <h2 align="center">Lista de Desejos </h2><br>
        <div align="center">
            <a class="example-image-link" href="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" data-lightbox="example-set" data-title="Foto">
                <img class="media-object example-image" style="width: 60px; height: 50px;" src="<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?>" alt=""/></a>
            <?php
            $pais = $paisDAO->buscarPorId($usuario->getIdPais());
            echo $usuario->getNome() . " , " . $pais->getNome() . "-" . $usuario->getEstado();
            ?><br></div>
        <form name="form1" method="post" enctype="multipart/form-data" class="pull-right" action="#">
            <input type="hidden" id="cd" name="cd" value="<?php echo $listaDesejos->getIdUsuDono() ?>"/>
            <a><button type="submit" class="btn-link" >Entrar em contato&nbsp;<i class="aweso-comment aweso-large" /></i></button></a>
        </form><br>

    <?php } else { ?> <h2 align="center">Minha Lista de Desejos </h2><br>
    <?php } if (isset($_POST["pesq"])) { ?>
        <h5><a href="menu.php?pagina=minhaListaDesejos"><i class="aweso-hand-left"> </i>&nbsp;Voltar</a></h5>
    <?php } else { ?>
        <h5><a href="menu.php?pagina=pesqOutrosItens"><i class="aweso-hand-left"> </i>&nbsp;Ir para pesquisa de itens</a></h5>
        <?php } ?>
    <form name="form1" method="post" enctype="multipart/form-data" class="pull-right" action="menu.php?pagina=minhaListaDesejos">
        <?php if ($listaDesejos->getIdUsuDono() != $_SESSION["codigo"]) { ?>
            <input type="hidden" id="cd" name="cd" value="<?php echo $listaDesejos->getIdUsuDono() ?>"/>
<?php } ?>
        <label>Pesquisar: <input type="text" placeholder="nome" id="pesq" name="pesq" onkeypress="submitonEnter(event);"></label>
    </form>
    <br><br><br>
    <?php
    $cont = 1;
    $totalPercorrido = 0;

    foreach ($itensLista as $itemListaDesejos) {

        $itemColecao = $itemColecaoDAO->buscarPorId($itemListaDesejos->getIdItemColecao());
        $colecao = $colecaoDAO->buscarPorId($itemColecao->getIdColecao());
        $usuario = $usuarioDAO->buscarPorId($colecao->getIdUsuDono());

        if ($cont == 1) {
            ?>
            <div class="span12 row-fluid"><?php } ?>
            <div class="span4">
                <a href="#"><!-- jquery abrir -->
                    <div  id="fade"> 
                        <a class="example-image-link" href="<?php echo ".." . $caminhoImagens . "" . $itemColecao->getImagem() ?>" data-lightbox="example-set" data-title="Clique a direita para avançar.">
                            <img class="example-image" src="<?php echo ".." . $caminhoImagens . "" . $itemColecao->getImagem() ?>" alt=""/></a>
                    </div>
                </a>
                <p>
                    <?php echo $itemColecao->getNome() ?>&nbsp&nbsp&nbsp<?php echo "Quantidade: " . $itemColecao->getQuantidade() ?><br>
                    <?php echo "Nº série: " . $itemColecao->getNroSerie() ?>
                    &nbsp&nbsp&nbsp
                    <?php
                    if ($itemColecao->getInteresse() == 1) {
                        echo 'Interesse: Doar';
                    }
                    if ($itemColecao->getInteresse() == 2) {
                        echo 'Interesse: Exibir';
                    }
                    if ($itemColecao->getInteresse() == 3) {
                        echo 'Interesse: Trocar';
                    }
                    if ($itemColecao->getInteresse() == 4) {
                        echo 'Interesse: Vender';
                    }
                    ?><br>
                    <?php 
                    if($usuario->getStatus()==1){
                        if($itemColecao->getStatus()==1)
                        {
                             echo "Descrição: " . $itemColecao->getDescricao() . "<br>" . "Proprietário: " . $usuario->getNome(); 
                        }
                        if($itemColecao->getStatus()==0)
                        {
                             echo "Descrição: " . $itemColecao->getDescricao() . "<br>" . "Proprietário: " . "Não Possui";
                        }
                   
                    }else
                    {
                         if($itemColecao->getStatus()==1)
                        {
                              echo "Descrição: " . $itemColecao->getDescricao() . "<br>" . "Proprietário: " . "Usuário Desativado";  
                        }
                        if($itemColecao->getStatus()==0)
                        {
                              echo "Descrição: " . $itemColecao->getDescricao() . "<br>" . "Proprietário: " . "Não Possui"; 
                        }
                        
                    }
                    
                    ?>                      
    <?php if ($listaDesejos->getIdUsuDono() == $_SESSION["codigo"]) { ?>
                    <form class="span1" name="frmExc" method="post" action="../control/listaDesejosExcluir.php" onsubmit="javascript: return confirm('Excluir item?');">
                        <input type="hidden" id="cdI" name="cdI" value="<?php echo $itemColecao->getIdItemColecao() ?>"/>
                        <input type="hidden" id="cd" name="cd" value="<?php echo $listaDesejos->getIdListaDesejos() ?>"/>
                        <button type="submit" class="btn-link"><i class="aweso-trash aweso-large"></i></button>
                    </form>
                    <?php } if($usuario->getStatus()==1 && $itemColecao->getStatus()==1){
                ?>
                <form class = "span1" name = "frmC" method = "post" action = "menu.php?pagina=itens">
                    <input type = "hidden" id = "cd" name = "cd" value = "<?php echo $colecao->getIdColecao() ?>"/>
                    <input type = "hidden" id = "cdI" name = "cdI" value = "<?php echo $itemColecao->getIdItemColecao() ?>"/>
                    <a><button type = "submit" class = "btn-link"><i class = "aweso-puzzle-piece aweso-large" /></i></button></a>
                </form>
    <?php  if ($listaDesejos->getIdUsuDono() == $_SESSION["codigo"]) { ?>
                    <form class = "span1" name = "frmMsg" method = "post" action = "menu.php?pagina=entraremcontato">
                        <input type = "hidden" id = "cd" name = "cd" value = "<?php echo $usuario->getIdUsuario() ?>"/>
                        <a><button type = "submit" class = "btn-link"><i class = "aweso-comment aweso-large" /></i></button></a>
                    </form>
                    <?php }}
                ?>
                </p>
            </div>
            <?php
            $cont++;
            $totalPercorrido++;
            ?>
            <?php if ($cont == 4 || $totalPercorrido == sizeof($itensLista)) {
                ?> 
            </div> 
            <?php
            $cont = 1;
        }
        ?>
    <?php }if (sizeof($itensLista) == 0) { ?><h4 align="center">Nenhum item encontrado.</h4> <?php }
    ?>
    <br><br>
</div>

