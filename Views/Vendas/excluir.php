<script src=<?php echo "../Scripts/acoes.js"; ?>></script>
<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<div class="container">

  <div class="text-center text-danger">
    <h1><strong><span class="glyphicon glyphicon-th"></span> Excluir Lançamento de Vendas </strong></h1>
  </div>
  <form id="Vendas" method="POST" action="../deletar">
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />
    <div class="form-group">
      <div class="col-md-2">
        <label for="id">Id</label>
        <input type="text" class="form-control" id="id" name="id" readonly value=<?php echo $dadosModel[0]["Id"] ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <label for="idCliente">Nome</label>
        <select name="idCliente" id="idCliente" class="form-control" disabled="disabled">
          <?php
          foreach ($dadosModel[1] as $dt) {
            if ($dt["Id"] == $dadosModel[0]["idCliente"]) {
              echo '<option selected value=' . $dt['Id'] . ">" . $dt['nome'] . "</option>";
            } else {
              echo '<option value=' . $dt['Id'] . ">" . $dt['nome'] . "</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-2">
        <label for="data">Data</label>
        <input type="date" class="form-control" id="data" readonly name="data" placeholder="__/__/____" required value=<?php echo $dadosModel[0]["data_venda"] ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-2">
        <label for="valor_venda">Valor Venda</label>
        <input type="text" class="form-control moeda" id="valor_venda"  readonly name="valor_venda" required placeholder="R$ 0,00" required value=<?php echo $dadosModel[0]["valor_venda"] ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label for="detalhe_venda">Detalhes</label>
        <textarea type="text" class="form-control" id="detalhe_venda" readonly name="detalhe_venda" placeholder="Insira mais detalhes" required><?php echo $dadosModel[0]["detalhe_venda"] ?></textarea>
        </br>
      </div>
    </div>
    <div class="form-group">
      </br>
      </br>
      </br>
      <hr style="border: 0.1px #a7a8a886 solid;" />
      <div class="col-md-2">
        <a href="../../Vendas/" class="btn btn-link btn-lg">
          <span class="glyphicon glyphicon-chevron-left"></span> Cancelar</a>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-danger btn-lg">
          <span class="glyphicon glyphicon-ok"></span> Excluir Registro</button>
      </div>
      <br />
      <br />
    </div>
  </form>
</div>
<script>

</script>