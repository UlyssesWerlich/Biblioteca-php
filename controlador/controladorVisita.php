<?php

$titulo = "Registrar Visita";
include('../paginaBase/cabecalho.php');

$qtdPessoas = $_POST['qtdPessoas'];
$tipoEntrada = $_POST['tipoEntrada'];
$botao = $_POST['botao'];

try{
    $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
}catch(PDOException $e){
    echo "<p>Erro ao acessar o controlador</p>";
    echo "<script> console('$e->getMessage()')";
}

    $data = date('Y-m-d H:m:s');
    $inserir=$pdo->prepare("Insert into visita(qtdPessoas, dataVisita, tipoEntrada) Values('$qtdPessoas', '$data','$tipoEntrada');");
	$inserir->execute();
	$pdo = null;
    echo "<p>Visita registrada com sucesso</p><br/>
            <p><a href='../pagina/adicionarVisita.php'>Registrar próxima visita</a></p>";


include('../paginaBase/rodape.php');
?>
