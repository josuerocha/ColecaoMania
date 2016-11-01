<?php
require_once '../class/IdiomaDAO.php';
require_once '../class/Idioma.php';
require_once '../class/Conecta.php';
require_once '../class/ACrudDAO.php';

$idiomaDAO = new IdiomaDAO();
$idioma = new Idioma();
$idiomas = array();
$idiomas = $idiomaDAO->listar();
?>

  


<!-- DADOS ================================================== -->
<div class="container">
    <div class="row">
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2> Dados Pessoais </h2>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/usuarioAlterar.php">

                <div class="control-group">
                    <label  for="file-upload3">Minha Foto</label>
                
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                <img src=<?php echo "../" . $caminhoImagens . "" . $usuario->getImagem() ?> />
                            </div>

                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileupload-new">Selecione</span>
                                    <span class="fileupload-exists">Alterar</span>
                                    <input id="arquivo" name="arquivo" type="file" />
                                </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
                            </div>
                      
                    </div>
                </div><!-- /control-group -->

                <div class="control-group">
                    <input type="text" placeholder="Nome" class="input-xlarge form-horizontal" id="nome" name="nome" value="<?php echo $usuario->getNome() ?>" maxlength="150" required pattern="[A-Z a-z À-ú]{2,}">                 
                </div><!-- /control-group -->
                
                 <div class="control-group">
                        <input type="text" placeholder="E-mail" class="input-xlarge form-horizontal" id="email" name="email" value="<?php echo $usuario->getEmail() ?>" required pattern="^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$" maxlength="100">
                </div><!-- /control-group -->

                <div class="control-group">
                    <input type="text" placeholder="Data de Nascimento" style="width:127px;" class="input-medium" id="dtNasc" onblur="ValidaDtNasc()" name="dtNasc" value="<?php echo $usuario->getDataNasc() ?>" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1910-01-01" max="1997-12-31"  maxlength="10"  required="required" > 
                     <input type="text" placeholder="Telefone" style="width:130px;" class="input-medium form-horizontal" id="telefone" name="telefone" value="<?php echo $usuario->getTelefone() ?>" maxlength="8" >
                </div><!-- /control-group -->


                <div class="control-group">
                    <select class="form-horizontal" id="idioma" name="idioma" onblur="ValidaIdioma()" onChange=""  >
                            <optgroup label="">
                                <option value="-1">Idioma </option> 
<?php foreach ($idiomas as $idioma) { ?>

                                    <option value="<?php echo $idioma->getIdIdioma() ?>" <?php if ($idioma->getIdIdioma() == $usuario->getIdIdioma()) { ?> selected <?php } ?>>
    <?php echo $idioma->getNome() ?> 
                                    </option>   

<?php } ?> 
                            </optgroup>
                        </select>
                </div>

                <div class="control-group">
                    <label class="control-label" for="file-upload3"></label>
                    <div class="controls">                       
                        <button class="coll6 btn btn-primary">Salvar</button> 
                    </div>  
                </div><!-- /control-group -->

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
        $('#dtNasc').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });
      });
    </script>






