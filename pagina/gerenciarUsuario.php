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
        <p id='titulo'>Usuários</p>
        <?php
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=biblioteca","root", "password");
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            $consulta = $pdo->prepare("select nome, login, cpf, telefone from usuario");
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            echo "
                <div class='blocoUsuarios'>
                    <p><a href='adicionarUsuario.php'><b>+</b> Adicionar Usuário</a></p>
                </div>
                <br/>";

            foreach ($resultado as $row){

                echo "
                    <div class='blocoUsuarios'>
                        <p><b>$row[nome]</b></p>
                        <p><a href='editarUsuario.php?login=$row[login]'>$row[login]</a></p>
                        <p>CPF: $row[cpf] </p>
                        <p>Telefone: $row[telefone] </p>
                    </div>
                    <br/>
                ";
            }

        ?>
    </div>
</body>
</html>