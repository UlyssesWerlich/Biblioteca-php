<?php
    require_once '../database/connection.php';

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../includes/cabecalho.php');

    $login = $_GET['login'];

    $consulta = $pdo->prepare("select * from usuario where login like '$login'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){
        echo "
        <div class='bloco'>
            <p id='titulo'>Editar usuário</p>
            <div class='formulario'>
                <form name='usuario' method='POST' action='../controllers/usuario.php'>
                    <p>Id do usuário<br/>
                        <input class='campo' type='text' name='id_usuario' value='$row[id_usuario]' readonly></p>
                    <p>Nome<br/>
                        <input class='campo' type='text' name='nome' value='$row[nome]'></p>  
                    <p>Login<br/>
                        <input class='campo' type='text' name='login' value='$row[login]'></p>  
                    <p>CPF<br/>
                        <input class='campo' type='text' name='cpf' value='$row[cpf]'></p>  
                    <p>Telefone<br/>
                        <input class='campo' type='text' name='telefone' value='$row[telefone]'></p> 
                    <p>Selecione as permissões do usuário:<br/><br/>
                        <input name='permissaoV' type='checkbox' value='V' checked>Registrar Visita
                        <input name='permissaoO' type='checkbox' value='O'>Registrar Ocorrência
                        <input name='permissaoL' type='checkbox' value='L'>Quantitativo de livros
                        <input name='permissaoR' type='checkbox' value='R'>Relatórios
                        <input name='permissaoU' type='checkbox' value='U'>Gerenciar Usuário</p>
                    <input class='botao' type='submit' name='botao' value='Alterar'>
                    <input class='botao' type='submit' name='botao' value='Excluir'>
                </form>
            </div>
        </div>";
    }
?>
</body>
</html>
