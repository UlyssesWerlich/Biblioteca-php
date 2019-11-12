<?php

if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
    header("Location: ../index.php"); 
    exit;
}

$login = $_POST['login'];
$senha = $_POST['senha'];

try {
    $pdo =new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

    $consulta = $pdo->prepare("select login, senha from usuario where login like '$login'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){
        $senhaBanco = $row['senha'];
        if ($senha == $senhaBanco){
            header("Location: ../pagina/paginaInicial.php");
        } else {
            header("Location: ../index.php");
            echo "<script>alert('Senha inválida')</script>";
        }
    }

?>