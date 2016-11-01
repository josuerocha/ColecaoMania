<?php
require_once '../class/PaisDAO.php';
require_once '../class/Pais.php';

$paisDAO = new PaisDAO();
$pais = new Pais();
$paises = array();
$paises = $paisDAO->listar();
?>
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            
            <h2> Evento </h2>
            <h5 class="pull-left"><a href="menu.php?pagina=eventos"><i class="aweso-hand-left "> </i>&nbsp;Voltar</a></h5>
            <br><br>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/eventoSalvar.php">

                <div class="control-group">
                    <input type="text" placeholder="Nome" class="input-xlarge form-horizontal" id="nome" name="nome" value="" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}"> 
                 </div>
                
                <div class="control-group">
                    <input type="text" placeholder="Data" class="input-medium" name="data" id="data" onblur="ValidaData()" min="15" maxlength="15"  required >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="input-mini form-horizontal" placeholder="hora" id="hora" name="hora" onblur="ValidaHora(this.value)" value="" maxlength="5" required > 
                </div><!-- /control-group -->
                
                 <div class="control-group">
                    <input type="text" placeholder="CEP" class="input-medium form-horizontal" id="cep" name="cep" maxlength="8" required >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="text" placeholder="Estado" class="input-mini form-horizontal" id="estado" name="estado" maxlength="100" required>
                </div><!-- /control-group -->


                <div class="control-group">
                    <input type="text" placeholder="Cidade" class="input-xlarge form-horizontal" id="cidade" name="cidade"  maxlength="100" required>
                    
                </div><!-- /control-group -->
                
                 <div class="control-group">
                     <input type="text" placeholder="Bairro" class="input-xlarge form-horizontal" id="bairro" name="bairro"  maxlength="100" required>
                  </div><!-- /control-group -->

                <div class="control-group">
                    <input type="text" placeholder="Logradouro" class="input-xlarge form-horizontal" id="rua" name="rua" maxlength="150" required>
                </div><!-- /control-group -->

                <div class="control-group">
                    <input type="text" placeholder="Número" class="input-mini form-horizontal" id="num" name="num" maxlength="4" required>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="input-medium form-horizontal" placeholder="Complemento" id="comp" name="comp" maxlength="50">
                </div>

                <div class="control-group">
                    <select class="form-horizontal" id="pais" name="pais"  onblur="ValidaPais()" onChange="" required >
                        <optgroup label="">

                            <?php foreach ($paises as $pais) { ?>

                                <option value="<?php echo $pais->getIdPais() ?>">
                                    <?php echo utf8_encode($pais->getNome()) ?> 
                                </option>   

                            <?php } ?> 
                        </optgroup>
                    </select>
                </div><!-- /control-group -->


                <div class="control-group span12">
                    <div class="controls">                  
                        <button class="btn btn-primary">Salvar</button>
                    </div><!-- /control-group -->
                </div>
            </form>
        </div>
    </div>

</div>
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