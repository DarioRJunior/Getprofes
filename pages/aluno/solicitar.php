<?php
include_once '../../connection/config.php';
require('../../connection/verifica.php');

if (!empty($_GET['id'])) {
    include_once '../../connection/config.php';
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM disciplinas_ministradas WHERE id = $id";
    $result = $con->query($sqlSelect);

   while ($row = mysqli_fetch_assoc($result)) {
        $nome_professor = $row["nome_professor"];
        $nome_disciplina = $row["nome_disciplina"];
        $descricao = $row["descricao"];
        
        $sqlSolicitacao = "INSERT INTO solicitacoes (id_aluno, nome_professor, nome_disciplina, descricao, status_solicitacao) VALUES ('" . $_SESSION['id_usuario'] . "', '$nome_professor', '$nome_disciplina', '$descricao', 'Pendente')";
        $resultSolicitacao = $con->query($sqlSolicitacao);
    }
}
if ($result) {
    header("Location: minhas-solicitacoes.php?pagina=1");
} else {
    echo "Erro ao solicitar disciplina";
}
