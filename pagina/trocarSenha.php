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
        <ul class="opcao" id="menu1"><a href="paginaInicial.php">Início</a></ul>
        <ul class="titulo" id="titulo1">Biblioteca</ul>
        <ul class="opcao" id="menu2"><a href="adicionarVisita.php">Adicionar Visita</a></ul>
        <ul class="opcao" id="menu3"><a href="gerarRelatorio.php">Relatórios Externos</a></ul>
        <ul class="opcao" id="menu4"><a href="exportarRelatorio.php">Exportar Relatórios</a></ul>
        <ul class="titulo" id="titulo2">Configurações</ul>
        <ul class="opcao" id="menu5"><a href="trocarSenha.php">Trocar Senha</a></ul>
        <ul class="opcao" id="menu6"><a href="gerenciarProfessor.php">Gerenciar Professor</a></ul>
        <ul class="opcao" id="menu7"><a href="gerenciarUsuario.php">Gerenciar Usuário</a></ul>

    </ul>
    
    <h2>Trocar senha</h2>
    <div class='formulario'>
        <form method="POST" action='../controlador/controladorSenha.php'>
            <p>Senha atual</p>
                <input type='password' name='senhaAtual'>
            <p>Nova senha</p>
                <input type='password' name='novaSenha'>
            <p>Confirmar nova senha</p>
                <input type='password' name='confirmarNovaSenha'><br/><br/>
                <input type='submit' name='Senha' value='Trocar senha'>
        </form>
    </div>
</body>
</html>