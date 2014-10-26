<?php require_once("config/connection.php"); ?>
<?php
//	Query string i.e amnt=10&from=USD&to=GBP
extract($_REQUEST);

//	Query DB for from
$aResults = mysql_query("
	SELECT *
	FROM currencies
	WHERE code = '$from'
");

//	Query DB for to
$bResults = mysql_query("
	SELECT *
	FROM currencies
	WHERE code = '$to'
");

//	Output - need to change from array
$rowA = mysql_fetch_array($aResults);
$rowB = mysql_fetch_array($bResults);

//	Sum function
function sum($amnt,$rowA,$rowB){
	$rate = $rowA['rate']/$rowB['rate']; 
	$math = $amnt * $rate;
	//$math = number_format((float)$math, 2, '.', '');
	return $math;
}

//	Generate XML	
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<conv>
    <at>'.date('l jS \of F Y h:i:s A').'</at>
    <rate>'.$rowB['rate'].'</rate>
    <from>
        <code>'.$rowA['code'].'</code>
        <curr>'.$rowA['curr'].'</curr>
        <loc>'.$rowA['lox'].'</loc>
        <amnt>'.$amnt.'</amnt>
    </from>
    <to>
        <code>'.$rowB['code'].'</code>
        <curr>'.$rowB['curr'].'</curr>
        <loc>'.$rowB['lox'].'
        </loc>
        <amnt>'.sum($amnt,$rowA,$rowB).'</amnt>
    </to>
</conv>';

//	Output XML
header('Content-type:text/xml'); //Set header
echo $xml; 
?>