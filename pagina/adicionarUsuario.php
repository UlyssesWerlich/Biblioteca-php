<?php
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
                <input name="permissaoV" type="checkbox" value="V">Adicionar visitas
                <input name="permissaoR" type="checkbox" value="R">Gerar relatório
                <input name="permissaoP" type="checkbox" value="P">Gerenciar Professor
                <input name="permissaoU" type="checkbox" value="U">Gerenciar Usuário</p>
            <p><input type='submit' name='botao' value='Cadastrar'/></p>
            
        </form>
    </div>
<?php
    include('../paginaBase/rodape.php');
?>
