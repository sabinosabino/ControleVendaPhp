
<div class="container">

  <div id="resultado"></div>
  <div class="text-center text-primary">
    <h1><strong><span class="glyphicon glyphicon-user"></span> Edição de Clientes </strong></h1>
  </div>

  <form id="Clientes" method="POST" action="Salvar">
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />

    <div class="form-group">
      <div class="col-md-2">
        <label for="id">Id</label>
        <input type="text" class="form-control" id="id" name="id" disabled="disabled" value=<?php echo $dadosModel[0]["Id"] ?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" required <?php echo "value='" .$dadosModel[0]["nome"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo" class="form-control" onchange="FormataClientes()">
          <?php
          if ($dt["tipo"] == $dadosModel[0]["F"]) {
            echo '<option selected value=F>FISICA</option>';
            echo '<option value=J>JURIDICA</option>';
          } else {
            echo '<option selected value=J>JURIDICA</option>';
            echo '<option value=F>FISCA</option>';
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4">
        <label for="apelido">Apelido</label>
        <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Insira o apelido" <?php echo "value='" .$dadosModel[0]["apelido"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Insira o Endereço" <?php echo "value='" .$dadosModel[0]["endereco"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Insira o Bairro" <?php echo "value='" .$dadosModel[0]["bairro"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Insira o Cidade" <?php echo "value='" .$dadosModel[0]["cidade"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="uf">UF</label>
        <select name="uf" id="uf" class="form-control">
          <?php
          foreach ($dadosModel[1] as $dt) {
            if ($dt["uf"] == $dadosModel[0]["uf"]) {
              echo '<option selected value=' . $dt['uf'] . ">" . $dt['nome'] . "</option>";
            } else {
              echo '<option value=' . $dt['uf'] . ">" . $dt['nome'] . "</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="cep">Cep</label>
        <input type="text" class="form-control" id="cep" name="cep" placeholder="00.000-000" value=<?php echo $dadosModel[0]["cep"] ?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="telefone_1">Telefone 1</label>
        <input type="text" class="form-control telefone1" id="telefone_1" name="telefone_1" placeholder="(00) 00000-0000" required <?php echo "value='" .$dadosModel[0]["telefone_1"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="telefone_2">Telefone 2</label>
        <input type="text" class="form-control telefone2" id="telefone_2" name="telefone_2" placeholder="(00) 0000-0000" <?php echo "value='" .$dadosModel[0]["telefone_2"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6">
        <label for="email">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Insira um email" value=<?php echo $dadosModel[0]["email"] ?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="rg">RG</label>
        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" value=<?php echo $dadosModel[0]["rg"] ?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-3">
        <label for="cpf_cnpj">CPF ou CNPJ</label>
        <input type="text" class="form-control cpf_cnpj" id="cpf_cnpj" name="cpf_cnpj" placeholder="" value=<?php echo $dadosModel[0]["cpf_cnpj"] ?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="ssplocal">SSP Local</label>
        <select name="ssplocal" id="ssplocal" class="form-control">
          <?php
          foreach ($dadosModel[1] as $dt) {
            if ($dt["uf"] == $dadosModel[0]["ssplocal"]) {
              echo '<option selected value=' . $dt['uf'] . ">" . $dt['nome'] . "</option>";
            } else {
              echo '<option value=' . $dt['uf'] . ">" . $dt['nome'] . "</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group col-md-12">
      </br>
      <hr style="border: 0.1px #a7a8a886 solid;" />

      <div class="col-md-2">
        <a href=<?php echo $acesso ."Clientes/"?> class="btn btn-link btn-lg">
          <span class="glyphicon glyphicon-chevron-left"></span> Cancelar</a>
      </div>

      <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-ok"></span> Salvar Registro</button>
      </div>

      <br />
    </div>
  </form>
</div>
<script src=<?php echo $acesso ."Scripts/jquery.js"; ?>></script>
<script src=<?php echo $acesso ."Scripts/jquery.mask.js"; ?>></script>
<script src=<?php echo $acesso ."Scripts/acoes.js"; ?>></script>
<script src=<?php echo $acesso ."Scripts/requestajax.js"; ?>></script>
<script>
  FormataClientes();
</script>
