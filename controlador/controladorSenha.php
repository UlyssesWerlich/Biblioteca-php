<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
        $logado = $_SESSION['login'];

    $titulo = "Editar usuário";
    include('../paginaBase/cabecalho.php');

    $senhaAtual = $_POST['senhaAtual'];
    $senhaAtual = $_POST['senhaAtual'];
    $confirmarNovaSenha = $_POST['confirmarNovaSenha'];



    try{
        $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    $inserir=$pdo->prepare("update usuario set senha='$senha' where login like '$login';");
	$inserir->execute();
	$pdo = null;
    echo "<p>Senha alterada com sucesso</p>";
?>