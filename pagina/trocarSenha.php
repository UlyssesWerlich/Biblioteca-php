<?php 
    $titulo = "Trocar senha";
    include('../paginaBase/cabecalho.php');
    
?>

    <div class='formulario'>
        <form method="POST" action='../controlador/controladorSenha.php'>
            <p>Senha atual</p>
                <input type='password' name='senhaAtual'>
            <p>Nova senha</p>
                <input type='password' name='novaSenha'>
            <p>Confirmar nova senha</p>
                <input type='password' name='confirmarNovaSenha'><br/><br/>
                <input type='hidden' name='login' value=''>
                <input type='submit' name='botao' value='Senha'>
        </form>
    </div>

<?php
    include('../paginaBase/rodape.php');
?>