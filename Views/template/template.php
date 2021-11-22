<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Site</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href=<?php echo $acesso . "Estilos/bootstrap.css"; ?> rel="stylesheet">
    <link href=<?php echo $acesso . "Estilos/estilo.css"; ?> rel="stylesheet">
    <script src=<?php echo $acesso . "Scripts/jquery-3.4.1.js"; ?>></script>

</head>

<body>

    <?php
    if (explode('/', $nomeView)[0] == 'home') {
        $this->carregarnavbarsite();
    } else {
        $this->carregarnavbarsistema();
    }
    $this->carregarViewTemplate($nomeView, $dadosModel, $acesso);
    ?>


</body>

<script src=<?php echo $acesso . "Scripts/bootstrap.min.js"; ?>></script>

</html>