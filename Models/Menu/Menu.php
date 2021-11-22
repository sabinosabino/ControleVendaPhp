<?php


class Menu
{
    
    public function Listar($conn, $texto='')
    {
        try {
            $sql = "SELECT \n"
            . "        v.idCliente AS idCliente, c.nome,\n"
            . "        SUM(v.valor_venda) AS SomaVenda,\n"
            . "        SUM(v.valor_pago) AS somaPag,\n"
            . "        SUM(v.valor_venda) - SUM(v.valor_pago) AS diferenca\n"
            . " FROM\n"
            . "        tbl_vendas as v\n"
            . "	JOIN \n"
            . "		tbl_clientes as c\n"
            . "	ON \n"
            . "		v.idCliente=c.Id\n"
            . "    GROUP BY v.idCliente\n"
            . "    ORDER BY c.nome";


            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            return $dados;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

}
