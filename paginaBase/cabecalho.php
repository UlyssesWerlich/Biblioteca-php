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
        <ul class="opcao" id="menu1"><a href="../pagina/paginaInicial.php">Início</a></ul>
        <ul class="titulo" id="titulo1">Biblioteca</ul>
        <ul class="opcao" id="menu2"><a href="../pagina/adicionarVisita.php">Registrar Visita</a></ul>
        <ul class="opcao" id="menu3"><a href="../pagina/registrarOcorrencia.php">Registrar Ocorrência</a></ul>
        <ul class="opcao" id="menu4"><a href="../pagina/quantitativoLivro.php">Quantitativo de Livros</a></ul>
        <ul class="opcao" id="menu5"><a href="../pagina/gerarRelatorio.php">Relatórios Externos</a></ul>
        <ul class="titulo" id="titulo2">Configurações</ul>
        <ul class="opcao" id="menu6"><a href="../pagina/trocarSenha.php">Trocar Senha</a></ul>
        <ul class="opcao" id="menu7"><a href="../pagina/gerenciarUsuario.php">Gerenciar Usuário</a></ul>
        <ul class="opcao" id="menu8"><a href="../pagina/gerenciarUsuario.php">Log Out</a></ul>

    </ul>
    <h2><?php echo $titulo; ?></h2>