<?php

require('../../connection/verifica.php');

if (!empty($_GET['id'])) {
    include_once('../../connection/config.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM disciplinas WHERE id =$id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($disciplinas_data = mysqli_fetch_assoc($result)) {
            $nome = $disciplinas_data['nome'];
        }
    } else {
        header("Location: lista-disciplinas.php?pagina=1");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetProfes - Editar Disciplinas</title>
    <link rel="shortcut icon" href="../../src/img/GetProfes-Logo.png" type="image/x-icon">
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
                <li><a href="lista-disciplinas.php?pagina=1" class="voltar">Voltar</a></li>
            </ul>
        </nav>
    </header>
    <div class="box-cadastro">
        <div class="box">
            <form action="saveEdit.php" method="POST">
                <fieldset>
                    <legend><b>Editar Disciplina</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome da disciplina:</label>
                    </div>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update" value="Atualizar">
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