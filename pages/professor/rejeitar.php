<?php
include_once '../../connection/config.php';
require('../../connection/verifica.php');

if (!empty($_GET['id'])) {
    include_once '../../connection/config.php';
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM solicitacoes WHERE id = $id";
    $result = $con->query($sqlSelect);

    while ($row = mysqli_fetch_assoc($result)) {
        $id_aluno = $row['id_aluno'];
        $nome_aluno = $row["nome_aluno"];
        $nome_disciplina = $row["nome_disciplina"];
        $descricao = $row["descricao"];

        $sqlUpdate = "UPDATE solicitacoes SET status_solicitacao = 'Rejeitado' WHERE id = $id";
        $resultUpdate = $con->query($sqlUpdate);

    }

    if ($resultUpdate) {
        echo "<script>alert('Aula de $nome_disciplina Rejeitada com sucesso!');</script>";
        echo "<script>top.location.href='../sistema/sistema-professor.php';</script>";
    } else {
        echo "Erro ao aprovar aula";
    }
}
