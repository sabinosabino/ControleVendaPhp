<script src=<?php echo "../Scripts/acoes.js"; ?>></script>
<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<div class="container">

  <div class="text-center text-primary">
    <h1><strong><span class="glyphicon glyphicon-th"></span> Edição Lançamento de Pagamentos </strong></h1>
  </div>
  <form id="Vendas" method="POST" action="../Salvar" onsubmit="return ValidaVendas()">
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />
    
    
    <div class="form-group">
      <div class="col-md-2">
        <label for="id">Id</label>
        <input type="text" readonly class="form-control" id="id" name="id" value=<?php echo $dadosModel[0]["Id"] ?>>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6">
        <label for="idCliente">Nome</label>
        <select name="idCliente" id="idCliente" class="form-control">
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
        <input type="date" class="form-control" id="data" name="data" placeholder="__/__/____" required value=<?php echo $dadosModel[0]["data_venda"] ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-2">
        <label for="valor_pago">Valor Pago</label>
        <input type="text" class="form-control moeda" id="valor_pago" name="valor_pago" required placeholder="R$ 0,00" required value=<?php echo $dadosModel[0]["valor_pago"] ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label for="detalhes_pagamento">Detalhes</label>
        <textarea type="text" class="form-control" id="detalhes_pagamento" name="detalhes_pagamento" placeholder="Insira mais detalhes" required><?php echo $dadosModel[0]["detalhes_pagamento"] ?></textarea>
        </br>
      </div>
    </div>
    <div class="form-group">
      </br>
      </br>
      </br>
      <hr style="border: 0.1px #a7a8a886 solid;" />
      <div class="col-md-2">
        <a href="../../Pagamentos/" class="btn btn-link btn-lg">
          <span class="glyphicon glyphicon-chevron-left"></span> Cancelar</a>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-ok"></span> Salvar Registro</button>
      </div>
      <br />
      <br />
    </div>
  </form>
</div>
<script>
  FormatarVendas();
</script>