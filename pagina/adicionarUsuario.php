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
    <h2>Adicionar usuário</h2>
    <div class='formulario'>
        <form name='usuario' method='GET' action='../controlador/controladorUsuario.php'>
            <p>Nome</p>
                <input type='text' name='nome'/>
            <p>Login</p>
                <input type='text' name='login'/>
            <p>CPF</p>
                <input type='text' name='cpf'/>
            <p>Telefone</p>
                <input type='text' name='telefone'/>
            <p>Selecione as permissões do usuário:<br/>
                <input name="permissaoV" type="checkbox" value="V">Adicionar visitas
                <input name="permissaoR" type="checkbox" value="R">Gerar relatório
                <input name="permissaoP" type="checkbox" value="P">Gerenciar Professor
                <input name="permissaoU" type="checkbox" value="U">Gerenciar Usuário</p>
            <p><input type='submit' name='Enviar' value='Enviar'/></p>
            
        </form>
    </div>

</body>
</html>