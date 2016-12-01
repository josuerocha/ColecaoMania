<?php
ini_set('default_charset', 'UTF-8');

require_once '../class/IdiomaDAO.php';
require_once '../class/Conecta.php';
require_once '../class/ACrudDAO.php';

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
                            <a class="page-scroll" href="#">Redefinição de senha</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php">Página inicial</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container-fluid -->
        </nav>


        <header>
            <section id="facaParte">
                <div class="container span6">
                    <div class="row-fluid">
                        <div class="col-lg-6 pull-right ">
                            <h3>Redefinição de senha:</h3>

                            <form action="../control/redefinirSenha.php" method="post">

                                <div class="form-group">
                                    <input type="hidden" name="idUsuario" id="idUsuario" value=<?PHP echo $_GET['code'];?>>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="senha" id="senha" min="8" maxlength="8"  required placeholder="Nova senha: ********">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-horizontal form-control"  name="confirmSenha" id="confirmSenha" min="8" maxlength="8" onblur="ValidaSenha()" required placeholder="Confirme sua senha: ********">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Recuperar</button>             
                                </div>

                        </div>
                        </form>
                    </div>
                </div>

           




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




    </body>

</html>
