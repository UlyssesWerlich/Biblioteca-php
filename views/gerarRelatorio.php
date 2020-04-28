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
        <p id='titulo'>Gerar Relatório<p>
        <div class='formulario'>
            <form name='visita' method='POST' action='../controllers/relatorio.php'>
                <p>Data de inicio da consulta</p>
                    <input class='campo' type="date" name="dataInicio">
                <p>Data final da consulta </p>
                    <input class='campo' type="date" name="dataFim">
                <p>Selecione o tipo de relatório<br/><br/>
                    <input name="tipo" type="radio" value="visita" checked="checked">Relatório de Visitas<br/>
                    <input name="tipo" type="radio" value="ocorrencia">Relatório de Ocorrências<br/>
                    <input name="tipo" type="radio" value="livro">Relatório de Quantitativo de Livros</p>
                    <input class='botao' type='submit' name='botao' value='Gerar relatório'/>
                </p>
            </form>
        </div>
    </div>
</body>
</html>