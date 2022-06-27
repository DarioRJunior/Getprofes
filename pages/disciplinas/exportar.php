<?php
include('../../connection/config.php');

$arquivo = "lista-disciplinas.txt";
$arq = fopen($arquivo, "w");
$result = mysqli_query($con, "SELECT * FROM disciplinas ORDER BY id ASC");

$cabecalho = "Disciplinas Extraidas\n";
fwrite($arq, $cabecalho);
while($escrever = mysqli_fetch_array($result)){
    $linha = $escrever['id'] . " - " . $escrever['nome'] . "\n";
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