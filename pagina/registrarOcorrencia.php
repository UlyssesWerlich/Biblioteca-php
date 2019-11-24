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
        <p id='titulo'>Registrar ocorrência<p>
        <div class='formulario'>
            <form name='visita' method='POST' action='../controlador/controladorOcorrencia.php'>
                <p>Título da Ocorrência:</p>
                    <input class='campo' type='text' name='tituloOcorrencia'/>
                <p>Ocorrência:</p>
                    <textarea name="ocorrencia" id="ocorrencia" rows='10' cols='80' placeholder="Ocorrência*" required></textarea>
                <p><input class='botao' type='submit' name='botao' value='Registrar'/></p>
            </form>
        </div>
    </div>
</body>
</html>
