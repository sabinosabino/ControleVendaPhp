<?php


class Clientes
{
    public $id = 0;
    public $nome = 0;
    public $tipo;
    public $apelido;
    public $endereco;
    public $bairro = 0;
    public $cidade;
    public $uf;
    public $cep;
    public $telefone_1;
    public $telefone_2;
    public $email;
    public $rg;
    public $cpf_cnpj;
    public $ssp_local;

    public function Listar($conn, $texto='')
    {
        try {
            $sql = "SELECT * from tbl_clientes WHERE nome like '%" .$texto ."%' order by nome";
            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            return $dados;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function ListarUnico($conn, $id=0)
    {
        try {
            $sql = "SELECT * from tbl_clientes WHERE Id=" .$id;
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
                $sql = "INSERT INTO tbl_clientes 
                (nome, 
                tipo, 
                apelido, 
                endereco, 
                bairro, 
                cidade, 
                uf, 
                cep, 
                telefone_1, 
                telefone_2, 
                email, 
                rg, 
                cpf_cnpj, 
                ssplocal) VALUES (
                ?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->nome,
                    $this->tipo,
                    $this->apelido,
                    $this->endereco,
                    $this->bairro,
                    $this->cidade,
                    $this->uf,
                    $this->cep,
                    $this->telefone_1,
                    $this->telefone_2,
                    $this->email,
                    $this->rg,
                    $this->cpf_cnpj,
                    $this->ssplocal
                ]);
                $conn = null;
                return 1;
            } else {

                $sql = "UPDATE tbl_clientes SET
                    nome=?,
                    tipo=?,
                    apelido=?,
                    endereco=?,
                    bairro=?,
                    cidade=?, 
                    uf=?, 
                    cep=?, 
                    telefone_1=?, 
                    telefone_2=?, 
                    email=?, 
                    rg=?,
                    cpf_cnpj=?, 
                    ssplocal=?
                    WHERE Id=?";
                $conn = Conexao::conectar();
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $this->nome,
                    $this->tipo,
                    $this->apelido,
                    $this->endereco,
                    $this->bairro,
                    $this->cidade,
                    $this->uf,
                    $this->cep,
                    $this->telefone_1,
                    $this->telefone_2,
                    $this->email,
                    $this->rg,
                    $this->cpf_cnpj,
                    $this->ssplocal,
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
            $sql = "DELETE FROM tbl_clientes WHERE Id=?";

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
