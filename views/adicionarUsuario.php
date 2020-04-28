<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../includes/cabecalho.php');
?>
    <div class='bloco'>
        <p id='titulo'>Adicionar usuário</p>
        <div class='formulario'>
            <form name='usuario' method='POST' action='../controllers/usuario.php'>
                <p>Nome<br/>
                    <input class='campo' type='text' name='nome'/></p>
                <p>Login<br/>
                    <input class='campo' type='text' name='login'/></p>
                <p>CPF<br/>
                    <input class='campo' type='text' name='cpf'/></p>
                <p>Telefone<br/>
                    <input class='campo' type='text' name='telefone'/></p>
                <p>Selecione as permissões do usuário:<br/><br/>
                    <input name="permissaoV" type="checkbox" value="V" checked>Registrar Visita
                    <input name="permissaoO" type="checkbox" value="O">Registrar Ocorrência
                    <input name="permissaoL" type="checkbox" value="L">Quantitativo de livros
                    <input name="permissaoR" type="checkbox" value="R">Relatórios
                    <input name="permissaoU" type="checkbox" value="U">Gerenciar Usuário</p>
                <p><input class='botao' type='submit' name='botao' value='Cadastrar'/></p>
            </form>
        </div>
    </div>
</body>
</html>
