<?php
    require_once '../database/connection.php';

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../includes/cabecalho.php');

    $ocorrencia = $_POST['ocorrencia'];
    $tituloOcorrencia = $_POST['tituloOcorrencia'];

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:m:s');
    $inserir=$pdo->prepare("Insert into ocorrencia(titulo, ocorrencia, dataOcorrencia) Values('$tituloOcorrencia', '$ocorrencia', '$data');");
    $inserir->execute();
    $pdo = null;
?>

    <div class='bloco'>
        <p id='titulo'>Registrar Ocorrência</p>
        <p><br/>Ocorrência registrada com sucesso</p>
        <p><a href='../pagina/registrarOcorrencia.php'>Registrar próxima ocorrência</a></p>
    </div>
</body>
</html>
