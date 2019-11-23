<?php

    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }

    $permissao = $_SESSION['permissao'];
    $v = (substr_count($permissao, 'V') == 1)?("../pagina/adicionarVisita.php"):("");
    $o = (substr_count($permissao, 'O') == 1)?("../pagina/registrarOcorrencia.php"):("");
    $l = (substr_count($permissao, 'L') == 1)?("../pagina/quantitativoLivro.php"):("");
    $r = (substr_count($permissao, 'R') == 1)?("../pagina/gerarRelatorio.php"):("");
    $u = (substr_count($permissao, 'U') == 1)?("../pagina/gerenciarUsuario.php"):("");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Biblioteca USJ</title>
    <link rel="stylesheet" href="../estilo/estilo.css"/>

</head>

<body>
    <div id="cabecalho">
        <h1>USJ</h1>
    </div>
    <ul class="menu">
        <ul class="opcao" id="menu1"><a href="../pagina/paginaInicial.php">Início</a></ul>
        <ul class="titulo" id="titulo1">Biblioteca</ul>
        <ul class="opcao" id="menu2"><a href="<?php echo "$v"; ?>">Registrar Visita</a></ul>
        <ul class="opcao" id="menu3"><a href="<?php echo "$o"; ?>">Registrar Ocorrência</a></ul>
        <ul class="opcao" id="menu4"><a href="<?php echo "$l"; ?>">Quantitativo de Livros</a></ul>
        <ul class="opcao" id="menu5"><a href="<?php echo "$r"; ?>">Relatórios Externos</a></ul>
        <ul class="titulo" id="titulo2">Configurações</ul>
        <ul class="opcao" id="menu6"><a href="../pagina/trocarSenha.php">Trocar Senha</a></ul>
        <ul class="opcao" id="menu7"><a href="<?php echo "$u"; ?>">Gerenciar Usuário</a></ul>
        <ul class="opcao" id="menu8"><a href="../controlador/logoff.php">Log Out</a></ul>

    </ul>

    <h2><?php echo $titulo; ?></h2>