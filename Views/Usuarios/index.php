<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<div class="container">
  <form id="indexUsuarios" class="col-md-12" method="POST">
    <div class="text-center text-primary">
      <h1><strong><span class="glyphicon glyphicon-user"></span> Relação de Usuários </strong></h1>
    </div>

    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />
    <div class="col-md-8">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira no nome">
      <div>
        <br />
        <div>
          <a href="../Usuarios/novo" class="btn btn-primary btn-md">
            <span class="glyphicon glyphicon-chevron-left"></span> Novo Registro..</a>
          <br />
          <br />
          <a href="../Menu/" class="btn btn-warning btn-md">
            <span class="glyphicon glyphicon-chevron-left"></span> Página Anterior</a>
        </div>
      </div>

    </div>
    <div class="col-md-2" id="qtd">

    </div>
    <div class="col-md-4">
      <br />
      <button type="submit" form="indexUsuarios" class="btn btn-link btn-lg"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
    </div>

  </form>
  <hr style="border: 0.1px #a7a8a886 solid;" class="col-md-12" />

  <table class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th scope="col" hidden>Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Grupo</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody id="resultado">

    </tbody>
  </table>

</div>
<script src=<?php echo "../Scripts/jquery.js"; ?>></script>
<script src=<?php echo "../Scripts/acoes.js"; ?>></script>
<script src=<?php echo "../Scripts/requestajax.js"; ?>></script>