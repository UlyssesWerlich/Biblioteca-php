<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Biblioteca USJ</title>
    <link rel="stylesheet" href="estilo/estiloIndex.css"/>
</head>

<body>
    <div class="caixa">
        <div id='cabecalho'>
            <img id='logo' src='../estilo/imagens/logo.png' alt='Logo USJ'>
            <p id='titulo'>Registro de Entrada da Biblioteca</p>
        </div>


        <div class='login'>
            <form name="login" method="POST" action="controllers/login.php">
                <p>Usuário<br/>
                    <input class='campo' type="text" name="login"></p>  
                <p>Senha<br/>
                    <input class='campo' type="password" name="senha"></p> 
                <p><input id='botao' type="submit" name="botao" value="Entrar"></p>
            </form>
        </div>
        <div>
            <br/><a href="novaSenha.php" >Esqueceu a senha?</a>
        </div>
    </div>



    <script>
        function validarSenha(input){
        if(input.valueOf !== document.getElementById("senha").value){
            input.setCustomValidity('Senha não são iguais, favor repita!');
        }else{
            input.setCustomValidity('');
        }
    }
    </script>

<?php
    if (isset($_GET['usuario'])){
        echo "<script>alert('Usuário inexistente')</script>";
    } elseif (isset($_GET['senha'])){
        echo "<script>alert('Senha inválida')</script>";
    }
?>

</body>
</html>
