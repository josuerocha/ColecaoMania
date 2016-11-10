<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />

        <title>COLEÇÃO mania</title>

        <meta http-equiv="X-UA-Compatible" content="IE=9" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="stilearn metro admin bootstrap" />
        <meta name="author" content="stilearning" />

        <!-- CSS
        ================================================== -->
        <link href="componentes/css/bootstrap.css" rel="stylesheet" />
        <link href="componentes/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="componentes/css/metro-bootstrap.css" rel="stylesheet" />
        <link href="componentes/css/metro.css" rel="stylesheet" />
        <link href="componentes/css/metro-responsive.css" rel="stylesheet" />
        <link href="componentes/css/metro-helper.css" rel="stylesheet" />
        <link href="componentes/css/metro-icons.css" rel="stylesheet" />

        <link href="componentes/css/font-awesome.css" rel="stylesheet" />
        <link href="componentes/css/m-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
        <link href="componentes/css/select2/select2-metro.css" rel="stylesheet" />
        <link href="componentes/css/wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" />
        <link href="componentes/css/datepicker/datepicker.css" rel="stylesheet" />
        <link href="componentes/css/timepicker/bootstrap-timepicker.css" rel="stylesheet" />
        <!-- <link href="componentes/css/datetimepicker/datetimepicker.css" rel="stylesheet" />  
        <link href="componentes/css/daterangepicker/daterangepicker.css" rel="stylesheet" /> -->
        <link href="componentes/css/colorpicker/bootstrap-colorpicker.css" rel="stylesheet" />
        <link href="componentes/css/lightbox.css" rel="stylesheet" />

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="componentes/ico/apple-touch-icon-144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="componentes/ico/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="componentes/ico/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="componentes/ico/apple-touch-icon-57-precomposed.png" />
        <link rel="shortcut icon" href="componentes/img/favicon.png" />
        <link href="componentes/css/icomoon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Datepicker -->
        <link href="componentes/css/datepicker.css" rel="stylesheet">

        <!-- Declaração padrão de arquivos do bootstrap -->
        <!-- Bootstrap -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>
        <header class="header">
            <div id="navbar-top" class="navbar navbar-cyan">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar help-inline" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="menu.php?pagina=colecoes">
                            COLEÇÃO mania
                        </a>
                        <ul class="nav pull-left">
                            <li class="dropdown">
                                <a href="index.php#facaParte">
                                    Faça Parte &nbsp<i class="w-icon-white w-icon-2x"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="index.php#services">
                                    Sobre &nbsp<i class="w-icon-white w-icon-2x"></i>
                                </a>

                            </li>
                            <li class="dropdown">
                                <a href="index.php#portfolio">
                                    Social &nbsp<i class="w-icon-white w-icon-2x"></i>
                                </a>

                            </li>

                            <li class="dropdown">
                                <a href="pesqOutrosItensIndex.php" class="dropdown-toggle" data-toggle="dropdown">
                                    Pesquisar itens&nbsp<i class="w-icon-white w-icon-2x"></i>
                                </a>

                            </li>
                            
                                    <!--LOGIN-->
                        
                        <!--LOGIN-->
                        </ul>

                        <form class="navbar-form pull-right"  action="../control/loginValidar.php" method="post">
                            <input type="text" name="emailLogin" id="emailLogin" class="span2 input-sm form-control" required pattern="^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$" maxlength="100" placeholder="Login">

                            
                            <input type="password" name="senhaLogin" id="senhaLogin" class="span2 input-sm form-control" maxlength="8" min="8" required placeholder="Senha">
                            <button type="submit" name="login" class=" form-control">Entrar</button>

                        </form>

                    </div>
                    
                </div>
                
            </div>
            
        </div> 

    </header> 

    <br>

    <?php
    include("./pesqItensIndex.php");
    ?> 

    <!--  <footer class="footer">
         <p>Copyright &copy; 2013. All Right Reserved.</p>
     </footer>
 
    <!-- JAVASCRIPT
    ================================================== -->
    <script type='text/javascript' src='componentes/cep/jquery.js'></script>
    <script type='text/javascript' src='componentes/cep/cep.js'></script>

    <script type="text/javascript" src="componentes/js/jquery.min.js"></script>

    <script type="text/javascript" src="componentes/js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="componentes/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="componentes/js/metro-base.js"></script>
    <script type="text/javascript" src="componentes/js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="componentes/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="componentes/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="componentes/js/select2/select2.min.js"></script>

    <script type="text/javascript" src="componentes/js/inputmask/jquery.maskedinput-1.1.4.pack.js"></script>
    <script type="text/javascript" src="componentes/js/inputmask/mascara.js"></script>

    <script type="text/javascript" src="componentes/js/jquery.simplyCountable.js"></script>
    <script type="text/javascript" src="componentes/js/textAreaCount.js"></script>

    <script src="../pages/componentes/js/valida.js" type="text/javascript"></script>
    <script type="text/javascript" src="componentes/js/m-scrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="componentes/js/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="componentes/js/datatables/colvis/jquery-migrate-1.2.1.min.js"></script> <!-- required for ColVis.js -->

    <script type="text/javascript" src="componentes/js/datatables/tabletools/ZeroClipboard.js"></script>
    <script type="text/javascript" src="componentes/js/datatables/tabletools/TableTools.min.js"></script>

    <script type="text/javascript" src="componentes/js/datatables/colreorder/ColReorder.min.js"></script>
    <script type="text/javascript" src="componentes/js/datatables/colvis/ColVis.js"></script>

    <script type="text/javascript" src="componentes/js/datatables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="componentes/js/datatables/dataTables.js"></script>

    <!-- ck editor -->
    <script type="text/javascript" src="componentes/assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        var editor = CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: 'componentes/assets/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: 'componentes/assets/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: 'componentes/assets/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: 'componentes/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: 'componentes/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: 'componentes/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
        // CKFinder.setupCKEditor(editor, '../');
    </script>

    <script type="text/javascript" src="componentes/js/morrisjs/raphael-min.js"></script>

    <script type="text/javascript" src="componentes/js/daterangepicker/moment.min.js"></script>

    <script type="text/javascript" src="componentes/js/wysihtml5/wysihtml5-0.3.0.min.js"></script>
    <script type="text/javascript" src="componentes/js/wysihtml5/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="componentes/js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="componentes/js/jquery.equalHeight.js"></script>



    <script type="text/javascript" src="componentes/js/lightbox.js"></script>

</body>
</html>
