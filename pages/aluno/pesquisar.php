<?php
include_once '../../connection/config.php';
require('../../connection/verifica.php');


$pesquisa = $_GET['pesquisa'];

$sql = "SELECT * FROM disciplinas_ministradas WHERE nome_disciplina LIKE '%$pesquisa%'";
$query_disciplinas = "SELECT COUNT(id) AS qnt_disciplinas FROM disciplinas_ministradas WHERE nome_disciplina LIKE '%$pesquisa%'";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetProfes - Solicitar Aulas</title>
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="solicitar-aula.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img class="logo-img" src="../../src/img/GetProfes-Logo.png" alt="Logo GetProfes">
                <h1>GetProfes</h1>
            </div>
            <ul class="nav-list">
                <li><a href="../sistema/sistema-aluno.php" class="voltar">Voltar</a></li>
            </ul>
        </nav>
    </header>

    <section class="sistema">
        <div class="sistema-box">
            <div class="form-pesquisar">
                <a href="solicitar-aula.php?pagina=1"><button>Ver lista completa</button></a>
                <form action="pesquisar.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Pesquisar...">
                    <button type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="sistema-container">
                <h2>Aulas Disponíveis</h2>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Disciplina</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Professor</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["nome_disciplina"] . "</td>";
                                echo "<td>" . $row["descricao"] . "</td>";
                                echo "<td>Prof. " . $row["nome_professor"] . "</td>";
                                echo "<td class='btns'>
                                <a class='btnSolicitar' href='solicitar.php?id=$row[id]' title='Solicitar'>
                                Solicitar
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
                    <h3>Todas as aulas disponíveis: <?php echo $row_disciplinas["qnt_disciplinas"]; ?></h3>
                </div>
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