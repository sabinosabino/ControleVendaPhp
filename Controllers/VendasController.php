<?php

include_once 'Models/connection.php';

class VendasController extends Controller
{


    //o home controller deve ter um index
    //porque criamos no Core
    public function index()
    {
        //estamos passando um array para a variável dados
        //abrindo a view
        try {
            $vendas = new Vendas;
            $conn = Conexao::conectar();
            if (isset($_POST["nome"])) {
                $dados = $vendas->Listar($conn, $_POST["nome"]);
            } else {
                $this->carregarTemplate('Vendas/index', '../');
                return;
            }
            //monta um html
            $tag = '';
            foreach ($dados as $dt) {
                $date = new DateTime($dt["data_venda"]);
                $tag = $tag . '<tr>
                <td scope="row" hidden>' . $dt["Id"] . '</td>
                <td style="width:10%;">' . $date->format('d/m/Y')  . '</td>
                <td style="width:20%;">' . $dt["nome"]    . '</td>
                <td style="width:50%;">' . $dt["detalhe_venda"]  . '</td>
                <td style="width:10%;"> R$ ' . str_replace(".", ",", $dt["valor_venda"]) . '</td>
                <td style="width:5%;"><a href="../Vendas/editar/' . $dt["Id"] . '" type="button" class="btn btn-info">Editar</td>
                <td style="width:5%;"><a href="../Vendas/excluir/' . $dt["Id"] . '" type="button" class="btn btn-danger">Excluir</a></td>
                </tr>';
            }
            echo $tag;
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }


    public function novo()
    {
        $clientes = new Clientes;
        $conn = Conexao::conectar();
        $dados = $clientes->Listar($conn);
        $this->carregarTemplate('Vendas/novo', '../', $dados);
        try {
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function salvar()
    {
        try {
            $vendas = new Vendas;
            $conn = Conexao::conectar();
            if (isset($_POST["id"])) {

                $vendas->id = $_POST["id"];
            } else {
                $vendas->id = 0;
            }
            $vendas->idCliente = $_POST["idCliente"];
            $vendas->data_venda = $_POST["data"];
            $vendas->detalhe_venda = $_POST["detalhe_venda"];
            $valorvenda = $_POST["valor_venda"];
            $vendas->valor_venda = str_replace(",", ".", $valorvenda);
            $vendas->tipo = 1;
            $result = $vendas->salvar($conn);
            if ($result['nome'] == 1) {
                $dados = array('Registro salvo com sucesso!', 'Vendas');
                $this->carregarTemplate('Mensagens/sucesso', '../', $dados);
            } else {
                $dados = $result;
                $this->carregarTemplate('Mensagens/erro', '../', $dados);
            }
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function editar($id = 0)
    {
        try {
            $vendas = new Vendas;
            $conn = Conexao::conectar();
            $dados = $vendas->ListarUnico($conn, $id);
            $clientes = new Clientes;
            array_push($dados, $clientes->Listar($conn));
            $this->carregarTemplate('Vendas/editar', '../../', $dados);
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function deletar()
    {
        try {
            //$_POST["id"];
            $vendas = new Vendas;
            $conn = Conexao::conectar();
            if (isset($_POST["id"])) {
                $vendas->id = $_POST["id"];
                $result = $vendas->deletar($conn);
                if ($result['nome'] == 1) {
                    $dados = array('Registro excluido com sucesso!', 'Vendas');
                    $this->carregarTemplate('Mensagens/sucesso', '../', $dados);
                } else {
                    $dados = $result;
                    $this->carregarTemplate('Mensagens/erro', '../', $dados);
                }
            }
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function excluir($id = 0)
    {
        try {
            $vendas = new Vendas;
            $conn = Conexao::conectar();
            $dados = $vendas->ListarUnico($conn, $id);
            $clientes = new Clientes;
            array_push($dados, $clientes->Listar($conn));
            $this->carregarTemplate('Vendas/excluir', '../../', $dados);
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
}
