<?php
require('../../connection/verifica.php');

if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='../login/login.php';</script>";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getprofes - Administração</title>
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="sistema-adm.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img class="logo-img" src="../../src/img/GetProfes-Logo.png" alt="Logo GetProfes">
                <h1>GetProfes</h1>
            </div>
            <ul class="nav-list">
                <li><a href="#" class="sair">Sair do Sistema</a></li>
            </ul>
        </nav>
    </header>

    <div id="bem-vindo">
        <p>SISTEMA DA ADMINISTRAÇÃO</p>
        <P>Bem-vindo, <?php echo $_SESSION["nome"]; ?></P>
    </div>

    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>O que deseja fazer?</h2>
                    <a href="../disciplinas/cadastro-disciplinas.php">Cadastrar Disciplina</a>
                    <a href="../disciplinas/lista-disciplinas.php?pagina=1">Lista de Disciplina</a>
                    <a href="#">Professores cadastrados</a>
                    <a href="#">Alunos cadastrados</a>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer">
        <div class="footer-rodape">
            <p>GetProfes - &copy;Todos os direitos reservados - 2022</p>
        </div>
    </footer>

    <div id="modal-sair" class="modal-container">
        <div class="modal">
            <h3 class="subtitulo">Você, Deseja sair do sistema?</h3>
            <div class="btn-container">
                <a href="../login/login.php"><button class="btn-sim">SIM</button></a>
                <a href="sistema-adm.php"><button class="btn-nao">NÃO</button></a>

            </div>
        </div>
    </div>
</body>

<script>
    function iniciaModal(modalID) {
        const modal = document.getElementById(modalID);
        modal.classList.add('mostrar');
        modal.addEventListener('click', (e) => {
            if (e.target.id == modalID || e.target.classList.contains('btn-nao')) {
                modal.classList.remove('mostrar');
            }
        });
    }
    const sair = document.querySelector('.sair');
    sair.addEventListener('click', () => iniciaModal('modal-sair'));
</script>

</html>