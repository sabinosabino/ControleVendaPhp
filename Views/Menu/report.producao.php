<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 55%
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #708090;
        color: white;
    }
</style>

<!--INICIAR CABEÇALHO AQUI COMO IMAGEM OUTROS-->
<div>
    <span>
    </span>
    <span>
        <h1>Relatório de vendas e pagamentos</h1>
    </span>
</div>
<!--DETALHES DO RELATÓRIO COMO TABELA E OUTROS-->
<table id="customers">
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