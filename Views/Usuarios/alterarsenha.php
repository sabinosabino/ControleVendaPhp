<div class="container">

<div id="resultado"></div>
  <div class="text-center text-primary">
    <h1><strong><span class="glyphicon glyphicon-user"></span> Alterar Senha</strong></h1>
  </div>

  <form id="Alterarsenha" method="POST" action="Salvar">
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />

    

    <div class="form-group">
      <div class="col-md-8 col-md-offset-2">
        <label for="senhaantiga">SENHA ANTIGA</label>
        <input type="password" class="form-control" id="senhaantiga" name="senhaantiga" placeholder="Insira a senha antiga" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8 col-md-offset-2">
        <label for="senhanova">SENHA NOVA</label>
        <input type="password" class="form-control" id="senhanova" name="senhanova" placeholder="Insira a senha nova" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8 col-md-offset-2">
        <label for="confirmacaosenha">CONFIRMAÇÃO DE SENHA</label>
        <input type="password" class="form-control" id="confirmacaosenha" name="confirmacaosenha" placeholder="Confirme a senha" required>
      </div>
    </div>
    
    <div class="form-group col-md-12">
      </br>
      <hr style="border: 0.1px #a7a8a886 solid;" />

        <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-ok"></span> Alterar </button>
      </div>

      <br />
    </div>
  </form>
</div>
<script src=<?php echo $acesso ."Scripts/jquery.js"; ?>></script>
<script src=<?php echo $acesso ."Scripts/jquery.mask.js"; ?>></script>
<script src=<?php echo $acesso ."Scripts/requestajax.js"; ?>></script>
<script>
FormataUsuarios();
</script>
