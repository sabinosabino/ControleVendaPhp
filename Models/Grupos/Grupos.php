<?php


class Grupos
{
    public $id = 0;
    public $nome = 0;
    public $status;

    public function Listar($conn, $texto='')
    {
        try {
            $sql = "SELECT * from tbl_grupo WHERE NOME like '%" .$texto ."%' order by NOME";
            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            return $dados;
        } catch (Exception $e) {
            return 'Exceção capturada: '.$e->getMessage(). "\n";
        }
    }

    public function ListarUnico($conn, $id=0)
    {
        try {
            $sql = "SELECT * from tbl_grupo WHERE Id=" .$id;
            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            return $dados;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    public function Salvar($conn)
    {

        try {
            if ($this->id == 0 || $this->id == null) {
                $sql = "INSERT INTO tbl_grupo 
                (NOME, 
                STATUS) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->nome,
                    $this->status
                ]);
                $conn = null;
                return 1;
            } else {

                $sql = "UPDATE tbl_grupo SET
                    nome=?,
                    status=?
                    WHERE Id=?";
                $conn = Conexao::conectar();
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->nome,
                    $this->status,
                    $this->id
                ]);
                return 1;
            }
        } catch (Exception $e) {
            $mensagem = $e->getMessage();
            return $mensagem;
        }
    }

    public function deletar($conn)
    {
        
        try {
            $sql = "DELETE FROM tbl_grupo WHERE Id=?";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->id]);
            $conn = null;
            if (!$stmt->rowCount()){
                return 0;
            }else{
                return 1;
            }
            $conn = null;
        } catch (Exception $e) {
            $mensagem= $e->getMessage();
            return 'Exceção capturada: ' .$mensagem .'"\n"';
        }
    }
}
