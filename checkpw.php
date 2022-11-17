<?php
function isValidCreds($pw){
	if (strlen($pw) < 10){
		return false;
	}
	$filename = 'top1000.txt';
	$searchfor = $pw;
	$file = file_get_contents($filename);
	if(strpos($file, $searchfor)) 
	{
   		return false;
	}
	return true;
}
?>