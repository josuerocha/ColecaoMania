<?php
session_start(); 
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





        <!-- Datepicker -->
      
    <!-- Declaração padrão de arquivos do bootstrap -->
      <!-- Bootstrap -->
     
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->








    </head>

    <body id="page-top">

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
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a  class="page-scroll" href="#facaParte">Faça parte</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services">Sobre</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio">Social</a>
                        </li>
                        
                        <li>
                            <a class="page-scroll" href="pesqOutrosItensIndex.php">Pesquisar itens</a>
                        </li>
                    </ul>
                    <!--LOGIN-->
                    <form class="navbar-form pull-right"  action="../control/loginValidar.php" method="post">
                        <input type="text" name="emailLogin" id="emailLogin" class="span6 input-sm form-control" required pattern="^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$" maxlength="100" placeholder="Login">

                        <input type="password" name="senhaLogin" id="senhaLogin" class="span6 input-sm form-control" maxlength="8" min="8" required placeholder="Senha">
                        <button type="submit" name="login" class="span1 btn-link form-control">Entrar</button>
                        <button type="button" name="recuperar" onclick="location.href = 'recuperar_senha.php';" class="span1 btn-link form-control">Esqueceu sua senha?</button>

                    </form>
                    <!--LOGIN-->
                </div>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container-fluid -->
        </nav>

        <!--- Para exibir a mensagem modal -->

        <?php
            if(isset($_SESSION['mensagemModal'])) // Se tiver mensagem, exibi-la na janela modal abaixo
            {
                $mensagem = $_SESSION["mensagemModal"];
            }
        ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <b> Mensagem </b>
                    </h4>
                    </div>
                    <div class="modal-body">
                        <h4><?php if(isset($mensagem)){ echo $mensagem; } ?></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--- Para exibir a mensagem modal --> 

        <header>
            <section id="facaParte">
                <div class="container span6">
                    <div class="row-fluid">
                        <div class="col-lg-6 pull-right ">
                            <h3>Faça Parte:</h3>

                            <form action="../control/usuarioSalvar.php" method="post">

                                <div class="form-group">
                                    <input type="hidden" name="idUsuario" id="idUsuario" value="0"/>
                                </div>

                                <div class="form-group">
                                    <input type="text" class=" form-control" name="nome" id="nome" maxlength="150" required pattern="[A-Za-zÀ-ú]{2,}" placeholder="Primeiro nome: Maísa" >
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" required pattern="^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$" maxlength="100" placeholder="Email: maisamendes@email.com">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="dtNasc" id="dtNasc" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1910-01-01" max="1997-12-31"  maxlength="10"  required="required"  placeholder="Data de nascimento">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="senha" id="senha" min="8" maxlength="8"  required placeholder="Senha: ********">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-horizontal form-control"  name="confirmSenha" id="confirmSenha" min="8" maxlength="8" onblur="ValidaSenha()" required placeholder="Confirme sua senha: ********">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="idioma"  name="idioma" onblur="ValidaIdioma()" onChange=""  >
                                        <optgroup label="">
                                            
                                            <?php foreach ($idiomas as $idioma) { ?>

                                                <option value="<?php echo $idioma->getIdIdioma() ?>">
                                                     <?php echo $idioma->getNome() ?> 
                                                </option>   

                                            <?php } ?> 
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Participar</button>             
                                </div>

                        </div>
                        </form>
                    </div>
                </div>

            </section>
            <hr class="primary">
            <section class="no-padding" id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Aqui você pode:</h2>
                        </div>
                    </div>
                </div>
                <div class="container" color="black">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box">
                                <i class="fa fa-4x fa-camera-retro wow bounceIn text-primary"></i>
                                <h3>Album de coleções</h3>
                                <p class="text-primary">Criar um album de fotos das suas coleções.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box">
                                <i class="fa fa-4x fa-comment wow bounceIn text-primary" data-wow-delay=".1s"></i>
                                <h3>Mensagens</h3>
                                <p class="text-primary">Trocar mensagens, para combinar troca ou venda de coleções.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box">
                                <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                                <h3>Eventos</h3>
                                <p class="text-primary">Receber agenda de eventos de colecionismo em todo Brasil.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box">
                                <i class="fa fa-4x fa-eye wow bounceIn text-primary" data-wow-delay=".3s"></i>
                                <h3>Visualize</h3>
                                <p class="text-primary">Visualizar coleções de outros colecionadores.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="primary">
            <section class="no-padding" id="portfolio">
                <div class="container-fluid">
                    <div class="row no-gutter">
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="portfolio-box">
                                <img src="componentes/img/portfolio/1.jpg" class="img-responsive" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            Cartões Telefônicos
                                        </div>
                                        <div class="project-name">
                                            Cartões da Lucy
                                        </div>
                                        <p><i>"São itens bonitos e as vezes de pouca tiragem que desperta a atenção de muitos, é bonito de se ver e colecionar é também relaxante, além de ter sempre uma estória por traz de cada coisa."</i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="portfolio-box">
                                <img src="componentes/img/portfolio/2.jpg" class="img-responsive" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            Miniatura de Carros
                                        </div>
                                        <div class="project-name">
                                            Carrinhos do Tiago
                                        </div>
                                        <p><i>"É divertido porque é diferente, são coisas diferentes e com detalhes que na maioria das vezes passa despercebido pela maioria."</i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="portfolio-box">
                                <img src="componentes/img/portfolio/3.jpg" class="img-responsive" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            Selos
                                        </div>
                                        <div class="project-name">
                                            Selos do Lúcio
                                        </div>
                                        <p><i>"Cada item me faz lembrar um pouco da época ou a história do lugar."</i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="portfolio-box">
                                <img src="componentes/img/portfolio/4.jpg" class="img-responsive" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            Tazos
                                        </div>
                                        <div class="project-name">
                                            Tazos da Ariane
                                        </div>
                                        <p><i>"Adoro coisas antigas, mais pela nostalgia. "</i><p/>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="portfolio-box">
                                <img src="componentes/img/portfolio/5.jpg" class="img-responsive" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            CD's
                                        </div>
                                        <div class="project-name">
                                            CD's da Maísa 
                                        </div>
                                        <p><i>"Coleciono desde criança."</i><p/>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="portfolio-box">
                                <img src="componentes/img/portfolio/6.jpg" class="img-responsive" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            Moedas
                                        </div>
                                        <div class="project-name">
                                            Moedas do Carlos
                                        </div>
                                        <p><i>"É um vício muito divertido que incentiva a pesquisar sobre assuntos que estão relacionados à coleção."</i><p/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>




            <br>
            <!-- jQuery -->
            <script src="componentes/js/pginicial/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="componentes/js/pginicial/bootstrap.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="componentes/js/pginicial/jquery.easing.min.js"></script>
            <script src="componentes/js/pginicial/jquery.fittext.js"></script>
            <script src="componentes/js/pginicial/wow.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="componentes/js/pginicial/creative.js"></script>
            <script src="../pages/componentes/js/pginicial/valida.js" type="text/javascript"></script>



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Referência do arquivo JS do plugin após carregar o jquery -->
      <!-- Datepicker -->
      <script src="componentes/js/bootstrap-datepicker.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function () {
        $('#dtNasc').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });
      });
    </script>



    <!--- Para exibir a mensagem modal -->

    <?php
        if(isset($_SESSION['mensagemModal'])) // Se tiver mensagem, exibi-la na janela modal abaixo
        {
            echo '<script> $("#myModal").modal("show"); </script>';
            unset($_SESSION["mensagemModal"]);
        }
    ?>

    <!--- Para exibir a mensagem modal alterado -->

    </body>

</html>
