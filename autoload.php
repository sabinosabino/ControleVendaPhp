<?php

//responsável por não precisar usando o requiere todo momento
//Registra a função na pilha de __autoload da SPL
spl_autoload_register(function ($nome_arquivo) {
    //no autoload verifica se o arquivo existe na pasta controller
    //com exetensão .php
    if (file_exists('Controllers/' . $nome_arquivo . '.php')) {
        //se o caminho Controllers/index.php existe
        require 'Controllers/' . $nome_arquivo . '.php';
    } elseif (file_exists('Core/' . $nome_arquivo . '.php')) {
        //se o caminho Core/Core.php existe
        require 'Core/' . $nome_arquivo . '.php';
    } elseif (file_exists('Models/' . $nome_arquivo . '/' . $nome_arquivo . '.php')) {
        //se o caminho Models/Clientes.php existe
        require 'Models/' . $nome_arquivo . '/' . $nome_arquivo . '.php';
    }
});
