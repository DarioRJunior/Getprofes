
<?php

include_once('../../connection/config.php');

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sqlUpdate = "UPDATE disciplinas SET nome='$nome' WHERE id='$id'";

    $result = mysqli_query($con, $sqlUpdate);

    if ($result) {
        echo "<script>alert('Disciplina $nome atualizada com sucesso!');</script>";
        echo "<script>top.location.href='../disciplinas/lista-disciplinas.php?pagina=1';</script>";
    } else {
        echo "Erro ao atualizar";
    }
}