<?php   
    session_start();
    if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../index.php');
    }
        include('../paginaBase/cabecalho.php');
?>

    <section class='bloco'> 
        <p id='titulo'>Bem vindo<p>
    </section>
</body>
</html>

