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
        <p id='titulo'>Registrar quantitativo de livros<p>
        <div class='formulario'>
            <form name='livro' method='POST' action='../controllers/livro.php'>
                <p>Livros emprestados</p>
                    <input class='campo' size='6' type='text' name='livrosEmprestados'/>
                <p>Livros devolvidos</p>
                    <input class='campo' size='6' type='text' name='livrosDevolvidos'/>
                <p>Novos livros</p>
                    <input class='campo' size='6' type='text' name='livrosNovos'/>
                <p><input class='botao' type='submit' name='botao' value='Registrar'/></p>
            </form>
        </div>
    </div>
</body>
</html>