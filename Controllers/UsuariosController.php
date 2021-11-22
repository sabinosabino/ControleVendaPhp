<?php

include_once 'Models/connection.php';

class UsuariosController extends Controller
{
    //o home controller deve ter um index
    //porque criamos no Core
    public function index()
    {
        try {
            $usuarios = new Usuarios;
            $conn = Conexao::conectar();
            if (isset($_POST['nome'])) {
                $dados = $usuarios->Listar($conn, $_POST["nome"]);
            } else {
                $this->carregarTemplate('Usuarios/index', '../');
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
            if ($dt["statususer"] == 1) {
                $st = 'ATIVO';
            } else {
                $st = 'INATIVO';
            }
            $tag = $tag . '<tr>
            <td scope="row" hidden>' . $dt["iduser"] . '</td>
            <td style="width:10%;">' . $dt["usuario"] . '</td>
            <td style="width:10%;">' . $dt["grupo"] . '</td>
            <td style="width:10%;">' . $st . '</td>
            <td style="width:5%;"><a href="../Usuarios/editar/' . $dt["iduser"] . '" type="button" class="btn btn-info">Editar</td>
            </tr>';
        }
        $tag = $tag . '<tr><td><h2>Total Usuarios:::::::::::</h2></td><td><h2>' . count($dados) . '</h2></td></tr>';
        echo $tag;
    }

    public function novo()
    {
        $conn = Conexao::conectar();
        $grupos = new Grupos();
        $dados = $grupos->Listar($conn);
        $this->carregarTemplate('Usuarios/novo', '../', $dados);
    }

    public function editar($id = 0)
    {
        $usuarios = new Usuarios;
        $conn = Conexao::conectar();
        $dados = $usuarios->ListarUnico($conn, $id);
        $grupos = new Grupos();
        array_push($dados, $grupos->Listar($conn));
        $this->carregarTemplate('Usuarios/editar', '../../', $dados);
    }
    public function excluir($id = 0)
    {
        $usuarios = new Usuarios;
        $conn = Conexao::conectar();
        $dados = $usuarios->ListarUnico($conn, $id);
        $grupos = new Grupos();
        array_push($dados, $grupos->Listar($conn));
        $this->carregarTemplate('Usuarios/excluir', '../../', $dados);
    }

    public function deletar($id = 0)
    {
        $usuarios = new Usuarios;
        if (isset($_POST["ID"])) {
            $usuarios->id = $_POST["ID"];
        } else {
            return 0;
        }

        try {
            $conn = Conexao::conectar();
            echo $usuarios->deletar($conn);
            $conn = null;
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
    public function salvar()
    {

        $usuarios = new Usuarios;
        if (isset($_POST["id"])) {
            $usuarios->id = $_POST["id"];
        } else {
            $usuarios->id = 0;
        }
        $usuarios->usuario = $_POST["nome"];
        $usuarios->id_grupo = $_POST["id_grupo"];
        $usuarios->email = $_POST["email"];
        $usuarios->telefone_1 = $_POST["telefone_1"];
        $usuarios->telefone_2 = $_POST["telefone_2"];
        $usuarios->status = $_POST["status"];
        try {
            $conn = Conexao::conectar();
            echo $usuarios->salvar($conn);
            $conn = null;
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }

    public function alterarsenha()
    {
        $this->carregarTemplate('Usuarios/alterarsenha', '../');
    }

    public function TrocarSenha()
    {
        try {
            $usuarios = new Usuarios;
            if (isset($_POST["senhanova"]) && isset($_POST["confirmacaosenha"])) {
                if ($_POST["senhanova"] == $_POST["confirmacaosenha"]) {
                    if (!isset($_SESSION['site'])) {
                        session_start();
                    }
                    $usuarios->usuario = $_SESSION["site"];
                    $conn = Conexao::conectar();
                    echo $usuarios->TrocarSenha($conn, $_POST["senhanova"], $_POST["senhaantiga"]);
                    $conn = null;
                } else {
                    echo "Senhas são diferentes";
                }
            }
        } catch (Exception $e) {
            echo "Erro ao tentar salvar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
}
