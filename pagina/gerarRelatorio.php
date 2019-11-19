<?php
    $titulo = "Gerar Relatório";
    include('../paginaBase/cabecalho.php');

?>

    <div class='formulario'>
        <form name='visita' method='POST' action='../controlador/controladorVisita.php'>
            <p>Data de início da consulta<br>
                <input type="text" name="dataInicio" placeholder="dd/mm/yyyy" size="10" maxlength="10" minlength="10"> </p>
            </p>

            <p>Data de final da consulta<br>
                <input type="text" name="dataFim" placeholder="dd/mm/yyyy" size="10" maxlength="10" minlength="10"> </p>
            </p>
            <p>Selecione o tipo de relatório<br/>
                <input name="turno" type="radio" id="turno" value="Manhã">Relatório de Visitas<br/>
                <input name="turno" type="radio" id="turno" value="Tarde">Relatório de Ocorrências<br/>
                <input name="turno" type="radio" id="turno" value="Noite">Relatório de Quantitativo de Livros</p>
            <p>
                <input type='submit' name='botao' value='Cadastrar'/>
            </p>
            

        </form>
    </div>

<?php
    include('../paginaBase/rodape.php');
?>