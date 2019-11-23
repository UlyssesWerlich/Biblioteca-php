<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }

    $titulo = "Relatório";
    include('../paginaBase/cabecalho.php');

    $dataInicio = (empty($_POST['dataInicio']))?(date('Y-m-d')):($_POST['dataInicio']);
    $dataFim = (empty($_POST['dataFim']))?(date('Y-m-d')):($_POST['dataFim']);
    $tipo = $_POST['tipo'];

    try{
        $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
    }catch(PDOException $e){
        echo "<p>Erro ao gerar relatório</p>";
        echo "<script> console('$e->getMessage()')</script>";
    }

    if ($tipo == 'visita'){
    /*
    select sum(qtdPessoas) as soma,
    sum(case when (tipoEntrada = 'aluno') then qtdPessoas else 0 end) as contagemAluno,
    sum(case when (tipoEntrada = 'professor') then qtdPessoas else 0 end) as contagemProfessor
    from visita;


    select DATE_FORMAT( dataVisita, '%d/%c/%Y' ) AS data, 
    sum(qtdPessoas) as soma,
    sum(case when (tipoEntrada = 'aluno') then qtdPessoas else 0 end) as contagemAluno,
    sum(case when (tipoEntrada = 'professor') then qtdPessoas else 0 end) as contagemProfessor
    from visita group by data;
    
    */

        $consulta1=$pdo->prepare("select sum(qtdPessoas) as soma,
                                    sum(case when (tipoEntrada = 'aluno') then qtdPessoas else 0 end) as contagemAluno,
                                    sum(case when (tipoEntrada = 'professor') then qtdPessoas else 0 end) as contagemProfessor
                                    from visita 
                                    where CAST(dataVisita AS DATE) BETWEEN ('$dataInicio') AND ('$dataFim');");

        $consulta1->execute();
        $resultado1 = $consulta1->fetchAll();

        echo "<div class='tabela'>
                <table border='1'>
                    <caption>Contagem de visitas geral</caption>
                        <tr>
                            <td>  Total de visitas  </td>
                            <td>  Entrada de Aluno  </td>
                            <td>  Entrada de Professor  </td>
                        </tr>";

        foreach ($resultado1 as $row1){
                echo "<tr>
                    <td>$row1[soma]</td>
                    <td>$row1[contagemAluno]</td>
                    <td>$row1[contagemProfessor]</td>
                </tr>";
        }
        echo "</table><br/><br/>";

        $consulta2=$pdo->prepare("select DATE_FORMAT( dataVisita, '%d/%c/%Y' ) AS data, 
                                    sum(qtdPessoas) as soma,
                                    sum(case when (tipoEntrada = 'aluno') then qtdPessoas else 0 end) as contagemAluno,
                                    sum(case when (tipoEntrada = 'professor') then qtdPessoas else 0 end) as contagemProfessor
                                    from visita 
                                    where CAST(dataVisita AS DATE) BETWEEN ('$dataInicio') AND ('$dataFim') 
                                    group by data
                                    order by data DESC;");

        $consulta2->execute();
        $resultado2 = $consulta2->fetchAll();

        echo "<div class='tabela'>
                <table border='1'>
                    <caption>Contagem de visitas por dia</caption>
                        <tr>
                            <td>  Data  </td>
                            <td>  Total de visitas  </td>
                            <td>  Entrada de Aluno  </td>
                            <td>  Entrada de Professor  </td>
                        </tr>";

        foreach ($resultado2 as $row2){

                echo "<tr>
                    <td>$row2[data]</td>
                    <td>$row2[soma]</td>
                    <td>$row2[contagemAluno]</td>
                    <td>$row2[contagemProfessor]</td>
                </tr>";
        }
        echo "</table>";

    // -----------------------------------------------------------------------

    } else if ($tipo == 'ocorrencia'){
        $consulta=$pdo->prepare("select 
                                    DATE_FORMAT( dataOcorrencia, '%d/%c/%Y' ) AS data,
                                    DATE_FORMAT( dataOcorrencia, '%H:%i' ) AS hora,
                                    titulo,
                                    id_ocorrencia
                                    from ocorrencia 
                                    where CAST(dataOcorrencia AS DATE) BETWEEN ('$dataInicio') AND ('$dataFim') 
                                    ORDER BY dataOcorrencia DESC;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $contagem = count($resultado);

        echo "<div class='tabela'>
                <p>Quantidade de ocorrências: $contagem </p>
                <table border='1'>
                    <caption>Alunos</caption>
                        <tr>
                            <td>    Data    </td>
                            <td>    Hora    </td>
                            <td>   Titulo   </td>
                            <td>Nº ocorrência</td>
                        </tr>";

        foreach ($resultado as $row){

                echo "<tr>
                    <td>$row[data]</td>
                    <td>$row[hora]</td>
                    <td>$row[titulo]</td>
                    <td><a href='consultaOcorrencia.php?dataInicio=$dataInicio&dataFim=$dataFim&id_ocorrencia=$row[id_ocorrencia]'>$row[id_ocorrencia]</a></td>
                </tr>";
        }
        echo "</table>";

    // -----------------------------------------------------------------------

    } else if ($tipo == 'livro'){
        $consulta1=$pdo->prepare("select sum(livrosEmprestados) as contagemEmprestados,
                                    sum(livrosDevolvidos) as contagemDevolvidos,
                                    sum(livrosNovos) as contagemNovos
                                    from qtdlivros 
                                    where CAST(dataRegistro AS DATE) BETWEEN ('$dataInicio') AND ('$dataFim');");

        $consulta1->execute();
        $resultado1 = $consulta1->fetchAll();

        echo "<div class='tabela'>
                <table border='1'>
                    <caption>Contagem de livros</caption>
                        <tr>
                            <td>  Livros Emprestados  </td>
                            <td>  livros Devolvidos  </td>
                            <td>  livros Novos  </td>
                        </tr>";

        foreach ($resultado1 as $row1){
                echo "<tr>
                    <td>$row1[contagemEmprestados]</td>
                    <td>$row1[contagemDevolvidos]</td>
                    <td>$row1[contagemNovos]</td>
                </tr>";
        }
        echo "</table><br/><br/>";

        $consulta2=$pdo->prepare("select DATE_FORMAT( dataRegistro, '%d/%c/%Y' ) AS data, 
                                    livrosEmprestados,
                                    livrosDevolvidos,
                                    livrosNovos
                                    from qtdlivros 
                                    where CAST(dataRegistro AS DATE) BETWEEN ('$dataInicio') AND ('$dataFim') 
                                    group by data;");

        $consulta2->execute();
        $resultado2 = $consulta2->fetchAll();

        echo "<div class='tabela'>
                <table border='1'>
                    <caption>Contagem de livros por dia</caption>
                        <tr>
                            <td>  Data  </td>
                            <td>  Livros Emprestados  </td>
                            <td>  Livros Devolvidos  </td>
                            <td>  Livros Novos  </td>
                        </tr>";

        foreach ($resultado2 as $row2){
 
                echo "<tr>
                    <td>$row2[data]</td>
                    <td>$row2[livrosEmprestados]</td>
                    <td>$row2[livrosDevolvidos]</td>
                    <td>$row2[livrosNovos]</td>
                </tr>";
        }
        echo "</table>";

    } else {

    }
    $pdo = null;

    echo "<p><a href='../pagina/gerarRelatorio.php'>Gerar outro relatório</a></p>";

    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>