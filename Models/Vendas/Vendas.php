<?php

class Vendas
{
    public $id = 0;
    public $idCliente = 0;
    public $data_venda;
    public $valor_venda = 0;
    public $detalhes_venda;
    public $valor_pago = 0;
    public $detalhes_pagamento;
    public $tipo;

    public function Listar($conn, $texto='')
    {
        
        try {
            $sql = "SELECT tbl_clientes.nome, tbl_vendas.*  
            FROM tbl_vendas 
            INNER JOIN tbl_clientes 
            ON tbl_vendas.idCliente=tbl_clientes.id WHERE tbl_vendas.tipo=1 and tbl_clientes.nome like '%" .$texto ."%' order by data_venda desc";
            $query = $conn->query($sql);
            $dados=$query->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
    public function ListarUnico($conn, $id=0)
    {
        
        try {
            $sql = "SELECT * FROM tbl_vendas WHERE id=" .$id;

            $query = $conn->query($sql);
            $dados=$query->fetchAll();
            return $dados;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
    public function deletar($conn)
    {
        
        try {
            $sql = "DELETE FROM tbl_vendas WHERE Id=?";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->id]);
            if (!$stmt->rowCount()){
                return array('nome'=> 'Exceção capturada: Não foi possível realizar exclusão no momento.');
            }else{
                return array('nome'=>true);
            }
            
        } catch (Exception $e) {
            $mensagem= $e->getMessage();
            return array('nome'=> 'Exceção capturada: ' .$mensagem .'"\n"');
        }
    }
    public function Salvar($conn)
    {


        try {

            if ($this->id == 0) {
                $sql = "INSERT INTO tbl_vendas(
                    idCliente,
                    data_venda,
                    valor_venda,
                    detalhe_venda,
                    tipo) VALUES(?,?,?,?,?)";

                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->idCliente,
                    $this->data_venda,
                    $this->valor_venda,
                    $this->detalhe_venda,
                    $this->tipo
                ]);

                return array('nome'=>true);
            } else {
                $sql = "UPDATE tbl_vendas SET
                    idCliente=?,
                    data_venda=?,
                    valor_venda=?,
                    detalhe_venda=?,
                    tipo=?
                    WHERE Id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->idCliente,
                    $this->data_venda,
                    $this->valor_venda,
                    $this->detalhe_venda,
                    $this->tipo,
                    $this->id
                ]);

                return array('nome'=>true);
            }
        } catch (Exception $e) {
            $mensagem= $e->getMessage();
            return array('nome' => 'Exceção capturada: ' .$mensagem);
        }
    }
}
