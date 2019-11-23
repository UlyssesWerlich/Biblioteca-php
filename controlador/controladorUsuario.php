<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    $logado = $_SESSION['login'];

    $titulo = "Editar usuário";
    include('../paginaBase/cabecalho.php');

    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $botao = $_POST['botao'];
    $v = (isset($_POST['permissaoV']))?($_POST['permissaoV']):("");
    $o = (isset($_POST['permissaoO']))?($_POST['permissaoO']):("");
    $l = (isset($_POST['permissaoL']))?($_POST['permissaoL']):("");
    $r = (isset($_POST['permissaoR']))?($_POST['permissaoR']):("");
    $u = (isset($_POST['permissaoU']))?($_POST['permissaoU']):("");
    $permissao = "$v$o$l$r$u";


    try{
        $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    if ($botao == 'Excluir'){
        $id_usuario = $_POST['id_usuario'];
        $excluir = $pdo->prepare("delete from usuario where id_usuario = '$id_usuario'");
        $excluir->execute();
        $pdo = null;
        echo "<p>Usuário excluído com sucesso</p>";

    } elseif ($botao == 'Alterar'){
        $id_usuario = $_POST['id_usuario'];
        $inserir=$pdo->prepare("update usuario set nome='$nome', login='$login', cpf='$cpf', telefone='$telefone', permissao='$permissao' where id_usuario = $id_usuario;");
        $inserir->execute();
        $pdo = null;
        echo "<p>Dados do usuário alterado com sucesso</p>";

    } elseif ($botao =='Cadastrar') {
        $inserir=$pdo->prepare("Insert into usuario(nome, senha, login, cpf, telefone, permissao) Values('$nome', '123456','$login', '$cpf', '$telefone', '$permissao');");
        $inserir->execute();
        $pdo = null;
        echo "<p>Usuario adicionado com sucesso</p>";
    } else {
        echo "<p>Erro ao acessar o controlador</p>";
    }


	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
	$nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>