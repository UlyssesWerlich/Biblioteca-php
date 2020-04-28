<?php
    require_once '../database/connection.php';

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../includes/cabecalho.php');

    $qtdPessoas = $_POST['qtdPessoas'];
    $tipoEntrada = $_POST['tipoEntrada'];
    $botao = $_POST['botao'];

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:m:s');
    $inserir=$pdo->prepare("Insert into visita(qtdPessoas, dataVisita, tipoEntrada) Values('$qtdPessoas', '$data','$tipoEntrada');");
    $inserir->execute();
    $pdo = null;
?>
    <div class='bloco'>
        <p id='titulo'>Registrar Visita</p>
        <p><br/>Visita registrada com sucesso</p>
        <p><a href='../pagina/adicionarVisita.php'>Registrar próxima visita</a></p>
    </div>
</body>
</html>
