<html>
<head>
    <meta charset="utf-8" />
    <title>Biblioteca USJ</title>
    <link rel="stylesheet" href="../estilo/estilo.css"/>

</head>

<body>
    <div id="cabecalho">
        <h1>Consulta de Aluno</h1>
    </div>
    <ul class="menu">
        <ul class="itens" id="menu1"><a href="#">Início</a></ul>
        <ul class="itens" id="menu2">Biblioteca</ul>
        <ul class="itens" id="menu2"><a href="#">Adicionar Visita</a></ul>
        <ul class="itens" id="menu2"><a href="#">Relatórios Externos</a></ul>
        <ul class="itens" id="menu2"><a href="#">Exportar Relatórios</a></ul>
        <ul class="itens" id="menu6">Configurações</ul>
        <ul class="itens" id="menu2"><a href="#">Trocar Senha</a></ul>
        <ul class="itens" id="menu2"><a href="#">Gerenciar Professor</a></ul>
        <ul class="itens" id="menu2"><a href="#">Adicionar Usuário</a></ul>

    </ul>
    <div class='formulario'>
        <div class='titulo'>Visitas</div>
        <form name='visita' method='POST' action=''>
            <p>Professor:</p>
                <input type='text' name='professor'/>
            <p>Tem Aluno?</p>
                <input type='radio' name='aluno' value='Sim'/>Sim
                <input type='radio' name='aluno' value='Não'/>Não
            <p>Quantidade de alunos</p>
                <input type='text' name='qtdAlunos'/>
            <p>Observações</p>
                <input type='text' name='observacao'/>
            <p><input type='submit' name='Enviar' value='Enviar'/></p>
            

        </form>
    </div>

</body>
</html>