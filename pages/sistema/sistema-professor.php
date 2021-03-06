<?php
require('../../connection/verifica.php');

if ($_SESSION["UsuarioNivel"] != "Professor") echo "<script>alert('Você não é Professor!');top.location.href='../login/login.php';</script>";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getprofes - Sistema Professores</title>
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="sistema-professor.css">
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
        <p>SISTEMA DO(A) PROFESSOR(A)</p>
        <P>Bem-vindo, Prof. <?php echo $_SESSION["nome"]; ?></P>
    </div>

    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>O que deseja fazer?</h2>
                    <a href="../professor/cadastrar-disciplinas.php">Cadastrar disciplinas para ministrar</a>
                    <a href="../professor/minhas-disciplinas.php?pagina=1">Minhas disciplinas</a>
                    <a href="../professor/solicitacoes-aulas.php?pagina=1">Solicitações de aulas</a>
                    <a href="../professor/meus-alunos.php?pagina=1">Meus alunos</a>
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
            <h3 class="subtitulo">Você deseja sair do sistema?</h3>
            <div class="btn-container">
                <a href="../login/login.php"><button class="btn-sim">SIM</button></a>
                <a href="sistema-professor.php"><button class="btn-nao">NÃO</button></a>

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