<?php
    require_once '../database/connection.php';

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../includes/cabecalho.php');

    $senha = $_POST['senhaAtual'];
    $senhaNova = $_POST['senhaNova'];
    $login = $_SESSION['login'];

    $verificarSenha = $pdo->prepare("SELECT login from usuario where login like '$login' and senha like '$senha';");
    $verificarSenha->execute();
    $resultado = $verificarSenha->fetchAll();

    if (!empty($resultado)){
        $alterarSenha=$pdo->prepare("update usuario set senha='$senhaNova' where login like '$login';");
        $alterarSenha->execute();
        $pdo = null;
    } else {
        header("Location: ../pagina/trocarSenha.php?false");
    }
?>

<div class='bloco'>
        <p id='titulo'>Editar usuário</p><br/>
        <p>Senha alterada com sucesso</p>
    </div>
</body>
</html>