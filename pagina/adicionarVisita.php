<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../paginaBase/cabecalho.php');
?>

    <div class='bloco'>
        <p id='titulo'>Informar visita</p>
        <div class='formulario'>
            <form name='visita' method='POST' action='../controlador/controladorVisita.php'>
                <p>Quantidade de pessoas que entraram:</p>
                    <input class='campo' type='text' size='6' name='qtdPessoas'/>
                <p>Entrada de:<br/><br/>
                    <input name="tipoEntrada" type="radio" value="professor" checked>Professor
                    <input name="tipoEntrada" type="radio" value="aluno">Aluno
                <p><input class='botao' type='submit' name='botao' value='Registrar'/></p>
            </form>
        </div>    
    </div>
</body>
</html>