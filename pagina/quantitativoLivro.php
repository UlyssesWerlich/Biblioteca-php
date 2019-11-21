<?php

session_start();
if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../index.php');
}
    $logado = $_SESSION['login'];

    $titulo = "Registrar quantitativo de livro";
    include('../paginaBase/cabecalho.php');
?>

<div class='formulario'>
        <form name='livro' method='POST' action='../controlador/controladorLivro.php'>
            <p>Livros emprestados</p>
                <input type='text' name='livrosEmprestados'/>
            <p>Livros devolvidos</p>
                <input type='text' name='livrosDevolvidos'/>
            <p>Novos livros</p>
                <input type='text' name='livrosNovos'/>
            <p><input type='submit' name='botao' value='Registrar'/></p>
            

        </form>
    </div>

<?php
    $nome = $_SESSION['nome_usuario'];
    include('../paginaBase/rodape.php');
?>