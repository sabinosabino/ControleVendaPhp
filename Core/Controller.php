<?php

class Controller
{
     public $dados;
     public $viewBag;

     public function __construct()
     {
          $this->dados = array();
     }

     public function carregarTemplate($nomeView, $acesso, $dadosModel = array())
     {
          $this->dados = $dadosModel;
          require 'Views/template/template.php';
     }

     public function carregarTemplateReport($nomeView, $acesso, $dadosModel = array())
     {
          $this->dados = $dadosModel;
          require 'Views/template/templateReport.php';
     }

     public function carregarViewTemplate($nomeView, $dadosModel = array(), $acesso = '')
     {
          require 'Views/' . $nomeView . '.php';
     }

     public function carregarnavbarsite()
     {
          require 'Views/template/navsite.php';
     }

     public function carregarnavbarsistema()
     {
          require 'Views/template/navsistema.php';
     }
}
