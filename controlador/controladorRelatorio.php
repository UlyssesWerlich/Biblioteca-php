<?php

$titulo = "Relatório";
include('../paginaBase/cabecalho.php');

$dataInicio = (empty($_POST['dataInicio']))?(date('Y-m-d')):($_POST['dataInicio']);
$dataFim = (empty($_POST['dataFim']))?(date('Y-m-d')):($_POST['dataFim']);
$tipo = $_POST['tipo'];

try{
    $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
}catch(PDOException $e){
    echo "<p>Erro ao gerar relatório</p>";
    echo "<script> console('$e->getMessage()')</script>";
}


if ($tipo == 'visita'){
    $consulta=$pdo->prepare("select * from visita
                                where dataVisita BETWEEN ('$dataInicio') AND ('$dataFim') 
                                ORDER  BY dataVisita DESC;");
    $consulta->execute();
    $resultado = $verificar->fetchAll();

} else if ($tipo == 'ocorrencia'){
    $consulta=$pdo->prepare("select * from ocorrencia 
                                where dataOcorrencia BETWEEN ('$dataInicio') AND ('$dataFim') 
                                ORDER  BY dataOcorrencia DESC;");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){
        echo "
            <div class='blocoUsuarios'>
                <h3>$row[titulo]</h3>
                $row[ocorrencia] <br/>
                $row[dataOcorrencia] <br/>
                $row[id_ocorrencia] </p>
            </div>
        ";
        /*
            <p><a href='editarUsuario.php?login=$row[login]'>$row[login]</a><br/> 
        */
    }

} else if ($tipo == 'livro'){
    $consulta=$pdo->prepare("select * from qtdlivros 
                                where dataRegistro BETWEEN ('$dataInicio') AND ('$dataFim') 
                                ORDER  BY dataRegistro DESC;");
    $consulta->execute();
    $resultado = $verificar->fetchAll();

} else {

}

    echo "<p><a href='../pagina/gerarRelatorio.php'>Gerar outro relatório</a></p>";
    
    $pdo = null;
include('../paginaBase/rodape.php');
?>