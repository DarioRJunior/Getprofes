<?php
include_once '../../connection/config.php';
require('../../connection/verifica.php');


$sql = "SELECT * FROM disciplinas_ministradas";
$result = $con->query($sql);


while ($row = $result->fetch_assoc()) {
    $nome_professor = $row['nome_professor'];
    $nome_disciplina = $row['nome_disciplina'];
    $descricao = $row['descricao'];
    $id_aluno  = $_SESSION['id_usuario'];
    
    $sql_solicitacoes = "INSERT INTO solicitacoes (id_aluno, nome_professor, nome_disciplina, descricao, status_solicitacao) VALUES ('$id_aluno', '$nome_professor', '$nome_disciplina', '$descricao', 'Pendente')";
    $result_solicitacoes = $con->query($sql_solicitacoes);

    if ($result_solicitacoes) {
        echo "<script>alert('Solicitação enviada com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao enviar solicitação!');</script>";
    }
}

