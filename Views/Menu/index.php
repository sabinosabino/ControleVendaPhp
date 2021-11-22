<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<div class="container">
  <form id="indexGrupos" class="col-md-12" method="POST">
    <div class="text-center text-primary col-md-12">
        <h1><strong><span class="glyphicon glyphicon-user"></span> Dashboard Vendas </strong></h1>
    </div>

    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />
    <a href="report" class="btn btn-primary btn-md" target="_blank"><span class="glyphicon glyphicon-print"></span>IMPRIMIR</a>
    <hr style="border: 0.1px #a7a8a886 solid; margin-top: 25px;" />
    <table class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col" hidden>Id Cliente</th>
          <th scope="col">Nome</th>
          <th scope="col">Total Venda</th>
          <th scope="col">Total Pago</th>
          <th scope="col">Falta Receber</th>
        </tr>
      </thead>
      <tbody id="resultado">
        <?php
        $totVenda = 0;
        $totPag = 0;
        $totDif = 0;
        foreach ($dadosModel as $dt) {
          $totVenda += $dt["SomaVenda"];
          $totPag += $dt["somaPag"];
          $totDif += $dt["diferenca"];

          if ($dt["diferenca"] > 0) {
            $cl = 'class="bg-success"';
          } else {
            $cl = '';
          }
          echo '<tr ';
          echo $cl . '>
              <td scope="row" hidden>' . $dt["idCliente"] . '</td>
              <td style="width:55%;">' . $dt["nome"] . '</td>
              <td style="width:15%;">R$ ' . number_format($dt["SomaVenda"], 2, ",", ".") . '</td>
              <td style="width:15%;">R$ ' .  number_format($dt["somaPag"], 2, ",", ".") . '</td>
              <td style="width:15%;">R$ ' . number_format($dt["diferenca"], 2, ",", ".") . '</td>
              </tr>';
        }

        echo '<tr>
        <td scope="row" hidden>' . '' . '</td>
        <td style="width:55%;"><H4>' . 'TOTAIS::::' . '</H1></td>
        <td style="width:15%;"><H4>R$ ' . number_format($totVenda, 2, ",", ".") . '</H4></td>
        <td style="width:15%;"><H4>R$ ' . number_format($totPag, 2, ",", ".") . '</H4></td>
        <td style="width:15%;"><H4>R$ ' . number_format($totDif, 2, ",", ".") . '</H4></td>
        </tr>';
        ?>
      </tbody>
    </table>

</div>
<script src=<?php echo "../Scripts/jquery.js"; ?>></script>
<script src=<?php echo "../Scripts/acoes.js"; ?>></script>
<script src=<?php echo "../Scripts/requestajax.js"; ?>></script>