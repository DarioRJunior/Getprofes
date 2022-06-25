<?php

include_once '../../connection/config.php';
require('../../connection/verifica.php');

$sql = "SELECT * FROM aulas WHERE id_professor = '" . $_SESSION['id_usuario'] . "'";
$query_aulas = "SELECT COUNT(id) AS qnt_aulas FROM aulas WHERE id_professor = '" . $_SESSION['id_usuario'] . "'";

if (isset($_GET['pagina'])) {
    $pag = $_GET['pagina'];
    $busca = "SELECT * FROM aulas WHERE id_professor = '" . $_SESSION['id_usuario'] . "'";
    $todos = mysqli_query($con, $busca);
    $registros = "10";
    $tr = mysqli_num_rows($todos);
    $tp = ceil($tr / $registros);
    $inicio = ($registros * $pag) - $registros;
    $limite = mysqli_query($con, "$busca LIMIT $inicio, $registros");
    $anterior = $pag - 1;
    $proximo = $pag + 1;
}
$result = $con->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetProfes - Minhas Solicitacoes</title>
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="meus-alunos.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img class="logo-img" src="../../src/img/GetProfes-Logo.png" alt="Logo GetProfes">
                <h1>GetProfes</h1>
            </div>
            <ul class="nav-list">
                <li><a href="../sistema/sistema-professor.php" class="voltar">Voltar</a></li>
            </ul>
        </nav>
    </header>

    <section class="sistema">
        <div class="sistema-box">
            <div class="sistema-container">
                <h2>Minhas Aulas</h2>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Aluno</th>
                                <th scope="col">Disciplina</th>
                                <th scope="col">Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($limite)) {
                                echo "<tr>";
                                echo "<td>" . $row["nome_aluno"] . "</td>";
                                echo "<td>" . $row["nome_disciplina"] . "</td>";
                                echo "<td>" . $row["descricao"] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-container">
                    <?php
                    $result_aulas = $con->query($query_aulas);
                    $row_aulas = mysqli_fetch_assoc($result_aulas);
                    ?>
                    <h3>Disciplinas cadastradas: <?php echo $row_aulas["qnt_aulas"]; ?></h3>
                </div>
                <div class="btn-baixar">
                    <button><a class="btn_relatorio" href="relatorio-aulas.php" target="_blank">Baixar relatório de aulas</a></button>
                    <button><a class="btn_relatorio" href="exportar.php">Exportar dados de aulas</a></button>
                </div>
                <nav class="paginacao-container">
                    <ul class="pagination">
                        <?php
                        if ($pag > 1) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?= $anterior; ?>" aria-label="Anterior">
                                    <span aria-hidden="true">Anterior</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php
                        for ($i = 1; $i <= $tp; $i++) {
                            if ($pag == $i) {
                                echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                            }
                        }
                        ?>



                        <?php
                        if ($pag < $tp) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?= $proximo; ?>" aria-label="Próximo">
                                    <span aria-hidden="true">Próximo</span>

                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-rodape">
            <p>GetProfes - &copy;Todos os direitos reservados - 2022</p>
        </div>
    </footer>
</body>

</html>