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
        <form id='senhaForm' method="POST" action='../controlador/controladorSenha.php'>
            <p>Senha atual</p>
                <input type='password' id='senhaAtual' name='senhaAtual' required/>
            <p>Nova senha</p>
                <input type='password' id='senhaNova' name='senhaNova' required/>
            <p>Confirmar nova senha</p>
                <input type='password' oninput='validarSenha1()' id='confirmarNovaSenha' name='confirmarNovaSenha' required><span id='validar'> </span><br/><br/>
                <input type='button' onClick='validarSenha()' value='Alterar senha' name='botao'/>
        </form>

    </div>

    <script language="javascript">
        function validarSenha1(){
            NovaSenha = document.getElementById('senhaNova').value;
            CNovaSenha = document.getElementById('confirmarNovaSenha').value;
            if (NovaSenha !== CNovaSenha) {
                document.getElementById('validar').innerHTML = "   Senhas incompatíveis";
            }else{
                document.getElementById('validar').innerHTML = "";
            }
        }

        function validarSenha(){
            NovaSenha = document.getElementById('senhaNova').value;
            CNovaSenha = document.getElementById('confirmarNovaSenha').value;

            if (NovaSenha !== CNovaSenha) {
                alert("Senhas diferentes, favor repetir a operação"); 
            }else{
                document.getElementById('senhaForm').submit();
            }
        }
    </script>

<?php
    if (isset($_GET['false'])){
        echo "<script>alert('Senha atual do usuário inválida');</script>";
    }
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>