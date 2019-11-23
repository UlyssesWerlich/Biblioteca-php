<?php

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }

    $titulo = "Adicionar usuário";
    include('../paginaBase/cabecalho.php');
?>
    <div class='formulario'>
        <form name='usuario' method='POST' action='../controlador/controladorUsuario.php'>
            <p>Nome</p>
                <input type='text' name='nome'/>
            <p>Login</p>
                <input type='text' name='login'/>
            <p>CPF</p>
                <input type='text' name='cpf'/>
            <p>Telefone</p>
                <input type='text' name='telefone'/>
            <p>Selecione as permissões do usuário:<br/>
                <input name="permissaoV" type="checkbox" value="V" checked>Registrar Visita
                <input name="permissaoO" type="checkbox" value="O">Registrar Ocorrência
                <input name="permissaoL" type="checkbox" value="L">Quantitativo de livros
                <input name="permissaoR" type="checkbox" value="R">Relatórios
                <input name="permissaoU" type="checkbox" value="U">Gerenciar Usuário</p>
            <p><input type='submit' name='botao' value='Cadastrar'/></p>
            
        </form>
    </div>
<?php
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>
