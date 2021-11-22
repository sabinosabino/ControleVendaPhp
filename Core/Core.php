<?php
//criar uma classe Core
class Core
{
  //Essencial = Core
  //criar construtor
  //public static $grupos=array();

  public function __construct()
  {
    $this->run();
  }

  public function run()
  {
    //Verificando existe alguma informação na url (após o domímínio)

    if (isset($_GET['pag'])) {
      $url = htmlentities(addslashes($_GET['pag']));
    }

    //paramentro deve ser array
    $paramentro = array();
    //se entrar aqui é porque tem informação após o domínio
    if (!empty($url)) {
      //explode é semelhando ao split 
      $url = explode('/', $url);

      //pegamos s posição 0 do array e concatenamos com Controller
      $controller = $url[0] . 'Controller';
      //constante array_shift retira a posição zero do array e passa o da posição 1 para 0
      array_shift($url);

      //verifica se a posição 0 agora está definida e diferente de vazia
      if (isset($url[0]) && !empty($url[0])) {
        $metodo = $url[0];
        //usa o array_shift novamente
        array_shift($url);
      } else { // se não estiver definida e posição vazia
        $metodo = 'index';
      }

      //se sobrou alguma coisa no array após os shifts iremos entender como o 
      //paramentro solicitado (save, delete, insert...)

      if (count($url) > 0) {
        $paramentro = $url;
      }
    } else { //significa que ele digitou apenas o dominio
      $controller = 'homeController';
      $metodo = 'index';
    }


    //se ele não entrar verificar se ele digitou um domínio válido
    $caminho = '../Controllers/' . $controller . '.php';
    //verifica se o método não exite
    if (!file_exists($caminho) && !method_exists($controller, $metodo)) {
      //vai para pagina especiicada
      //header("Location:" . "/projetos/Erros/Erro404.html");
      //return;
    }

    $c = new $controller;
    //VERIFICA SE É O HOME DO SITE, SE FOR TODOS TERÃO ACESSO E SAIR AQUI MESMO;

    if ($controller == 'homeController') {
      call_user_func_array(array($c, $metodo), $paramentro);
      return;
    }
    //SE NÃO FAZ AS VERIFICAÇÕES
    $permissao = Acesso::VerificarRestricao($controller . '/' . $metodo);

    if ($permissao == 0) {
      header('Location: ../Menu/');
      return;
    } elseif ($permissao == 1) {
      call_user_func_array(array($c, $metodo), $paramentro);
    } elseif ($permissao == 2 && $controller == 'LoginController') {
      call_user_func_array(array($c, $metodo), $paramentro);
      return;
    } elseif ($permissao == 2) {
      header('Location: ../Login/');
      return;
    }
  }
}
