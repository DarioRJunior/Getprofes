<?php
require('../../connection/verifica.php');

if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='../login/login.php';</script>";
if (isset($_POST['submit'])){
    include_once('../../connection/config.php');
    $nome = $_POST['nome'];

    $sql = "INSERT INTO disciplinas (nome) VALUES ('$nome')";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        echo "<script>alert('Disciplina $nome cadastrado(a) com sucesso!');</script>";
        echo "<script>top.location.href='../sistema/sistema-adm.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar disciplina!');</script>";
        echo "<script>top.location.href='../sistema/sistema-adm.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
    <title>GetProfes - Cadastro de Disciplina</title>
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="cadastro-disciplinas.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img class="logo-img" src="../../src/img/GetProfes-Logo.png" alt="Logo GetProfes">
                <h1>GetProfes</h1>
            </div>
            <ul class="nav-list">
                <li><a href="../sistema/sistema-adm.php" class="voltar">Voltar</a></li>
            </ul>
        </nav>
    </header>
    <div class="box-cadastro">
        <div class="box">
            <form  action="cadastro-disciplinas.php" method="POST">
                <fieldset class="fieldset">
                    <legend><b>Cadastrar disciplina</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome da disciplina:</label>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                </fieldset>
            </form>
        </div>
    </div>

    <footer id="footer">
        <div class="footer-rodape">
            <p>GetProfes - &copy;Todos os direitos reservados - 2022</p>
        </div>
    </footer>
</body>
</html>