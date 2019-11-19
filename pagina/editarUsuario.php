<?php
    $titulo = "Editar usuário";
    include('../paginaBase/cabecalho.php');

$login = $_GET['login'];

try {
    $pdo =new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

    $consulta = $pdo->prepare("select * from usuario where login like '$login'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){

        echo "
        <div class='formulario'>
            <form name='usuario' method='POST' action='../controlador/controladorUsuario.php'>";
        echo "<p>Id do usuário</p>
                <input type='text' name='id_usuario' value='$row[id_usuario]' readonly></p>";
        echo "<p>Nome<br/>
                <input type='text' name='nome' value='$row[nome]'></p>  
            <p>Login<br/>
                <input type='text' name='login' value='$row[login]'></p>  
            <p>CPF<br/>
                <input type='text' name='cpf' value='$row[cpf]'></p>  
            <p>Telefone<br/>
                <input type='text' name='telefone' value='$row[telefone]'></p> 
            <p>Selecione as permissões do usuário:<br/>
                <input name='permissaoV' type='checkbox' value='V'>Adicionar visitas
                <input name='permissaoR' type='checkbox' value='R'>Gerar relatório
                <input name='permissaoP' type='checkbox' value='P'>Gerenciar Professor
                <input name='permissaoU' type='checkbox' value='U'>Gerenciar Usuário</p>

            <input type='submit' name='botao' value='Alterar'>
            <input type='submit' name='botao' value='Excluir'>
        </form>
    </div>";
    }


    include('../paginaBase/rodape.php');
?>
