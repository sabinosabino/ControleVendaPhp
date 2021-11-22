<?php


class Estados
{


    public static function Listar()
    {
        try {
            $sql = "SELECT * from tbl_estado";

            $conn = Conexao::conectar();
            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            $conn = null;
            return $dados;

        } catch (Exception $e) {
            return 'Exceção capturada: '. $e->getMessage(). "\n";
        }
    }
}
