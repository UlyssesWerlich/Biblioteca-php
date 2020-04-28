<?php
    require_once '../database/connection.php';

    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
    include('../includes/cabecalho.php');

    $dataInicio = (empty($_POST['dataInicio']))?(date('Y-m-d')):($_POST['dataInicio']);
    $dataFim = (empty($_POST['dataFim']))?(date('Y-m-d')):($_POST['dataFim']);
    $tipo = $_POST['tipo'];

?>

    <div class='bloco'>
        <p id='titulo'>Relatório</p>

<?php

    if ($tipo == 'visita'){
        $consulta1=$pdo->prepare("select sum(qtdPessoas) as soma,
                                    sum(case when (tipoEntrada = 'aluno') then qtdPessoas else 0 end) as contagemAluno,
                                    sum(case when (tipoEntrada = 'professor') then qtdPessoas else 0 end) as contagemProfessor
                                    from visita 
                                    where CAST(dataVisita AS DATE) BETWEEN ('$dataInicio') AND ('$dataFim');");
        $consulta1->execute();
        $resultado1 = $consulta1->fetchAll();
?>
        <div class='tabela'>
            <table>
                <caption>Contagem de visitas geral</caption>
                    <tr class='linha1'>
                        <td>  Total de visitas  </td>
                        <td>  Entrada de Aluno  </td>
                        <td>  Entrada de Professor  </td>
                    </tr>
<?php
    foreach ($resultado1 as $row1){
            echo "<tr class='linha2'>
                <td>$row1[soma]</td>
                <td>$row1[contagemAluno]</td>
                <td>$row1[contagemProfessor]</td>
            </tr>";
    }

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

?>
            </table><br/><br/>  
            <div class='tabela'>
                <table border='1'>
                    <caption>Contagem de visitas por dia</caption>
                        <tr class='linha1'>
                            <td>  Data  </td>
                            <td>  Total de visitas  </td>
                            <td>  Entrada de Aluno  </td>
                            <td>  Entrada de Professor  </td>
                        </tr>

<?php
    $contagem = 0;
    foreach ($resultado2 as $row2){
        $num = ($contagem % 2) + 2;
            echo "<tr class='linha$num'>
                <td>$row2[data]</td>
                <td>$row2[soma]</td>
                <td>$row2[contagemAluno]</td>
                <td>$row2[contagemProfessor]</td>
            </tr>";
        $contagem += 1;
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
?>

            <div class='tabela'>
                <p>Quantidade de ocorrências:<?php echo " $contagem" ?></p>
                <table border='1'>
                    <caption>Alunos</caption>
                        <tr class='linha1'>
                            <td>    Data    </td>
                            <td>    Hora    </td>
                            <td>   Titulo   </td>
                            <td>Nº ocorrência</td>
                        </tr>

<?php
    $contagem = 0;
    foreach ($resultado as $row){
        $num = ($contagem % 2) + 2;
            echo "<tr class='linha$num'>
                <td>$row[data]</td>
                <td>$row[hora]</td>
                <td>$row[titulo]</td>
                <td><a href='consultaOcorrencia.php?dataInicio=$dataInicio&dataFim=$dataFim&id_ocorrencia=$row[id_ocorrencia]'>$row[id_ocorrencia]</a></td>
            </tr>";
        $contagem += 1;
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

?>
            <div class='tabela'>
                <table>
                    <caption>Contagem de livros</caption>
                        <tr class='linha1'>
                            <td>  Livros Emprestados  </td>
                            <td>  livros Devolvidos  </td>
                            <td>  livros Novos  </td>
                        </tr>

<?php
        foreach ($resultado1 as $row1){
                echo "<tr class='linha2'>
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

?>
            <div class='tabela'>
                <table border='1'>
                    <caption>Contagem de livros por dia</caption>
                        <tr class='linha1'>
                            <td>  Data  </td>
                            <td>  Livros Emprestados  </td>
                            <td>  Livros Devolvidos  </td>
                            <td>  Livros Novos  </td>
                        </tr>

<?php
    $contagem = 0;
        foreach ($resultado2 as $row2){
            $num = ($contagem % 2) + 2;
            echo "<tr class='linha$num'>
                    <td>$row2[data]</td>
                    <td>$row2[livrosEmprestados]</td>
                    <td>$row2[livrosDevolvidos]</td>
                    <td>$row2[livrosNovos]</td>
                </tr>";
            $contagem += 1;
        }
        echo "</table>";

    } else {
        echo "<p>Erro ao gerar relatório</p>";
    }
    $pdo = null;
?>

        <p><a href='../pagina/gerarRelatorio.php'>Gerar outro relatório</a></p><br/><br/>
    </div>
</body>
</html>