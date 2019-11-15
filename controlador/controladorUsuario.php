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
        <ul class="opcao" id="menu2"><a href="../pagina/adicionarVisita.php">Adicionar Visita</a></ul>
        <ul class="opcao" id="menu3"><a href="../pagina/gerarRelatorio.php">Relatórios Externos</a></ul>
        <ul class="opcao" id="menu4"><a href="../pagina/exportarRelatorio.php">Exportar Relatórios</a></ul>
        <ul class="titulo" id="titulo2">Configurações</ul>
        <ul class="opcao" id="menu5"><a href="../pagina/trocarSenha.php">Trocar Senha</a></ul>
        <ul class="opcao" id="menu6"><a href="../pagina/gerenciarProfessor.php">Gerenciar Professor</a></ul>
        <ul class="opcao" id="menu7"><a href="../pagina/gerenciarUsuario.php">Gerenciar Usuário</a></ul>

    </ul>
<?php

$nome = $_POST['nome'];
$login = $_POST['login'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$botao = $_POST['botao'];
$v = (isset($_POST['permissaoV']))?($_POST['permissaoV']):("");
$r = (isset($_POST['permissaoR']))?($_POST['permissaoR']):("");
$p = (isset($_POST['permissaoP']))?($_POST['permissaoP']):("");
$u = (isset($_POST['permissaoU']))?($_POST['permissaoU']):("");
$permissao = "$v$r$p$u";


try{
    $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
}catch(PDOException $e){
    echo $e->getMessage();
}

if ($botao == 'Excluir'){
    $id_usuario = $_POST['id_usuario'];
	$excluir = $pdo->prepare("delete from usuario where id_usuario = '$id_usuario'");
	$excluir->execute();
	$pdo = null;
	echo "<p>Usuário excluído com sucesso</p>";

} elseif ($botao == 'Alterar'){
    $id_usuario = $_POST['id_usuario'];
	$inserir=$pdo->prepare("update usuario set nome='$nome', login='$login', cpf='$cpf', telefone='$telefone', permissao='$permissao' where id_usuario = $id_usuario;");
	$inserir->execute();
	$pdo = null;
	echo "<p>Dados do usuário alterado com sucesso</p>";

} elseif ($botao =='Cadastrar') {
    $inserir=$pdo->prepare("Insert into usuario(nome, senha, login, cpf, telefone, permissao) Values('$nome', '123456','$login', '$cpf', '$telefone', '$permissao');");
	$inserir->execute();
	$pdo = null;
    echo "<p>Usuario adicionado com sucesso</p>";
} elseif ($botao =='Senha') {


    $inserir=$pdo->prepare("update usuario set senha='$senha' where login like '$login';");
	$inserir->execute();
	$pdo = null;
    echo "<p>Senha alterada com sucesso</p>";
} else {
    echo "<p>Erro ao acessar o controlador</p>";
}


	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';

?>

</body>
</html> 