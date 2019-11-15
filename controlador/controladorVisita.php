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

$id_professor = $_POST['professor'];
$aluno = $_POST['aluno'];
$qtdAlunos = $_POST['qtdAlunos'];
$observacao = $_POST['observacao'];
$botao = $_POST['botao'];

try{
    $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
}catch(PDOException $e){
    echo $e->getMessage();
}
if ($botao =='Cadastrar') {

    $data = date('Y-m-d H:m:s');
    $inserir=$pdo->prepare("Insert into visita(qtdAlunos, dataVisita, observacao, id_professor) Values('$qtdAlunos', '$data','$observacao', '$id_professor');");
	$inserir->execute();
	$pdo = null;
    echo "<p>Visita cadastrada com sucesso</p>";
} else {
    echo "<p>Erro ao acessar o controlador</p>";
}
?>

</body>
</html> 