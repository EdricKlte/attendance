<?php
require('session.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/fpdf184/fpdf.php";
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


$usersId = $_SESSION['id']; 
$teacher = $_SESSION['name'];
$sections = $_SESSION['sections'];
$subjects = $_SESSION['subjects'];
$id = $_GET['ID'];



$pdf->Cell(50,10,"Teacher: ".$teacher);
$pdf->Ln();
$pdf->Cell(50,10,"Subject: ".$subjects);
$pdf->Ln();
$pdf->Cell(50,10,"Section:". $sections);


//GET SHEET RECORD FROM DATABASE
$querySheetRecord = "SELECT * FROM sheet_record WHERE id = '$id'";//GET THE SHEET RECORD
$sqlSheetRecord = mysqli_query($con, $querySheetRecord);

$daysCount;


//GET STUDENT NAMES
$queryClassList = "SELECT * FROM class_list WHERE users_id = '$usersId' AND section = '$sections' AND subject = '$subjects'";
$sqlClassList = mysqli_query($con, $queryClassList);



//DISPLAY DAYS COUNT OF CHOSEN DAY
if($sheetRecord = mysqli_fetch_array($sqlSheetRecord)){
    $daysCount = $sheetRecord['days'];
    $year = $sheetRecord['year'];
    $month = $sheetRecord['month'];
    $sheetID = $sheetRecord['id'];
$pdf->ln();
$pdf->Cell(40,10,"Student List",1,0,'C');
    for($a=1; $a<=$daysCount;$a++){

      $pdf->Cell(5,10,$a,1,0,'C');
    }
}

$pdf->ln();
while($classListResult = mysqli_fetch_array($sqlClassList)) {//WHILE
    $studentID = $classListResult['students_id'];
    $studentFn = $classListResult['first_name'];
    $studentLn = $classListResult['last_name'];
    $section1 = $classListResult['section'];
    $subject1 = $classListResult['subject'];

    $pdf->Cell(40,10,$studentFn." ".$studentLn,1,0,'C');

    for($a=1;$a<=$daysCount;$a++){//FOR1
        $select = "SELECT * FROM attendance WHERE sections = '$section1' AND subjects='$subject1' AND students_id = '$studentID' AND day = $a AND month = $month AND sheetID = $sheetID ";
    $sqlselect = mysqli_query($con, $select);
    if($row=mysqli_fetch_array($sqlselect)){//IF0 GET THE ATTENDANCE OFSTUDENT ON THIS DA
        if($classListResult['students_id']==$row['students_id']){//IF1
            if($row['Status']==1 && $row['day']==$a){//IF2
                $pdf->Cell(5,10,"P",1,0,'C');
            }//IF2
            elseif($row['Status']==0 && $row['day']==$a){
                $pdf->Cell(5,10,"A",1,0,'C');
            }
        }//IF1
    }//IF0
    else{
        $pdf->Cell(5,10," ",1,0,'C');
    }
    }//FOR1
    $pdf->ln();
}//WHILE




$pdf->Output();//REVEAL IN PDF












/*$array1 = array();
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
$pdf->Output();*/



?>