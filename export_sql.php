<?php

include_once("utility.php");
include_once("DB/AdoHelper.php");
include_once("db_connection.php");

$result["url"] = "";
$result["success"] = false;

if(isset($_POST["dbName"])) {
	$dbName = $_POST["dbName"];
	$fullPath = $Path . "\\tmp\\download\\sql\\" .$dbName. ".sql";
	$commandString = "mysqldump -u " . $DBUser . " --password=" . $DBPass . " " . $dbName . " > " . $fullPath;
	$output = array();
	exec($commandString, $output, $error);
	if(!$error) {
		$result["url"] = $Url . "/tmp/download/sql/" .$dbName. ".sql";
		$result["success"] = true;
		$result["filename"] = $dbName. ".sql";
	}
	echo json_encode($result);
}