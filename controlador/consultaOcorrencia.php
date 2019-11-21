<?php
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
        $logado = $_SESSION['login'];

    $titulo = "Consultar ocorrência";
    include('../paginaBase/cabecalho.php');

    $dataInicio = $_GET['dataInicio'];
    $dataFim = $_GET['dataFim'];
    $id_ocorrencia = $_GET['id_ocorrencia'];
    
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=biblioteca","root","password");
    }catch(PDOException $e){
        echo "<p>Erro ao gerar relatório</p>";
        echo "<script> console('$e->getMessage()')</script>";
    }

    $consulta = $pdo->prepare("select  
                                DATE_FORMAT( dataOcorrencia, '%d/%c/%Y' ) AS data,
                                DATE_FORMAT( dataOcorrencia, '%H:%i' ) AS hora,
                                titulo,
                                ocorrencia
                                from ocorrencia where id_ocorrencia like $id_ocorrencia");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){

        echo "
            <div class='formulario'>
                <form name='visita' method='POST' action='../controlador/controladorRelatorio.php'>
                    <p>Título da Ocorrência:</p>
                        <input type='text' name='tituloOcorrencia' value='$row[titulo]' readonly/>
                    <p>Data da Ocorrência:</p>
                        <input type='text' name='data' value='$row[data]' readonly/>
                    <p>Hora da Ocorrência:</p>
                        <input type='text' name='hora' value='$row[hora]' readonly/>
                    <p>Ocorrência:</p>
                    <p>$row[ocorrencia]</p>
                        <input type='hidden' name='dataInicio' value='$dataInicio' />
                        <input type='hidden' name='dataFim' value='$dataFim' />
                        <input type='hidden' name='tipo' value='ocorrencia' />

                    <p><input type='submit' name='botao' value='Voltar ao relatório'/></p>
                
                </form>
            </div>
        ";
    }

    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>