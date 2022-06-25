<?php
include('../../connection/config.php');
require('../../connection/verifica.php');

$arquivo = "lista-aulas.txt";
$arq = fopen($arquivo, "w");
$result = mysqli_query($con, "SELECT * FROM aulas WHERE id_aluno = '" . $_SESSION['id_usuario'] . "' ORDER BY id ASC");

$cabecalho = "Disciplinas Extraidas\n";
fwrite($arq, $cabecalho);
while($escrever = mysqli_fetch_array($result)){
    $linha = $escrever['id'] . " - " . $escrever['nome_professor'] . " - " . $escrever['nome_disciplina'] . " - " . $escrever['descricao'] . "\n";
    fwrite($arq, $linha);
}
fclose($arq);

if($result){
    echo "<script>alert('Arquivo criado com sucesso!');</script>";
    echo "<script>top.location.href='minhas-aulas.php?pagina=1';</script>";
} else {
    echo "Erro ao criar arquivo";
}