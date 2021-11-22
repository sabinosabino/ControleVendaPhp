<div class="container">

<div id="resultado"></div>
  <div class="text-center text-primary">
    <h1><strong><span class="glyphicon glyphicon-user"></span> Alteração de Usuarios </strong></h1>
  </div>

  <form id="Usuarios" method="POST" action="Salvar">
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />

    <div class="form-group">
      <div class="col-md-2">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" name="id" disabled="disabled" <?php echo "value='" .$dadosModel[0]["id"] ."'"?>>
      </div>
    </div>

   

    <div class="form-group">
      <div class="col-md-8">
        <label for="nome">NOME</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" required <?php echo "value='" .$dadosModel[0]["usuario"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="grupo">GRUPO</label>
        <select name="grupo" id="grupo" class="form-control">
        <?php
          foreach ($dadosModel[1] as $dt) {
            if ($dt["ID"] == $dadosModel[0]["ID_GRUPO"]) {
              echo '<option selected value=' . $dt['ID'] . ">" . $dt['NOME'] . "</option>";
            } else {
              echo '<option value=' . $dt['ID'] . ">" . $dt['NOME'] . "</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label for="email">EMAIL</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Insira o Email" required <?php echo "value='" .$dadosModel[0]["email"] ."'"?>>
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
      <div class="col-md-2">
        <label for="status">STATUS</label>
        <select name="status" id="status" class="form-control">
        <?php
          if ($dadosModel[0]["status"] == 1) {
            echo '<option selected value="1">ATIVO</option>
                  <option value="0">INATIVO</option>';
          } else {
            echo '<option selected value="0">INATIVO</option>
                  <option value="1">ATIVO</option>';
          }
        ?>
        </select>
      </div>
    </div>
    
    <div class="form-group col-md-12">
      </br>
      <hr style="border: 0.1px #a7a8a886 solid;" />

      <div class="col-md-2">
        <a href=<?php echo $acesso ."Usuarios/"?> class="btn btn-link btn-lg">
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
<script src=<?php echo $acesso ."Scripts/requestajax.js"; ?>></script>
<script>
FormataUsuarios();
</script>
