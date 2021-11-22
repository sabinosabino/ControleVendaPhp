<script src=<?php echo "../Scripts/acoes.js"; ?>></script>
<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<div>
  <div class="row" style="margin-bottom: 25px;">
  <div class="col-md-2">
    <button class="btn btn-defaut btn-lg" onclick="goBack()">
      <span class="glyphicon glyphicon-chevron-left"></span> Voltar</button>
  </div>
  </div>
  <div class="row">
  <div class="alert alert-danger text-center" role="alert">
    <div>
      <h2>Erro ao execultar a ação!</h2>
    </div>
    <div><strong>
        <h4>Fique tranquilo(a), tente novamente ou print essa tela e envie para o administrador do sistema!</h4>
      </strong>
    </div>
  </div>
</div>
  <div class="alert alert-danger text-center" role="alert">
    <div>
      <h2>Detalhes do Erro</h2>
    </div>
    <div><strong>
        <h4><?php echo $dadosModel['nome'] ?></h4>
      </strong>
    </div>
  </div>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>