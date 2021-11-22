<?php

include_once 'Models/connection.php';

class GruposController extends Controller
{
    //o home controller deve ter um index
    //porque criamos no Core
    public function index()
    {
        try {
            $grupos = new Grupos;
            $conn = Conexao::conectar();
            if (isset($_POST['nome'])) {
                $dados = $grupos->Listar($conn, $_POST["nome"]);
            } else {
                $this->carregarTemplate('Grupos/index', '../');
                return;
            }
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
        //monta um html
        $tag = '';
        $st = '';
        foreach ($dados as $dt) {
            if ($dt["STATUS"] == 1) {
                $st = 'ATIVO';
            } else {
                $st = 'INATIVO';
            }
            $tag = $tag . '<tr>
            <td scope="row" hidden>' . $dt["ID"] . '</td>
            <td style="width:10%;">' . $dt["NOME"] . '</td>
            <td style="width:10%;">' . $st . '</td>
            <td style="width:5%;"><a href="../Grupos/editar/' . $dt["ID"] . '" type="button" class="btn btn-info">Editar</td>
            <td style="wIDth:5%;"><a href="../Grupos/excluir/' . $dt["ID"] . '" type="button" class="btn btn-danger">Excluir</a></td>
            </tr>';
        }
        $tag = $tag . '<tr><td><h2>Total Grupos:::::::::::</h2></td><td><h2>' . count($dados) . '</h2></td></tr>';
        echo $tag;
    }

    public function novo()
    {
        $this->carregarTemplate('Grupos/novo', '../');
    }

    public function editar($id = 0)
    {
        $grupos = new Grupos;
        $conn = Conexao::conectar();
        $dados = $grupos->ListarUnico($conn, $id);
        array_push($dados, Estados::Listar());
        $this->carregarTemplate('Grupos/editar', '../../', $dados);
    }
    public function excluir($id = 0)
    {
        $grupos = new Grupos;
        $conn = Conexao::conectar();
        $dados = $grupos->ListarUnico($conn, $id);
        array_push($dados, Estados::Listar());
        $this->carregarTemplate('Grupos/excluir', '../../', $dados);
    }

    public function deletar($id = 0)
    {
        $grupos = new Grupos;
        if (isset($_POST["ID"])) {
            $grupos->id = $_POST["ID"];
        } else {
            return 0;
        }

        try {
            $conn = Conexao::conectar();
            echo $grupos->deletar($conn);
            $conn = null;
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    public function salvar()
    {

        $grupos = new Grupos;
        if (isset($_POST["id"])) {
            $grupos->id = $_POST["id"];
        } else {
            $grupos->id = 0;
        }
        $grupos->nome = $_POST["nome"];
        $grupos->status = $_POST["status"];

        try {
            $conn = Conexao::conectar();
            echo $grupos->salvar($conn);
            $conn = null;
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
}
