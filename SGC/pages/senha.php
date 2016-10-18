
<!-- QUICK POST
================================================== -->
<!-- widget quick post -->
<div class="container">

    <div class="widget-content">
        <div class="row">
             <div class="span12" style="text-align:center; margin: 0 auto;">
            <form class="form-horizontal" method="post" enctype="multipart/form-data"  action="../control/usuarioAltSenha.php">

            <div class="control-group">
               
                    <input type="password" placeholder="Senha Atual" class="input-xlarge form-horizontal" min="8" maxlength="8" id="senhaAtual" name="senhaAtual" required>
                 
            </div><!-- /control-group -->


            <div class="control-group">
                    <input type="password" placeholder="Nova Senha" class="input-xlarge form-horizontal" min="8" maxlength="8" name="senha" id="senha" required> 
            </div><!-- /control-group -->

            <div class="control-group">
                    <input type="password" placeholder="Confirmar Senha" class="input-xlarge form-horizontal" min="8" maxlength="8" name="confirmSenha" id="confirmSenha" onblur="ValidaSenha()" required>  
            </div><!-- /control-group -->

            <div class="control-group">               
                <div class="controls">                 
                    <button class=" btn btn-primary">Salvar</button> 
                </div>  
            </div><!-- /control-group -->

            </form>
                 </div>
        </div>
    </div><!-- /widget content -->
</div><!-- /widget quick post -->
</div><!-- /row -->
</div><!-- /container -->
