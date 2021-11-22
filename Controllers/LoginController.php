<?php

include_once 'Models/connection.php';

class LoginController extends Controller
{

    public function index()
    {
        $this->carregarTemplate('Login/index', '../');
    }

    public function Logar()
    {
        $lembrarme=false;
        if (!isset($_POST["login"]) || $_POST["login"]==""){
            echo "Necessário Login...";
        }
        if (!isset($_POST["senha"]) || $_POST["senha"]==""){
            echo "Necessário Senha...";
        }

        if (isset($_POST["LembrarMe"])){
            $lembrarme=$_POST["LembrarMe"];
        }

        $login = new Login($_POST["login"], $_POST["senha"], $lembrarme);
        if($login->Logar()){
            if($_POST["senha"]==123456){
                echo 2;
                return;
            }
            echo 1;
        }else{
            echo 'Login ou senha inválido!';
        }

    }
    public function Menu()
    {
        $this->carregarTemplate('Menu/index', '../');
    }


}
