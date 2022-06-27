<?php
include('../../connection/config.php');
require('../../connection/verifica.php');

$arquivo = "Minhas-Aulas.txt";
$arq = fopen($arquivo, "w");
$result = mysqli_query($con, "SELECT * FROM aulas WHERE id_professor = '" . $_SESSION['id_usuario'] . "' ORDER BY id ASC");

$cabecalho = "Disciplinas Extraidas\n";
fwrite($arq, $cabecalho);
while($escrever = mysqli_fetch_array($result)){
    $linha = $escrever['id'] . " - " . $escrever['nome_aluno'] . " - " . $escrever['nome_disciplina'] . " - " . $escrever['descricao'] . "\n";
    fwrite($arq, $linha);
}
fclose($arq);

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Length: ". filesize("$arquivo").";");
header("Content-Disposition: attachment; filename=$arquivo");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary");

readfile($arquivo);