<?php
//Conector ao banco de dados, só precisa alterar os dados de conexão para usar outro banco
//----------------------------------------------------------------------------------------
class Conexao
{

  private static $conexao;
  private function __construct()
  {
  }

  //----------------------------------------------------------------------------------------
  public static function conectar()
  {

    try {

      if (is_null(self::$conexao)) {
        $drive = 'mysql';
        $host = 'localhost:3305';
        $bd = 'controleclientes';
        $user = 'root';
        $pwd = '';
        self::$conexao = new PDO($drive . ':host=' . $host . ';dbname=' . $bd, $user, $pwd);
        self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conexao->exec('set names utf8');
      }
      return self::$conexao;
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
    
  }
}
