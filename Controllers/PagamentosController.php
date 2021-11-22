<?php

include_once 'Models/connection.php';

class PagamentosController extends Controller
{


    //o home controller deve ter um index
    //porque criamos no Core
    public function index()
    {
        //estamos passando um array para a variável dados
        //abrindo a view
        try {
            $pagamentos = new Pagamentos;
            $conn = Conexao::conectar();
            if (isset($_POST["nome"])) {
                $dados = $pagamentos->Listar($conn, $_POST["nome"]);
            } else {
                $this->carregarTemplate('Pagamentos/index', '../');
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
                <td style="width:50%;">' . $dt["detalhes_pagamento"]  . '</td>
                <td style="width:10%;"> R$ ' . str_replace(".", ",", $dt["valor_pago"]) . '</td>
                <td style="width:5%;"><a href="../Pagamentos/editar/' . $dt["Id"] . '" type="button" class="btn btn-info">Editar</td>
                <td style="width:5%;"><a href="../Pagamentos/excluir/' . $dt["Id"] . '" type="button" class="btn btn-danger">Excluir</a></td>
                </tr>';
            }
            echo $tag;
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function filtrar()
    {
    }

    public function novo()
    {
        try {
            $clientes = new Clientes;
            $conn = Conexao::conectar();
            $dados = $clientes->Listar($conn);
            $this->carregarTemplate('Pagamentos/novo', '../', $dados);
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function salvar()
    {
        try {
            $pagamentos = new Pagamentos;
            $conn = Conexao::conectar();
            if (isset($_POST["id"])) {

                $pagamentos->id = $_POST["id"];
            } else {
                $pagamentos->id = 0;
            }
            $pagamentos->idCliente = $_POST["idCliente"];
            $pagamentos->data_venda = $_POST["data"];
            $pagamentos->detalhes_pagamento = $_POST["detalhes_pagamento"];
            $valorvenda = $_POST["valor_pago"];
            $pagamentos->valor_pago = str_replace(",", ".", $valorvenda);
            $pagamentos->tipo = 0;
            $result = $pagamentos->salvar($conn);
            if ($result['nome'] == 1) {
                $dados = array('Registro salvo com sucesso!', 'Pagamentos');
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
            $pagamentos = new Pagamentos;
            $conn = Conexao::conectar();
            $dados = $pagamentos->ListarUnico($conn, $id);
            $clientes = new Clientes;
            array_push($dados, $clientes->Listar($conn));
            $this->carregarTemplate('Pagamentos/editar', '../../', $dados);
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }


    public function deletar()
    {
        //$_POST["id"];
        try {
            $pagamentos = new Pagamentos;
            $conn = Conexao::conectar();
            if (isset($_POST["id"])) {
                $pagamentos->id = $_POST["id"];
                $result = $pagamentos->deletar($conn);
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
            $pagamentos = new Pagamentos;
            $conn = Conexao::conectar();
            $dados = $pagamentos->ListarUnico($conn, $id);
            $clientes = new Clientes;
            array_push($dados, $clientes->Listar($conn));
            $this->carregarTemplate('Pagamentos/excluir', '../../', $dados);
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
}
