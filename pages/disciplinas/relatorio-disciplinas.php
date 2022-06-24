<?php

include('../../connection/config.php');
include('../../connection/verifica.php');
include('../../connection/fpdf184/fpdf.php');


$relatorio = "SELECT * FROM disciplinas";
$query_disciplinas = "SELECT COUNT(id) AS qnt_disciplinas FROM disciplinas";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetMargins(50, 50, 50);
$pdf->Cell(40, 10, utf8_decode('Relatório de Disciplinas'));
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, utf8_decode('id'), 1, 0, 'C');
$pdf->Cell(100, 10, utf8_decode('Nome'), 1, 0, 'C');
$pdf->Ln(10);

foreach ($con->query($relatorio) as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(10, 10, utf8_decode($row['id']), 1, 0, 'C');
    $pdf->Cell(100, 10, utf8_decode($row['nome']), 1, 0, 'C');
    $pdf->Ln(10);
}

foreach ($con->query($query_disciplinas) as $row) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(110, 10, utf8_decode('Total de Disciplinas: ' . $row['qnt_disciplinas']), 1, 0, 'C');
    $pdf->Ln(10);
}
$pdf->Output();
