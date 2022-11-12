<?php 
require('./php/session.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";


function filterData(&$str){
	$str = preg_replace("/\t/","\\t",$str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str,'"'))$str = '"'. str_replace('"','""',$str) . '"';
}

$fileName = "attendance(MONTH/YEAR).xls";


$fields = array('ID','Student','Present','Absent');

$excelData = implode("\t", array_values($fields)) . "\n";






?>