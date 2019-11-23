<?php

    if (empty($_POST['login'])) {
        header("Location: ../index.php?usuario=false"); 
        exit;
    }

    session_start();
    $login = $_POST['login'];

    try {
        $pdo =new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $consulta = $pdo->prepare("select login, senha, nome, permissao from usuario where login like '$login'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    if (!empty($resultado)){

        foreach ($resultado as $row){
            $senhaBanco = $row['senha'];
            $senha = $_POST['senha'];

            if ($senha == $senhaBanco){
                $_SESSION['nome_usuario'] = $row['nome'];
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                $_SESSION['permissao'] = $row['permissao'];

                header("Location: ../pagina/paginaInicial.php");

            } else {
                unset ($_SESSION['nome_usuario']);
                unset ($_SESSION['login']);
                unset ($_SESSION['senha']);
                header("Location: ../index.php?senha=false");
            }
        }

    } else {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header("Location: ../index.php?usuario=false");
    }

?>