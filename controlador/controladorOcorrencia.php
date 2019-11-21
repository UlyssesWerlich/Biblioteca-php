<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }

    $logado = $_SESSION['login'];

    $titulo = "Registrar Ocorrência";
    include('../paginaBase/cabecalho.php');

    $ocorrencia = $_POST['ocorrencia'];
    $tituloOcorrencia = $_POST['tituloOcorrencia'];

    try{
        $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
    }catch(PDOException $e){
        echo "<p>Erro ao registrar ocorrência</p>";
        echo "<script> console('$e->getMessage()')";
    }

    $data = date('Y-m-d H:m:s');
    $inserir=$pdo->prepare("Insert into ocorrencia(titulo, ocorrencia, dataOcorrencia) Values('$tituloOcorrencia', '$ocorrencia', '$data');");
    $inserir->execute();
    $pdo = null;
    echo "<p>Ocorrência registrada com sucesso</p>
            <p><a href='../pagina/registrarOcorrencia.php'>Registrar próxima ocorrência</a></p>";

    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>
