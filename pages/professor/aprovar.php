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

        $sqlAprovar = "INSERT INTO aulas (id_professor, nome_professor,id_aluno, nome_aluno , nome_disciplina, descricao, status_solicitacao) VALUES ('" . $_SESSION['id_usuario'] . "', '" . $_SESSION['nome'] . "', '$id_aluno', '$nome_aluno', '$nome_disciplina', '$descricao', 'Aprovado')";
        $resultAprovar = $con->query($sqlAprovar);
        $sqlDeletar = "DELETE FROM solicitacoes WHERE id = $id";
        $resultDeletar = $con->query($sqlDeletar);
    }

    if ($resultAprovar) {
        echo "<script>alert('Aula de $nome_disciplina aprovada com sucesso!');</script>";
        echo "<script>top.location.href='../sistema/sistema-professor.php';</script>";
    } else {
        echo "Erro ao aprovar aula";
    }
}
