

        </header>
        <?php
        require_once '../class/ColecaoDAO.php';
        require_once '../class/Colecao.php';

        require_once '../class/UsuarioDAO.php';
        require_once '../class/Usuario.php';

        require_once '../class/ItemColecaoDAO.php';
        require_once '../class/ItemColecao.php';

        require_once '../class/TipoColecaoDAO.php';
        require_once '../class/TipoColecao.php';

        require_once '../class/ListaDesejosDAO.php';
        require_once '../class/ListaDesejos.php';

        require_once '../class/ItemColecaoDAO.php';
        require_once '../class/ItemColecao.php';

        require_once '../class/ItemListaDesejosDAO.php';
        require_once '../class/ItemListaDesejos.php';

        $tipoColecaoDAO = new TipoColecaoDAO();
        $tipoColecao = new TipoColecao();
        $tipos = array();
        $tipos = $tipoColecaoDAO->listar();

        $colecaoDAO = new ColecaoDAO();
        $colecao = new Colecao();

        $usuarioDAO = new UsuarioDAO();
        $usuario = new Usuario();

        $itemColecaoDAO = new ItemColecaoDAO();
        $itemColecao = new ItemColecao();
        $itensColecao = array();

        $itemListaDesejos = new ItemListaDesejos();
        $itemListaDesejosDAO = new ItemListaDesejosDAO();

        $listaDesejos = new ListaDesejos();
        $listaDesejosDAO = new ListaDesejosDAO();
//$listaDesejos = $listaDesejosDAO->buscarPorId($_SESSION["codigo"]);

        if (isset($_POST["filtro"])) {
            if ($_POST["filtro"] == 1) {
                $itensColecao = $itemColecaoDAO->pesqItNome($_POST["pesq"], $_POST["tipo"]);
            }
            if ($_POST["filtro"] == 2) {
                $itensColecao = $itemColecaoDAO->pesqItDesc($_POST["pesq"], $_POST["tipo"]);
            }
            if ($_POST["filtro"] == 3) {
                $itensColecao = $itemColecaoDAO->pesqItNroSerie($_POST["pesq"], $_POST["tipo"]);
            }
        }
        ?>

        <!-- PESQUISA DE ITENS DE OUTROS USUARIOS
        ================================================== -->
        <div class="container" >
            <h2 align="center">Pesquisa de Itens </h2><br>  
            <form method="post" enctype="multipart/form-data" name="form1"  action="pesqOutrosItensIndex.php">

                <div class="span12 row" >
                    <div class="span3 control-group">

                        <select class="input-xlarge" id="tipo" name="tipo" onblur="ValidaTipo();" onChange="" required>
                            <optgroup label="">
                                <option value="0">Selecione o Tipo de Coleção </option> 
                                <?php foreach ($tipos as $tipo) { ?>
                                    <option value="<?php echo $tipo->getIdTipoColecao() ?>" <?php if (isset($_POST["tipo"])) {
                                    if ($_POST["tipo"] == $tipo->getIdTipoColecao()) {
                                            ?> selected <?php }
                                }
                                    ?>>
                                    <?php echo utf8_encode($tipo->getNome()) ?> 
                                    </option>   
<?php } ?> 
                            </optgroup>
                        </select>
                    </div>
                    <div class="span3 control-group">

                        <select class="input-xlarge" id="filtro" name="filtro" onblur="ValidaFiltro();" onChange=""  >   
                            <optgroup label="">
                                <option value="0">Selecione o Filtro </option> 
                                <option value="1" <?php if (isset($_POST["filtro"])) {
    if ($_POST["filtro"] == 1) {
        ?> selected=""<?php }
}
?>>Nome</option>
                                <option value="2" <?php if (isset($_POST["filtro"])) {
                                            if ($_POST["filtro"] == 2) {
        ?> selected=""<?php }
                                }
?>>Descrição</option>
                                <option value="3" <?php if (isset($_POST["filtro"])) {
                                    if ($_POST["filtro"] == 3) {
                                        ?> selected=""<?php }
                                }
?>>Nº de Série</option>
                            </optgroup>
                        </select>   
                    </div>
                    <div class="span3 control-group">

                        <input type="text" id="pesq" name="pesq" placeholder="Pesquisar" onkeypress="submitonEnter(event);" value="<?php
        if (isset($_POST["pesq"])) {
            echo $_POST["pesq"];
        }
        ?>">
                    </div> 
                </div> 
            </form>
        </div> 

        <br><br><br>
<?php
if (isset($_POST["filtro"])) {
    $cont = 1;
    $totalPercorrido = 0;

    foreach ($itensColecao as $itemColecao) {
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
                            $colecao = $colecaoDAO->buscarPorId($itemColecao->getIdColecao());
                            $usuario = $usuarioDAO->buscarPorId($colecao->getIdUsuDono());

                            if ($usuario->getStatus() == 1) {
                                echo "Proprietário: " . $usuario->getNome() . "<br>" . "Descrição: " . $itemColecao->getDescricao();
                            } else {
                                echo "Proprietário: " . "Usuário Desativado" . "<br>" . "Descrição: " . $itemColecao->getDescricao();
                            }
                            ?>


                        <?php
                       
                            ?>
                              
                        <?php   ?>
                            
                    
                        </p>  
                    </div>

                <?php
                $cont++;
                $totalPercorrido++;
                ?>
                <?php if ($cont == 4 || $totalPercorrido == sizeof($itensColecao)) {
                    ?> 
                    </div> 
            <?php
            $cont = 1;
        }
        ?>

    <?php } if (sizeof($itensColecao) == 0) { ?> <h4 align="center">Nenhum item encontrado.</h4> <?php
    }
}
?>
        <br><br>
    </div>

