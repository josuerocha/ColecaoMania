<?php
require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';
require_once '../class/Conecta.php';
require_once '../class/ACrudDAO.php';
require_once '../class/EventoDAO.php';
require_once '../class/Evento.php';


$paisDAO = new PaisDAO();
$pais = new Pais();
$paises = array();
$paises = $paisDAO->listar();

if (isset($_POST['cd'])) {
    $eventoDAO = new EventoDAO();
    $itemColecao = new Evento();
    $itemColecao = $eventoDAO->buscarPorId($_POST["cd"]);
}
?>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!-- Referência do arquivo JS do plugin após carregar o jquery -->
          <!-- Datepicker -->
          <script src="componentes/js/bootstrap-datepicker.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script>
          $(document).ready(function () {
            $('#data').datepicker({
                format: "dd/mm/yyyy",
                language: "pt-BR"
            });
          });
        </script>

    

<!-- ENDERECO ================================================== -->
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Evento </h2>
             <h5 class="pull-left"><a href="menu.php?pagina=eventos"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/eventoSalvar.php">
                 <input type="hidden" id="cd" name="cd" value="<?php echo $_POST["cd"] ?>"/>
              
                    <div class="control-group ">
                        <input type="text" placeholder="Nome" class="input-xlarge form-horizontal" id="nome" name="nome" value="<?php echo $itemColecao->getNome() ?>" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}">
                    </div>
                 
                 <div class="control-group ">
                        <input type="text" placeholder="Data" class="input-medium" name="data" id="data" min="15" maxlength="15" onblur="ValidaData(this.value)" value="<?php echo $itemColecao->getData() ?>" required >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Hora" class="input-mini form-horizontal" id="hora" name="hora" onblur="ValidaHora(this.value)" value="<?php echo $itemColecao->getHora() ?>" maxlength="5" required >
                    </div>

                    <div class="control-group ">
                        <input type="text" placeholder="CEP" class="input-medium form-horizontal" id="cep" name="cep" maxlength="8" value="<?php echo $itemColecao->getCEP() ?>" required >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Estado" class="input-mini form-horizontal" id="estado" name="estado" maxlength="100" value="<?php echo $itemColecao->getEstado() ?>" required>
                        </div>
                 <div class="control-group ">
                        <input type="text" placeholder="Cidade" class="input-xlarge form-horizontal" id="cidade" name="cidade" value="<?php echo $itemColecao->getCidade() ?>" maxlength="100" required>
                 </div>
                        <div class="control-group ">
                        <input type="text" placeholder="Bairro" class="input-xlarge form-horizontal" id="bairro" name="bairro"  value="<?php echo $itemColecao->getBairro() ?>" maxlength="100" required>
                    </div>
                


                <div class="control-group">
                    <input type="text" placeholder="Logradouro" class="input-xlarge form-horizontal" id="rua" name="rua" maxlength="150" value="<?php echo $itemColecao->getRua() ?>" required>
                </div><!-- /control-group -->


                <div class="control-group">
                    <input type="text" placeholder="Numero" class="input-mini form-horizontal" id="num" name="num" maxlength="4" value="<?php echo $itemColecao->getNumero() ?>" required>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" placeholder="Complemento" class="input-medium form-horizontal" id="comp" value="<?php echo $itemColecao->getComplemento() ?>" name="comp" maxlength="50">
                </div>  


        <div class="control-group">
                <select class="form-horizontal" id="pais" name="pais" onblur="ValidaPais()" onChange="" required >
                    <optgroup label="">

                        <?php foreach ($paises as $pais) { ?>

                        <option value="<?php echo $pais->getIdPais() ?>" <?php if($pais->getIdPais() == $itemColecao->getIdPais()){ ?> selected <?php } ?> >
                                <?php echo utf8_encode($pais->getNome()) ?> 
                            </option>   

                        <?php } ?> 
                    </optgroup>
                </select> 
        </div><!-- /control-group -->

           <div class="control-group">
                    <div class="controls">                  
                        <button class="btn btn-primary">Salvar</button>
                    </div><!-- /control-group -->
                </div>

        </form>
    </div>
</div>
</div>




