<?php 
	require_once("database.php");
	require_once("csv_exporter.php");
	
	if(isset($_GET['filename'])){
		export_csv($_GET['filename']);
	}

	//$pass = md5("ronkahat" . "M0ABlCEl");
	//echo $pass;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="mainpage">
		<h1>Select table to Download (csv file)</h1>
		<div class="download_section">
			<form action="index.php" method="get">
				<select name="filename">
					<?php 
						$db = new DataBase();
						$resultTableName = $db->Query("SHOW TABLES FROM elgg");
						while ($row = mysqli_fetch_row($resultTableName)) {
						    echo "<option value='{$row[0]}'> {$row[0]} </option>";
						}	
					?>
				</select>
				<input type="submit" value="download" id="bt_csv"/>
			</form>
		</div>
	</div>
</body>
</html>



