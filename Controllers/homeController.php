<?php

class homeController extends Controller
{


    //o home controller deve ter um index
    //porque criamos no Core
    public function index()
    {
        //estamos passando um array para a variável dados
        //abrindo a view
        $this->carregarTemplate('home/index', "");
    }

    public function sobre()
    {
        //estamos passando um array para a variável dados
        //abrindo a view
        $this->carregarTemplate('home/sobre', '../');
    }

    public function sair()
    {
    //GAMBIARRA RESOVLER
    if (!isset($_SESSION['site'])) {
        session_start();
      }
      session_destroy();
      header('Location: ..');
    }
}
