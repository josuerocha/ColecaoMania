<?php
ini_set('default_charset', 'UTF-8');

require_once '../class/IdiomaDAO.php';
require_once '../class/Idioma.php';
require_once '../class/Conecta.php';
require_once '../class/ACrudDAO.php';

$idiomaDAO = new IdiomaDAO();
$idioma = new Idioma();
$idiomas = array();
$idiomas = $idiomaDAO->listar();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>COLEÇÃO mania</title>
        <link rel="icon" href="componentes/img/favicon.png">
        <!-- Bootstrap Core CSS -->
        <!-- <link rel="stylesheet" href="componentes/css/pginicial/bootstrapinicio.min.css" type="text/css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="componentes/font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="componentes/css/pginicial/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="componentes/css/pginicial/creative.css" type="text/css">



        

        <!--CSS -->
        <link href="componentes/css/bootstrap.css" rel="stylesheet" /> <!-- Esse Css dá erro-->
        <!--<link href="componentes/css/bootstrap-responsive.css" rel="stylesheet" />-->
        <link href="componentes/css/metro-bootstrap.css" rel="stylesheet" />
        <!--<link href="componentes/css/metro.css" rel="stylesheet" />-->
        <!--<link href="componentes/css/metro-responsive.css" rel="stylesheet" />-->
        <!--<link href="componentes/css/metro-helper.css" rel="stylesheet" />-->
        <!--<link href="componentes/css/metro-icons.css" rel="stylesheet" />-->





    </head>

    <body  id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">COLEÇÃO mania</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a  class="page-scroll" href="index.php">Faça parte</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php?#services">Sobre</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php#portfolio">Social</a>
                        </li>

                        <li>
                            <a class="page-scroll" href="pesqItensIndex.php">Pesquisar itens</a>
                        </li>
                    </ul>
                    <!--LOGIN-->
                    <form class="navbar-form pull-right"  action="../control/loginValidar.php" method="post">
                        <input type="text" name="emailLogin" id="emailLogin" class="span6 input-sm form-control" required pattern="^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$" maxlength="100" placeholder="Login">

                        <input type="password" name="senhaLogin" id="senhaLogin" class="span6 input-sm form-control" maxlength="8" min="8" required placeholder="Senha">
                        <button type="submit" name="login" class="span1 btn-link form-control">Entrar</button>

                    </form>
                    <!--LOGIN-->
                </div>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container-fluid -->
        </nav>

        <header>

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
            <form method="post" enctype="multipart/form-data" name="form1"  action="pesqItensIndex.php">

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

</body>

</html>
