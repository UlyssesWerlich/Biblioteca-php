<?php
    require_once '../database/connection.php';

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    $titulo = "Registrar Quantitativo de Livros";
    include('../includes/cabecalho.php');

    $livrosEmprestados = $_POST['livrosEmprestados'];
    $livrosDevolvidos = $_POST['livrosDevolvidos'];
    $livrosNovos = $_POST['livrosNovos'];

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $verificar=$pdo->prepare("select * from qtdlivros where dataRegistro like '$data'");
    $verificar->execute();
    $resultado = $verificar->fetchAll();
?>

    <div class='bloco'>
        <p id='titulo'>Registrar quantitativo de livros</p>

<?php
    if (empty($resultado)){
        $data = date('Y-m-d');
        $inserir=$pdo->prepare("Insert into qtdlivros(livrosEmprestados, livrosDevolvidos, livrosNovos, dataRegistro) Values('$livrosEmprestados', '$livrosDevolvidos', '$livrosNovos','$data');");
        $inserir->execute();
        $pdo = null;
        echo "<p>Quantitativo de livros registrada com sucesso</p>";
    } else {
        echo "<p>Não foi possível registrar Quantitativo de livros, já existe registro no dia de hoje</p>";
    }
?>
    </div>
</body>
</html>