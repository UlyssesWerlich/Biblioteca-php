<?php

session_start();

if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../index.php');
}
    include('../paginaBase/cabecalho.php');
?>

<h2>Bem vindo</h2>

