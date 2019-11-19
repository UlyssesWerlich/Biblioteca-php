<?php

$titulo = "Registrar visita";
include('../paginaBase/cabecalho.php');

$ocorrencia = $_POST['ocorrencia'];
$tituloOcorrencia = $_POST['tituloOcorrencia'];
try{
    $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
}catch(PDOException $e){
    echo $e->getMessage();
    echo "<p>Erro ao registrar ocorrência</p>";
}

    $data = date('Y-m-d H:m:s');
    $inserir=$pdo->prepare("Insert into ocorrencia(titulo, ocorrencia, dataOcorrencia) Values('$tituloOcorrencia', '$ocorrencia', '$data');");
	$inserir->execute();
	$pdo = null;
    echo "<p>Ocorrência registrada com sucesso</p>";


include('../paginaBase/rodape.php');
?>
