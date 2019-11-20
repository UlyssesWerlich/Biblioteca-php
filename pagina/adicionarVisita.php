<?php
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
    include('../paginaBase/rodape.php');
?>