<?php

session_start();
if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../index.php');
}
    $logado = $_SESSION['login'];

    $titulo = "Gerar Relatório";
    include('../paginaBase/cabecalho.php');

?>

    <div class='formulario'>
        <form name='visita' method='POST' action='../controlador/controladorRelatorio.php'>
            <p>Data de início da consulta<br>
                <input type="date" name="dataInicio" size="10" maxlength="10" minlength="10"> </p>
            </p>

            <p>Data de final da consulta<br>
                <input type="date" name="dataFim" size="10" maxlength="10" minlength="10"> </p>
            </p>
            <p>Selecione o tipo de relatório<br/>
                <input name="tipo" type="radio" value="visita">Relatório de Visitas<br/>
                <input name="tipo" type="radio" value="ocorrencia">Relatório de Ocorrências<br/>
                <input name="tipo" type="radio" value="livro">Relatório de Quantitativo de Livros</p>
            <p>
                <input type='submit' name='botao' value='Gerar relatório'/>
            </p>
            

        </form>
    </div>

<?php
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>