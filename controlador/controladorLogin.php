<?php

if (empty($_POST['login'])) {
    header("Location: ../index.php?usuario=false"); 
    exit;
}

$login = $_POST['login'];

try {
    $pdo =new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

    $consulta = $pdo->prepare("select login, senha from usuario where login like '$login'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    if (!empty($resultado)){
        foreach ($resultado as $row){
            $senhaBanco = $row['senha'];
            $senha = $_POST['senha'];
            if ($senha == $senhaBanco){
                header("Location: ../pagina/paginaInicial.php");
            } else {
                header("Location: ../index.php?senha=false");
            }
        }
    } else {
        header("Location: ../index.php?usuario=false");
    }

?>