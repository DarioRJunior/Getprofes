<?php include_once("connection/routes.php");
routesURL();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetProfes - Página Inicial</title>
    <link rel="shortcut icon" href="src/img/GetProfes-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img class="logo-img" src="src/img/GetProfes-Logo.png" alt="Logo GetProfes">
                <h1>GetProfes</h1>
            </div>
            <ul class="nav-list">
                <li><a href="home">Página Inicial</a></li>
                <li><a href="#sobre-nos">Sobre nós</a></li>
                <li><a href="#servicos">Serviços</a></li>
            </ul>
        </nav>
    </header>

    <!-- <section id="banner">
        <img src="" alt="">
    </section> -->

    <section id="sobre-nos">
        <h2>Sobre nós</h2>
        <div class="sobre-container">
            <div class="sobre-texto">
                <p>Bem vindos a GetProfes, o seu site de aulas particulares gratuito para todo o Brasil!</p>
                <p>Nós oferecemos os melhores professores, para te ajudar nas matérias que você tem mais dificuldade,
                    seja
                    na escola ou na faculdade!</p>
            </div>
        </div>
    </section>
    <section id="servicos">
        <h2>Serviços</h2>
        <div class="servicos-container">
            <div class="servicos-texto">
                <p>Se você veio até aqui, está no lugar certo, nós da GetProfes oferecemos, aulas ao-vivo particulares
                    exclusivamente para você, escolha a matéria que está com dúvidas e marque um horário com o
                    professor!
                </p>
                <p class="chamada-btns">Crie uma conta agora, ou faça login na sua:</p>
            </div>
            <div class="btns">
                <a href="pages/cadastro/cadastro.php"><button class="btn-home">Cadastrar</button></a>
                <a href="pages/login/login.php"><button class="btn-home">Login</button></a>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-container">
            <div class="footer-header">
                <img src="src/img/GetProfes-Logo.png" alt="">
                <h2>GetProfes</h2>
                <p>GetProfes é um site de aulas particulares grauito para todo o Brasil!</p>
            </div>
            <div class="footer-menu">
                <h2>Página Inicial</h2>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Sobre nós</a></li>
                    <li><a href="">Serviços</a></li>
                </ul>
            </div>
            <div class="footer-sociais">
                <h2>Redes Sociais</h2>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
        <div class="footer-rodape">
            <p>GetProfes - &copy;Todos os direitos reservados - 2022</p>
        </div>
    </footer>

</body>
<script src="https://kit.fontawesome.com/a62f8c9ce0.js" crossorigin="anonymous"></script>

</html>