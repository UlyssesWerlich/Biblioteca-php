<?php
    $titulo = "Registrar ocorrência";
    include('../paginaBase/cabecalho.php');
?>

<div class='formulario'>
        <form name='visita' method='POST' action='../controlador/controladorOcorrencia.php'>
            <p>Título da Ocorrência:</p>
                <input type='text' name='tituloOcorrencia'/>
            <p>Ocorrência:</p>
                <textarea name="ocorrencia" id="ocorrencia" rows='10' cols='80' placeholder="Ocorrência*" required></textarea>
            <p><input type='submit' name='botao' value='Cadastrar'/></p>
        
        </form>
    </div>

<?php
    include('../paginaBase/rodape.php');
?>