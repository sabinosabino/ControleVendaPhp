<?php
if (isset($_GET['pag'])) {
    $url = htmlentities(addslashes($_GET['pag']));
}
$url = explode('/', $url);
if (count($url) == 3) {
    $a = '../../';
} else {
    $a = '../';
}
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarsite">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarsite">
            <ul class="nav navbar-nav">
                <li><a href=<?php echo $a . "Vendas/" ?>><span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Vendas</a></li>
                <li><a href=<?php echo $a . "Pagamentos/" ?>><span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Pagamentos</a></li>
                <li><a href=<?php echo $a . "Clientes/" ?>><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Clientes</a></li>
                <li><a href=<?php echo $a . "Menu/" ?>><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Painel</a></li>
                <li><a href=<?php echo $a . "Grupos/" ?>><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Grupos</a></li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../Usuarios/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuários</a>
                    <ul class="dropdown-menu">
                        <li><a href=<?php echo $a . "Usuarios/" ?>><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Lista de Usuarios</a></li>
                        <li><a href=<?php echo $a . "Usuarios/alterarsenha" ?>><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Alterar Senha</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=<?php echo $a . "home/sair" ?>><span class="glyphicon glyphicon-off" onclick=""></span> Sair </a></li>
            </ul>
        </div>
    </div>
</nav>