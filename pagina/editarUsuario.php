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
<?php

$login = $_GET['login'];

try {
    $pdo =new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

    $consulta = $pdo->prepare("select * from usuario where login like '$login'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){

        echo "<h2>Editar usuário</h2>
        <div class='formulario'>
            <form name='usuario' method='POST' action='../controlador/controladorUsuario.php'>";
        echo "<p>Id do usuário</p>
                <input type='text' name='id_usuario' value='$row[id_usuario]' readonly></p>";
        echo "<p>Nome<br/>
                <input type='text' name='nome' value='$row[nome]'></p>  
            <p>Login<br/>
                <input type='text' name='login' value='$row[login]'></p>  
            <p>CPF<br/>
                <input type='text' name='cpf' value='$row[cpf]'></p>  
            <p>Telefone<br/>
                <input type='text' name='telefone' value='$row[telefone]'></p> 
            <p>Selecione as permissões do usuário:<br/>
                <input name='permissaoV' type='checkbox' value='V'>Adicionar visitas
                <input name='permissaoR' type='checkbox' value='R'>Gerar relatório
                <input name='permissaoP' type='checkbox' value='P'>Gerenciar Professor
                <input name='permissaoU' type='checkbox' value='U'>Gerenciar Usuário</p>

            <input type='submit' name='botao' value='Alterar'>
            <input type='submit' name='botao' value='Excluir'>
        </form>
    </div>";
    }

?>

</body>
</html>