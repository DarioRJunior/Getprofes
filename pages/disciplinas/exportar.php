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

if($result){
    echo "<script>alert('Arquivo criado com sucesso!');</script>";
    echo "<script>top.location.href='../disciplinas/lista-disciplinas.php?pagina=1';</script>";
} else {
    echo "Erro ao criar arquivo";
}