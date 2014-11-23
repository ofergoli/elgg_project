<!DOCTYPE html>
<?php 
	require_once("db_connection.php");
	require_once("database.php");

	// header('Content-Type: text/csv; charset=utf-8');
	// header('Content-Disposition: attachment; filename=data.csv');
	// $output = fopen('php://output', 'w');
		
	// fputcsv($output, $arr);

	// $databasecheck = new DataBase($conn);
	// $sqlQuery = 'select * from elgg_users_entity';
	// $selectResult = $databasecheck->Query($sqlQuery);
	// $arr = array();
	// for($i=1 ; $i< 13 ; $i++){
	// 	array_push($arr, mysql_field_name($selectResult,$i));
	// }
	// print_r($arr);
	// output headers so that the file is downloaded rather than displayed

	// create a file pointer connected to the output stream

	// output the column headings
	

	
	// // fetch the data
	// mysql_connect('localhost', 'root', 'ofer');
	// mysql_select_db('elgg');
	// $rows = mysql_query('SELECT * FROM elgg_users_entity');
	
	// // loop over the rows, outputting them
	// while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);



	//$pass = md5("ronkahat" . "M0ABlCEl");
	//echo $pass;
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div id="maintable">
<?php
	$database = new DataBase($conn);
	$flag="";

	$sqlQuery = "select * from elgg_users_entity";
	$selectResult = $database->Query($sqlQuery);
	while($row = $selectResult->fetch_assoc()){
		echo  "<div class='table'>\n";
 	    echo getCell($row,"guid",$flag) . getCell($row,"name",$flag) . getCell($row,"username",$flag) . getCell($row,"password",$flag) . "<div class='clear'></div>";
		echo "</div> \n" ;
	}

	function getCell($row,$param,$flag){
		return "<div class='cellB'>" . $row[$param] . "</div>\n";
	}

?>
</div>

</body>
</html>