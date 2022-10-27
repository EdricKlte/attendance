<?php
//require('./php/session.php');
//require('/attendance/fpdf184/fpdf.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$array1 = array();

for($a = 1 ; $a < 10; $a++){
$array1[$a] = $a;
}

$array2= array('apple', "ball", "cat","4","5","6","7","8","9","10");


for($a = 1 ; $a <= 10; $a++){
    $pdf->Cell(10,10,$a);
}

$pdf->Ln(10);
foreach($array1 as $key=>$row){
    $pdf->Cell(10,10,$row);
    $pdf->Cell(10,10,$array2[$key]);
    $pdf->Ln(10);
}
$pdf->Output();
?>