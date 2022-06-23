<?php
include_once('../../connection/config.php');
session_start(); // Inicia a sessão

//Validar Login
if (@$_REQUEST['submit'] == "Entrar") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $criptografada = md5($senha);

    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$criptografada' ";
    $result = mysqli_query($con, $query);
    while ($coluna = mysqli_fetch_array($result)) {
        $_SESSION["id_usuario"] = $coluna["id"];
        $_SESSION["nome"] = $coluna["nome"];
        $_SESSION["email_usuario"] = $coluna["email"];
        $_SESSION["UsuarioNivel"] = $coluna["nivel"];

        // caso queira direcionar para páginas diferentes
        $niv = $coluna['nivel'];
        if ($niv == "Aluno") {
            header("Location: ../sistema/sistema-aluno.php");
            exit;
        }

        if ($niv == "Professor") {
            header("Location: ../sistema/sistema-professor.php");
            exit;
        }
        if ($niv == "ADM") {
            header("Location: ../sistema/sistema-adm.php");
            exit;
        }
        // ----------------------------------------------
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetProfes - Login</title>
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="../../src/img//GetProfes-Logo.png" type="image/x-icon">
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
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputsubmit" type="submit" name="submit" value="Entrar">
        </form>
        <p style="margin-top: 10px;">Não tem cadastro? Cadastre-se:</p>
        <button style="margin-top: 10px;" class="inputsubmit"><a style="color: var(--bg);" href="../cadastro/cadastro.php">Cadastrar</a></button>
    </div>

    <footer id="footer">
        <div class="footer-rodape">
            <p>GetProfes - &copy;Todos os direitos reservados - 2022</p>
        </div>
    </footer>
</body>

</html>