<html>
<head>
    <meta charset="utf-8" />
    <title>Biblioteca USJ</title>
    <link rel="stylesheet" href="estilo/estiloIndex.css"/>

</head>

<body>
    <div id="cabecalho">
        <h1>Login Biblioteca USJ</h1>
    </div>
    <div class="formulario">
        <form name="login" method="POST" action="controlador/controladorLogin.php">
            <p>Login:<br/>
                <input type="text" name="login"></p>  
            <p>Senha:<br/>
                <input type="password" name="senha"></p>  
                <input type="submit" name="botao" value="Login">
        </form>
    </div>
    <div>
        <a href="novaSenha.php" >Esqueceu a senha?</a>
    </div>

    <?php
    if (isset($_GET['usuario'])){
        echo "<script>alert('Usuário inexistente')</script>";
    } elseif (isset($_GET['senha'])){
        echo "<script>alert('Senha inválida')</script>";
    }
    ?>
