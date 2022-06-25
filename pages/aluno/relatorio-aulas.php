<?php

include('../../connection/config.php');
include('../../connection/verifica.php');
include('../../connection/fpdf184/fpdf.php');


$relatorio = "SELECT * FROM aulas WHERE id_aluno = '" . $_SESSION['id_usuario'] . "'";
$query_disciplinas = "SELECT COUNT(id) AS qnt_aulas FROM aulas WHERE id_aluno = '" . $_SESSION['id_usuario'] . "'";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetMargins(20, 20, 20);
$pdf->Cell(40, 10, utf8_decode('Relatório de Aulas'));
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, utf8_decode('Professor'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Disciplina'), 1, 0, 'C');
$pdf->Cell(80, 10, utf8_decode('Descrição'), 1, 0, 'C');
$pdf->Ln(10);

foreach ($con->query($relatorio) as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, utf8_decode($row['nome_professor']), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode($row['nome_disciplina']), 1, 0, 'C');
    $pdf->Cell(80, 10, utf8_decode($row['descricao']), 1, 0, 'C');
    $pdf->Ln(10);
}

foreach ($con->query($query_disciplinas) as $row) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(160, 10, utf8_decode('Total de Aulas: ' . $row['qnt_aulas']), 1, 0, 'C');
    $pdf->Ln(10);
}
$pdf->Output();
