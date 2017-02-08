<?php

$name = 'Vadim';

require_once($_SERVER['DOCUMENT_ROOT']."/ivent/library/fpdf/fpdf.php");

$pdf = new FPDF();

$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);
$pdf->AddPage('P');
$pdf->SetDisplayMode('real','default');

$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Text(80,30,'Hellow '.$name,1,0,'C',0);
$pdf->SetXY(0,80);
$pdf->Cell(110,20,'Text',0,1,'L');
$pdf->SetXY(100,50);
$pdf->Cell(110,20,'Text',0,1,'R');

$pdf->Output('example1.pdf','I');

?>