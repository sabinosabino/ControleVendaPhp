
<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<div class="container">
  <form id="indexVendas" class="col-md-12" method="post">
    <div class="text-center text-primary">
      <h1><strong><span class="glyphicon glyphicon-th"></span> Relação de Vendas </strong></h1>
    </div>

    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />
    <div class="col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira no nome">
    </div>

    <div class="col-md-2">
      <label for="dtInicial">Data inicial</label>
      <input type="date" class="form-control" id="dtInicial" name="dtInicial">
    </div>

    <div class="col-md-2">
      <label for="dtFinal">Data Final</label>
      <input type="date" class="form-control" id="dtFinal" name="dtFinal">
    </div>

    <div class="col-md-2">
      <br />
      <button type="submit" form="indexVendas" class="btn btn-link btn-lg"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
    </div>
    <div class="col-md-2" style="margin-bottom: 25px;">
      <a href="../Vendas/novo" class="btn btn-primary btn-md">
        <span class="glyphicon glyphicon-chevron-left"></span> Novo Registro</a>
    </div>
  </form>
  <hr style="border: 0.1px #a7a8a886 solid;" class="col-md-12" />

  <table class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th scope="col" hidden>Id</th>
        <th scope="col">Data</th>
        <th scope="col">Nome</th>
        <th scope="col">Detalhes</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody id="resultado">


      
    </tbody>
  </table>
  <div class="col-md-2">
      <a href="../Menu/" class="btn btn-defaul btn-md">
        <span class="glyphicon glyphicon-chevron-left"></span> Página Anterior</a>
    </div>
</div>
<script src=<?php echo "../Scripts/jquery.js"; ?>></script>
<script src=<?php echo "../Scripts/acoes.js"; ?>></script>