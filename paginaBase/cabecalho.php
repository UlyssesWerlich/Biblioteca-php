<?php

    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }

    $nome = $_SESSION['nome_usuario'];
    $permissao = $_SESSION['permissao'];
    $v = (substr_count($permissao, 'V') == 1)?("<a class='linkopcao' 
        href='../pagina/adicionarVisita.php'>Registrar Visita</a>"):("Registrar Visita");

    $o = (substr_count($permissao, 'O') == 1)?("<a class='linkopcao'
        href='../pagina/registrarOcorrencia.php'>Registrar Ocorrência</a>"):("Registrar Ocorrência");

    $l = (substr_count($permissao, 'L') == 1)?("<a class='linkopcao' 
        href='../pagina/quantitativoLivro.php'>Quantitativo de Livros</a>"):("Quantitativo de Livros");

    $r = (substr_count($permissao, 'R') == 1)?("<a class='linkopcao'
        href='../pagina/gerarRelatorio.php'>Relatórios Externos</a>"):("Relatórios Externos");

    $u = (substr_count($permissao, 'U') == 1)?("<a class='linkopcao'
        href='../pagina/gerenciarUsuario.php'>Gerenciar Usuário</a>"):("Gerenciar Usuário");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Biblioteca USJ</title>
    <link rel="stylesheet" href="../estilo/estilo.css"/>

</head>

<body>
    <div class="cabecalho">
        <p id='titulo'>USJ - Sistema de Registro de Entradas na Biblioteca</p>
        <!--    <p id='camponome'>Seja bem vindo, <?php //echo "$nome"?></p>-->
    </div>

    <div class="menu">
        <ul>
            <ul class="opcao" id="menu1"><a class='linkopcao' href="../pagina/paginaInicial.php">Início</a></ul>
            <ul class="subtitulo" id="titulo1">Biblioteca</ul>
            <ul class="opcao" id="menu2"><?php echo "$v"; ?></ul>
            <ul class="opcao" id="menu3"><?php echo "$o"; ?></ul>
            <ul class="opcao" id="menu4"><?php echo "$l"; ?></ul>
            <ul class="opcao" id="menu5"><?php echo "$r"; ?></ul>
            <ul class="subtitulo" id="titulo2">Configurações</ul>
            <ul class="opcao" id="menu6"><a class='linkopcao' href="../pagina/trocarSenha.php">Trocar Senha</a></ul>
            <ul class="opcao" id="menu7"><?php echo "$u"; ?></ul>
            <ul class="opcao" id="menu8"><a class='linkopcao' href="../controlador/logoff.php">Log Out</a></ul>

        </ul>
    </div>
