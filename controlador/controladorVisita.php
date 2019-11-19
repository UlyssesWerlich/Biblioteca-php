<?php

$titulo = "Registrar visita";
include('../paginaBase/cabecalho.php');

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

include('../paginaBase/rodape.php');
?>
