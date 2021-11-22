<?php

include_once 'Models/connection.php';

class ClientesController extends Controller
{
    //o home controller deve ter um index
    //porque criamos no Core
    public function index()
    {
        try {
            $cliente = new Clientes;
            $conn = Conexao::conectar();
            if (isset($_POST['nome'])) {
                $dados = $cliente->Listar($conn, $_POST["nome"]);
            } else {
                $this->carregarTemplate('Clientes/index', '../');
                return;
            }
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
        //monta um html
        $tag = '';
        foreach ($dados as $dt) {
            $tag = $tag . '<tr>
            <td scope="row" hidden>' . $dt["Id"] . '</td>
            <td style="width:10%;">' . $dt["nome"] . '</td>
            <td style="width:10%;">' . $dt["telefone_1"] . '</td>
            <td style="width:20%;">' . $dt["cidade"]  . '-' . $dt["uf"]    . '</td>
            <td style="width:5%;"><a href="../Clientes/editar/' . $dt["Id"] . '" type="button" class="btn btn-info">Editar</td>
            <td style="width:5%;"><a href="../Clientes/excluir/' . $dt["Id"] . '" type="button" class="btn btn-danger">Excluir</a></td>
            </tr>';
        }
        $tag=$tag . '<tr><td><h2>Total clientes:::::::::::</h2></td><td><h2>' .count($dados) . '</h2></td></tr>';
        echo $tag;
    }

    public function novo()
    {
        $dados = Estados::Listar();
        $this->carregarTemplate('Clientes/novo', '../', $dados);
    }

    public function editar($id = 0)
    {
        try{
            $clientes = new Clientes;
            $conn = Conexao::conectar();
            $dados = $clientes->ListarUnico($conn, $id);
            array_push($dados, Estados::Listar());
            $this->carregarTemplate('Clientes/editar', '../../', $dados);
        }catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }

    }
    public function excluir($id = 0)
    {
        try{
            $clientes = new Clientes;
            $conn = Conexao::conectar();
            $dados = $clientes->ListarUnico($conn, $id);
            array_push($dados, Estados::Listar());
            $this->carregarTemplate('Clientes/excluir', '../../', $dados);
        }catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function deletar($id=0)
    {
        $cliente = new Clientes;
        if (isset($_POST["id"])) {
            $cliente->id = $_POST["id"];
        } else {
           return 0;
        }

        try {
            $conn = Conexao::conectar();
            echo $cliente->deletar($conn);
            $conn = null;
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }

    }
    public function salvar()
    {

        $cliente = new Clientes;
        if (isset($_POST["id"])) {
            $cliente->id = $_POST["id"];
        } else {
            $cliente->id = 0;
        }

        $cliente->nome = $_POST["nome"];
        $cliente->tipo = $_POST["tipo"];
        $cliente->apelido = $_POST["apelido"];
        $cliente->endereco = $_POST["endereco"];
        $cliente->bairro = $_POST["bairro"];
        $cliente->cidade = $_POST["cidade"];
        $cliente->uf = $_POST["uf"];
        $cliente->cep = $_POST["cep"];
        $cliente->telefone_1 = $_POST["telefone_1"];
        $cliente->telefone_2 = $_POST["telefone_2"];
        $cliente->email = $_POST["email"];
        $cliente->rg = $_POST["rg"];
        $cliente->cpf_cnpj = $_POST["cpf_cnpj"];
        $cliente->ssplocal = $_POST["ssplocal"];

        try {
            $conn = Conexao::conectar();
            echo $cliente->salvar($conn);
            $conn = null;
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    
}
