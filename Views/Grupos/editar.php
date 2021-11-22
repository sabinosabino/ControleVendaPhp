<div class="container">

<div id="resultado"></div>
  <div class="text-center text-primary">
    <h1><strong><span class="glyphicon glyphicon-user"></span> Edição de Grupos </strong></h1>
  </div>

  <form id="Grupos" method="POST" action="Salvar">
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />

    <div class="form-group">
      <div class="col-md-2">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" name="id" disabled="disabled" <?php echo "value='" .$dadosModel[0]["ID"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label for="nome">nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" required <?php echo "value='" .$dadosModel[0]["NOME"] ."'"?>>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label for="status">STATUS</label>
        <select name="status" id="status" class="form-control">
        <?php
          if ($dadosModel[0]["STATUS"] == 1) {
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
        <a href=<?php echo $acesso ."Grupos/"?> class="btn btn-link btn-lg">
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
<script src=<?php echo $acesso ."Scripts/requestajax.js"; ?>></script>
<script>
  //FormataClientes();
</script>
