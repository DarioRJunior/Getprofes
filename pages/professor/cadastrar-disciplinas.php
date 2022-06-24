<?php
require('../../connection/verifica.php');
include_once('../../connection/config.php');

if (isset($_POST['submit'])) {
    include_once('../../connection/config.php');
    $id_professor = $_SESSION['id_usuario'];
    $nome_disciplina = $_POST['select_disciplina'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO disciplinas_ministradas (id_professor, nome_disciplina, descricao) VALUES ('$id_professor', '$nome_disciplina', '$descricao')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Disciplina $nome_disciplina cadastrada com sucesso!');</script>";
        echo "<script>window.location.href = '../../pages/professor/cadastrar-disciplinas.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar disciplina!');</script>";
        echo "<script>window.location.href = '../../pages/professor/cadastrar-disciplinas.php';</script>";
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
    <title>GetProfes - Disciplinas que vou ministrar</title>
    <link rel="stylesheet" href="../../src/css/reset.css">
    <link rel="stylesheet" href="cadastrar-disciplinas.css">
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
    <div class="box-cadastro">
        <div class="box">
            <form action="cadastrar-disciplinas.php" method="POST">
                <fieldset class="fieldset">
                    <legend><b>Cadastrar disciplina para ministrar</b></legend>
                    <br>
                    <div class="inputBox">
                        <label id="escolha-disciplina" for="produto">Disciplina:</label> <br>
                        <select name="select_disciplina" id="disciplina">
                            <option selected disable value="">Escolha...</option>
                            <?php
                            $result_disciplina = "SELECT id, nome FROM disciplinas ORDER BY id";
                            $resultado_disciplina = mysqli_query($con, $result_disciplina);
                            while ($row_disciplina = mysqli_fetch_assoc($resultado_disciplina)) {
                                echo '<option value="' . $row_disciplina['nome'] . '">' . $row_disciplina['nome'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="descricao" id="descricao" class="inputUser" required>
                        <label for="descricao" class="labelInput">Descrição:</label>
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