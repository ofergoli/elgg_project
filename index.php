<!DOCTYPE html>
<?php 
	require_once("db_connection.php");
	require_once("database.php");

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=elgg_users_entity.csv');
	$output = fopen('php://output', 'w');

	$databasecheck = new DataBase($conn);
	$sqlQuery = 'select * from elgg_users_entity';
	$selectResult = $databasecheck->Query($sqlQuery);
	$arr = array();
    $fields = mysqli_fetch_fields($selectResult);
    foreach ($fields as $val) {
        array_push($arr,$val->name);
    }
    fputcsv($output, $arr);
	mysql_connect('localhost', 'root', 'ofer');
	mysql_select_db('elgg');
	$rows = mysql_query('SELECT * FROM elgg_users_entity');
	
	while ($row = mysql_fetch_assoc($rows)){
		 fputcsv($output, $row);
	}

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
</div>

</body>
</html>