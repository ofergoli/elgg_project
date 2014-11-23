<?php 

	function export_csv($table_to_export){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=' . $table_to_export . '.csv');
		$output = fopen('php://output', 'w');

		$databasecheck = new DataBase();
		$sqlQuery = 'select * from ' . $table_to_export;
		$selectResult = $databasecheck->Query($sqlQuery);
		$arr = array();
   		$fields = mysqli_fetch_fields($selectResult);
   		foreach ($fields as $val) {
   		     array_push($arr,$val->name);
   		}
    	fputcsv($output, $arr);
		mysql_connect('localhost', 'root', 'ofer');
		mysql_select_db('elgg');
		$rows = mysql_query('SELECT * FROM ' . $table_to_export);
		while ($row = mysql_fetch_assoc($rows)){
			 fputcsv($output, $row);
		}
	}
?>