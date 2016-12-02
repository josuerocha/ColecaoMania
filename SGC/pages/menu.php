<?php
session_start();
ini_set('default_charset', 'UTF-8');
//setlocale(LC_ALL, 'pt_BR');

if (!isset($_SESSION['codigo'])) {
    header("Location: index.php");
} else {
    require_once '../class/MensagemDAO.php';
    require_once '../class/Mensagem.php';
    require_once '../class/UsuarioDAO.php';
    require_once '../class/Usuario.php';
    require_once '../class/Conecta.php';
    require_once '../class/ACrudDAO.php';
    require_once '../class/NotificacaoDAO.php';
    require_once '../class/Notificacao.php';
    require_once '../control/caminhos.php';

    $usuario = new Usuario();
    $usuarioDAO = new UsuarioDAO();

    $usuario = $usuarioDAO->buscarPorId($_SESSION["codigo"]);

    $notificacao = new Notificacao();
    $notificacaoDAO = new NotificacaoDAO();
    $notificacoes = array();
    $notificacoes = $notificacaoDAO->listar();

    $mensagemDAO = new MensagemDAO();
    $mensagem = new Mensagem();

    $usuEnvia = new Usuario();
    $usuRecebe = new Usuario();
    $usuNotf = new Usuario();

    $mensagens = array();
    $mensagens = $mensagemDAO->buscarUltimas();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

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
                                <a href="menu.php?pagina=colecoes">
                                    Minhas Coleções &nbsp<i class="w-icon-puzzle-round w-icon-white w-icon-2x"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Lista de Desejos &nbsp<i class="w-icon-heart w-icon-white w-icon-2x"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                    <li><a tabindex="-1" href="menu.php?pagina=minhaListaDesejos">Ver minha lista</a></li>
                                    <li><a tabindex="-1" href="menu.php?pagina=pesqOutrosItens">Pesquisar itens</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Seguir &nbsp<i class="w-icon-paw w-icon-white w-icon-2x"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                    <li><a tabindex="-1" href="menu.php?pagina=quemeusigo">Quem eu sigo</a></li>
                                    <li><a tabindex="-1" href="menu.php?pagina=quemmesegue">Meus seguidores</a></li>
                                    <li><a tabindex="-1" href="menu.php?pagina=pesqUsuarios">Pesquisar pessoas</a></li>
                                    <li><a tabindex="-1" href="menu.php?pagina=sugestaoSeguidores">Sugestões</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="nav-uncollapse">
                            <ul class="nav pull-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <?php echo $usuario->getNome(); ?>
                                        &nbsp<img class="media-object pull-right" style="width: 28px; height: 28px;" 
                                                  src=<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?> </img>

                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                        <li><a tabindex="-1" href="menu.php?pagina=dados">Dados Pessoais</a></li>
                                        <li><a tabindex="-1" href="menu.php?pagina=endereco">Endereço</a></li>
                                        <li><a tabindex="-1" href="menu.php?pagina=senha">Senha</a></li>
                                        <li><a tabindex="-1" href="#" onclick="javascript: if (confirm('Você realmente deseja desativar sua conta?'))
                                                    location.href = '../control/usuarioExcluir.php'">Desativar Conta</a></li>
                                        <li><a tabindex="-1" href="#" onclick="javascript: if (confirm('Sair?'))
                                                    location.href = '../control/usuarioSair.php'">Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php $qtd = $notificacaoDAO->notfCount(); ?>
                                    <div class="label"><?php
                                        if ($qtd > 0) {
                                            echo $qtd;
                                        }
                                        ?></div>
                                    <i class="aweso-globe fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-extend" role="menu" aria-labelledby="dropdownMenu">
                                    <li class="dropdown-header"><?php if ($qtd > 1) { ?>Você tem <?php echo $qtd; ?> novas notificações<?php
                                        } else {
                                            if ($qtd == 1) {
                                                ?>Você tem <?php echo $qtd; ?> nova notificação<?php } else { ?>Nenhuma nova notificação.<?php
                                            }
                                        }
                                        ?></li>
                                    <?php foreach ($notificacoes as $notificacao) { ?>
                                        <li>
                                            <a tabindex="-1" href="#">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <img class="media-object" data-src="holder.js/32x32" />
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php
                                                            $usuNotf = $usuarioDAO->buscarPorId($notificacao->getIdUsuario());
                                                            if($usuNotf->getStatus()==1){
                                                            $nome = $usuNotf->getNome(); 
                                                            echo $nome;
                                                            }else
                                                            {
                                                                echo "Usuário Desativado";
                                                            }
                                                            ?>
                                                        </h4>
                                                        <p>
                                                        <form name="frmC" method="post" action="../control/alteraStatusNotif.php">
                                                            <input type="hidden" id="cdN" name="cdN" value="<?php echo $notificacao->getIdNotf() ?>"/>
                                                            <input type="hidden" id="cd" name="cd" value="<?php echo $notificacao->getIdUsuario() ?>"/>
                                                            <button type="submit" class="btn-link"><p><?php echo $nome . " " . $notificacao->getObs(); ?></p></button>
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>

                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li class="dropdown-footer">
                                        <a tabindex="-1" href="menu.php?pagina=notificacoesUsu"><i class="aweso-angle-right pull-right"></i> Ver todas</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav pull-right">
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php $qtdMsg = $mensagemDAO->msgCount(); ?>
                                    <div class="label"><?php
                                        if ($qtdMsg > 0) {
                                            echo $qtdMsg;
                                        }
                                        ?></div>
                                    <i class="aweso-comment fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-extend" role="menu" aria-labelledby="dropdownMenu">
                                    <li class="dropdown-header">
                                         <?php if ($qtdMsg > 1) { ?>Você tem <?php echo $qtdMsg; ?> novas mensagens<?php
                                        } else {
                                            if ($qtdMsg == 1) {
                                                ?>Você tem <?php echo $qtdMsg; ?> nova mensagem<?php } else { ?>Nenhuma nova mensagem.<?php
                                            }
                                        }
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                        foreach ($mensagens as $mensagem) {
                                            $usuEnvia = $usuarioDAO->buscarPorId($mensagem->getIdUsuEnvia());
                                            $usuRecebe = $usuarioDAO->buscarPorId($mensagem->getIdUsuRecebe());
                                            ?> 
                                            
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <img class="media-object" data-src="<?php echo "../" . $caminhoImagens . "" . $usuEnvia->getImagem() ?>" />
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><small class="pull-right"><?php $data = implode("/", array_reverse(explode("-", $mensagem->getData()))); echo $data.'|'.$mensagem->getHora() ?></small> <?php if($usuEnvia->getStatus()==1){ echo "<br>".$usuEnvia->getNome(); }else{ echo "<br>"."Usuário Desativado"; } ?></h4>
                                                      
                                                        <form name="frmC" method="post" action="../control/alteraStatusMsg.php">
                                                            <input type="hidden" id="cdM" name="cdM" value="<?php echo $mensagem->getIdMensagem() ?>"/>
                                                            <input type="hidden" id="cd" name="cd" value="<?php echo $mensagem->getIdUsuEnvia() ?>"/>
                                                            <button type="submit" class="btn-link">  <p><a><?php echo $mensagem->getTexto() ?></a></p></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            
                                        </li>
                                        <?php } ?>

                                        <li class="dropdown-footer">
                                            <a tabindex="-1" href="menu.php?pagina=minhasMensagens"><i class="aweso-angle-right pull-right"></i> Ver todas</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav pull-right">
                                <li><a href="menu.php?pagina=topColecionadores">Top 10&nbsp<i class="w-icon-leaderboard w-icon-white w-icon-2x"></i></a></li>
                            </ul>
                            <ul class="nav pull-right">
                                <li class="dropdown"><!--menu.php?pagina=top10-->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        Eventos &nbsp<i class="w-icon-group w-icon-white w-icon-2x"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                        <li><a tabindex="-1" href="menu.php?pagina=eventos">Novo</a></li>
                                        <li><a tabindex="-1" href="menu.php?pagina=pesqEventos">Pesquisar</a></li>
                                        <li><a tabindex="-1" href="menu.php?pagina=euvou">Eu vou</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <?php
                            if ($usuarioDAO->buscaTipo($_SESSION["codigo"]) == 1) {
                                ?>
                                <ul class="nav pull-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Admin &nbsp<i class="w-icon-eye w-icon-white w-icon-2x"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                            <li><a tabindex="-1" href="menu.php?pagina=usuarios">Usuários</a></li>
                                            <li><a tabindex="-1" href="menu.php?pagina=idiomas">Idioma</a></li>
                                            <li><a tabindex="-1" href="menu.php?pagina=paises">País</a></li>
                                              <li class="dropdown-submenu">
                                                <a tabindex="-1">Tipos De Coleção</a>
                                                <ul class="dropdown-menu sub-menu" style="right:-160px;">
                                                    <li><a tabindex="-1" href="menu.php?pagina=tiposDeColecao">Novo </a></li>
                                                    <li><a tabindex="-1" href="menu.php?pagina=sugestoes">Sugestões</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
    <?php } ?>
                        </div>
                        <div id="navbar-collapse" class="nav-collapse collapse hidden-desktop"></div>
                    </div>
                </div>
            </div> 
        </header>

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


        <br>
        <?php
        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = "menu";
        }
        if ($pagina == "menu") {
            include('colecoes.php');
        } else {
            include($pagina . ".php");
        }
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
        <?php if (isset($_GET["pagina"])) {
            if ($_GET["pagina"] == "entraremcontato") {
                ?>
                <script type="text/javascript" src="componentes/js/demo/dashboard.js"></script>
        <?php }
    } ?>
    
    <!-- <script src="componentes/js/bootstrap.min2.js"></script> -->
    
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

    <!--- Para exibir a mensagem modal -->

    <?php
        if(isset($_SESSION['mensagemModal'])) // Se tiver mensagem, exibi-la na janela modal abaixo
        {
            echo '<script> $("#myModal").modal("show"); </script>';
            unset($_SESSION["mensagemModal"]);
        }
    ?>

    <!--- Para exibir a mensagem modal -->

</body>
</html>
