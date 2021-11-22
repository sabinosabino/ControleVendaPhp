<?php


class Usuarios
{
    public $id = 0;
    public $usuario = '';
    public $id_grupo = 0;
    public $status = 0;
    public $email = '';
    public $telefone_1;
    public $telefone_2;

    public function Listar($conn, $texto = '')
    {
        try {
            $sql = "SELECT tbl_usuarios.id as iduser, usuario, tbl_grupo.NOME as grupo, 
            tbl_usuarios.status as statususer 
            FROM tbl_usuarios JOIN tbl_grupo 
            ON tbl_grupo.ID=tbl_usuarios.ID_GRUPO 
            WHERE usuario like '%" . $texto . "%' ORDER BY usuario";
            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            return $dados;
        } catch (Exception $e) {
            return 'Exceção capturada: ' . $e->getMessage() . "\n";
        }
    }

    public function ListarUnico($conn, $id = 0)
    {
        try {
            $sql = "SELECT * from tbl_usuarios WHERE id=" . $id;
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
                $sql = "INSERT INTO tbl_usuarios 
                (usuario, senha, ID_GRUPO, status, email, telefone_1, telefone_2) VALUES (?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->usuario,
                    md5(123456, false),
                    $this->id_grupo,
                    $this->status,
                    $this->email,
                    $this->telefone_1,
                    $this->telefone_2
                ]);
                return 1;
            } else {

                $sql = "UPDATE tbl_usuarios SET
                    usuario=?,
                    ID_GRUPO=?,
                    status=?,
                    email=?,
                    telefone_1=?,
                    telefone_2=?
                    WHERE id=?";
                $conn = Conexao::conectar();
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->usuario,
                    $this->id_grupo,
                    $this->status,
                    $this->email,
                    $this->telefone_1,
                    $this->telefone_2,
                    $this->id
                ]);
                return 1;
            }
        } catch (Exception $e) {
            $mensagem = $e->getMessage();
            return $mensagem;
        }
    }

    public function TrocarSenha($conn, $novasenha, $senhaantiga)
    {
        try {
            $sql = "UPDATE tbl_usuarios SET
                    senha=?
                    WHERE usuario=? and senha=?";
            $conn = Conexao::conectar();
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                md5($novasenha),
                $this->usuario,
                md5($senhaantiga)
            ]);
            return 1;
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
            if (!$stmt->rowCount()) {
                return 0;
            } else {
                return 1;
            }
            $conn = null;
        } catch (Exception $e) {
            $mensagem = $e->getMessage();
            return 'Exceção capturada: ' . $mensagem . '"\n"';
        }
    }
}
