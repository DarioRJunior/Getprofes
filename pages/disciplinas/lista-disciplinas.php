<?php
include_once '../../connection/config.php';


$sql = "SELECT * FROM disciplinas ORDER BY id ASC";
$query_disciplinas = "SELECT COUNT(id) AS qnt_disciplinas FROM disciplinas";


if (isset($_GET['pagina'])) {
    $pag = $_GET['pagina'];
    $busca = "SELECT * FROM disciplinas";
    $todos = mysqli_query($con, $busca);
    $registros = "5";
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
    <title>GetProfes - Lista de Disciplinas</title>
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="lista-disciplinas.css">
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
    <section class="sistema">
        <div class="sistema-box">
            <div class="sistema-container">
                <h2>Lista de Disciplinas</h2>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($limite)) {
                                echo "<tr>";
                                echo "<td>" . $row["nome"] . "</td>";
                                echo "<td class='btns'>
                                    <a class='btnEditar' href='editar-disciplinas.php?id=$row[id]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg></a>
                                <a class='btnExcluir' href='delete.php?id=$row[id]' title='Excluir'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                </a>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-container">
                    <?php
                    $result_disciplinas = $con->query($query_disciplinas);
                    $row_disciplinas = mysqli_fetch_assoc($result_disciplinas);
                    ?>
                    <h3>Disciplinas cadastradas: <?php echo $row_disciplinas["qnt_disciplinas"]; ?></h3>
                </div>
                <div class="btn-baixar">
                    <button><a class="btn_relatorio" href="relatorio-disciplinas.php" target="_blank">Baixar relatório de disciplinas</a></button>
                    <button><a class="btn_relatorio" href="exportar.php">Exportar Dados</a></button>
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