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
    <div class='listaUsuarios'>
        <h2>Usuários</h2>
        <?php

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            $consulta = $pdo->prepare("select nome, login, cpf, telefone from usuario");
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            foreach ($resultado as $row){
                echo "
                    <div>
                        <h3>$row[nome]</h3>
                        <p><a href='editarUsuario.php?login=$row[login]'>$row[login]</a><br/>
                        CPF: $row[cpf] <br/>
                        Telefone: $row[telefone] </p>
                    </div>
                ";
            }
            echo "<div>
                <p><a href='adicionarUsuario.php'>Adicionar Usuário</a></p>
            </div>";

        ?>

    </div>

</body>
</html>