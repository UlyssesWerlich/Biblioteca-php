<?php

session_start();

if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../index.php');
}
    $logado = $_SESSION['login'];

    $titulo = "Bem vindo";
    include('../paginaBase/cabecalho.php');
    
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>

