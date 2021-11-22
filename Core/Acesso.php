<?php

class Acesso
{
    public static $rotassempermissoes = array('lll');

    public static function VerificarRestricao($rota = '')
    {

        // 0 EXISTE SESSÃO MAS NÃO TEM PERMISSÃO
        // 1 EXISTE SESSÃO E TEM PERMISSÃO
        // 2 NÃO EXISTE SESSÃO
        if (!isset($_SESSION['site'])){
            session_start();
        }
        if ((isset($_SESSION['site']))) {
            if (in_array($rota, self::$rotassempermissoes)) {
                return 0;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }
}
