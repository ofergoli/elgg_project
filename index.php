<?php 
	require_once("database.php");
	require_once("csv_exporter.php");
	require_once("zip_extract.php");
	
	if(isset($_GET['filename'])){
		export_csv($_GET['filename']);
	}
	if(isset($_GET['soicalname'])){
		$check = new SocialNetwork();
		$check->createSN();
	}
	//$pass = md5("ronkahat" . "M0ABlCEl");
	//echo $pass;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/elggstyle.css" type="text/css">
</head>
<body>
	<header class="elgg-page-header" role="banner">
				<img src="img/elgg_logo.png" alt="Elgg">
	</header>
	<div class='wapper'>
		<div class="elgg-page-body">
			<h1>Execute CSV File choose table</h1>
			<div class="download_section">
				<form action="index.php" method="get">
					<select class="elgg-input-text" name="filename">
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
		<div class="elgg-page-body">
			<h1>Create new Soical Network</h1>
				<form action="index.php" method="get">
					<input type="text" name="soicalname"/> 
					<input type="submit" value="install" />
				</form>
		</div>
	</div>
</body>
</html>



