<?php


class Login
{
    protected $Login;
    protected $Senha;
    protected $LembrarMe;

    public function __construct($login, $senha, $lembrarMe = false)
    {
        $this->Login = $login;
        $this->Senha = $senha;
        $this->LembrarMe = $lembrarMe;
    }

    public function Logar()
    {
        try {
            $sql = "SELECT * from tbl_usuarios WHERE usuario='" . $this->Login . "' And senha='" . md5($this->Senha,false) . "'And status=1";

            $conn = Conexao::conectar();
            $query = $conn->query($sql);
            $dados = $query->fetch();
            $conn = null;
            if ($dados) {
                $this->CriarSessao();
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        } finally {
            $conn = null;
        }
    }

    private function CriarSessao()
    {
        if (!isset($_SESSION['site'])){
            session_reset();
        }
            $_SESSION["site"] = $this->Login;
            $this->CarregarGrupos();
    }

    private function CarregarGrupos()
    {
    }


    public function Listar()
    {
        try {
            $sql = "SELECT * from tbl_clientes order by nome";

            $conn = Conexao::conectar();
            $query = $conn->query($sql);
            $dados = $query->fetchAll();
            $conn = null;
            return $dados;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        } finally {
            $conn = null;
        }
    }



    public function Salvar()
    {


        try {
            $sql = "INSERT INTO tbl_vendas(
              idCliente,
              data_venda,
              valor_venda,
              detalhe_venda,
              tipo) VALUES(?,?,?,?,?)";

            $conn = Conexao::conectar();
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $this->idCliente,
                $this->data_venda,
                $this->valor_venda,
                $this->detalhe_venda,
                $this->tipo
            ]);
            $conn = null;
            return true;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        } finally {
            $conn = null;
        }
    }
}
