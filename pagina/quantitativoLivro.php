<?php
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
    include('../paginaBase/rodape.php');
?>