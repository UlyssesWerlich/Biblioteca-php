<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

echo "$login<br/>$senha";

try {
    $pdo =new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

    $consulta = $pdo->prepare("select login, senha from usuario where id_usuario like '$id_usuario'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){

    };

?>