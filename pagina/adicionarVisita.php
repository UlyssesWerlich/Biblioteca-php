<?php
session_start();

if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../index.php');
}
    $logado = $_SESSION['login'];

    $titulo = "Informar visita";
    include('../paginaBase/cabecalho.php');
?>
    <div class='formulario'>
        <form name='visita' method='POST' action='../controlador/controladorVisita.php'>
            <p>Quantidade de pessoas que entraram:</p>
                <input type='text' name='qtdPessoas'/>
            <p>Entrada de:<br/><br/>
                <input name="tipoEntrada" type="radio" value="professor">Professor
                <input name="tipoEntrada" type="radio" value="aluno">Aluno
            <p><input type='submit' name='botao' value='Cadastrar'/></p>
            

        </form>
    </div>
<?php
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>