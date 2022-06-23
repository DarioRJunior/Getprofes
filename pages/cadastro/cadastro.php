<?php

if (isset($_POST['submit'])) {
    include_once('../../connection/config.php');
    include('verificaCpf.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $criptografar = md5($senha);
    $nivel = $_POST['nivel'];
    CalculaCPF($cpf);

    if (CalculaCPF($cpf)) {
        $result = mysqli_query($con, "INSERT INTO usuarios (nome, email, cpf, senha, nivel) VALUES ('$nome', '$email','$cpf', '$criptografar','$nivel')");
        echo "CPF Válido";
    } else {
        echo "CPF Inválido";
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
    <title>Getprofes - Cadastrar</title>
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img class="logo-img" src="../../src/img/GetProfes-Logo.png" alt="Logo GetProfes">
                <h1>GetProfes</h1>
            </div>
            <ul class="nav-list">
                <li><a href="../../index.html">Página Inicial</a></li>
            </ul>
        </nav>
    </header>

    <div class="box-login">
        <div class="box">
            <form id="frm" action="cadastro.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><b>Fórmulário de Cadastro</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" maxlength="14" oninput="maskCPF(this)" onblur="validar()" required>
                        <label for="cpf" class="labelInput">Cpf</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="senha">Você é: </label>
                        <br>
                        <input type="radio" id="professor" name="nivel" value="Professor" required>
                        <label for="professor">Professor</label>
                        <input type="radio" id="aluno" name="nivel" value="Aluno" required>
                        <label for="aluno">Aluno</label>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                    <p class="login">Já tem cadastro? Faça o login:</p>
                </fieldset>
            </form>
            <button class="btn-login"><a href="../login/login.php">Login</a></button>
        </div>
    </div>

    <footer id="footer">
        <div class="footer-rodape">
            <p>GetProfes - &copy;Todos os direitos reservados - 2022</p>
        </div>
    </footer>
</body>
<script src="maskcpf.js"></script>
<script src="https://kit.fontawesome.com/a62f8c9ce0.js" crossorigin="anonymous"></script>

</html>