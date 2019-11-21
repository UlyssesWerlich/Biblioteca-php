<?php 
session_start();

if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../index.php');
}
    $logado = $_SESSION['login'];

    $titulo = "Trocar senha";
    include('../paginaBase/cabecalho.php');
    
?>

    <div class='formulario'>
        <form method="POST" action='../controlador/controladorSenha.php'>
            <p>Senha atual</p>
                <input type='password' name='senhaAtual'>
            <p>Nova senha</p>
                <input type='password' name='novaSenha'>
            <p>Confirmar nova senha</p>
                <input type='password' name='confirmarNovaSenha'><br/><br/>
                <input type='submit' name='botao' value='Senha'>
        </form>
    </div>

<?php
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>