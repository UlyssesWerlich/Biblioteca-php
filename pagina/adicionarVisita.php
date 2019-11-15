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

    <h2>Informar visita</h2>
    <div class='formulario'>
        <form name='visita' method='POST' action='../controlador/controladorVisita.php'>
            <p>Professor:</p>
                <input type='text' name='professor'/>
            <p>Tem Aluno?</p>
                <input type='radio' name='aluno' value='S'/>Sim
                <input type='radio' name='aluno' value='N'/>Não
            <p>Quantidade de alunos</p>
                <input type='text' name='qtdAlunos'/>
            <p>Observações</p>
                <input type='text' name='observacao'/>
            <p><input type='submit' name='botao' value='Cadastrar'/></p>
            

        </form>
    </div>

</body>
</html>