<?php

include_once("utility.php");
include_once("DB/AdoHelper.php");
include_once("db_connection.php");

$result["message"] = "Failed to import SQL file to database";
$result["success"] = false;

if (isset($_FILES["sql_file"])) {
	$snKey = $_POST['snKey'];

	$filename = $_FILES["sql_file"]["name"];
	$source = $_FILES["sql_file"]["tmp_name"];
	$type = $_FILES["sql_file"]["type"];
	$target_path = getcwd() . "/tmp/upload/sql/" . $filename;
	if(move_uploaded_file($source, $target_path)) {

		$name = explode(".", $filename);
		if ($type == 'application/octet-stream' && strtolower($name[1]) == 'sql') {
			$output = array();
			$command = 'mysql'
				. ' --host=localhost'
				. ' --user=' . $DBUser
				. ' --password=' . $DBPass
				. ' --database=' . $snKey
				. ' --execute="SOURCE ' . $target_path;
			$commandResult = exec($command, $output, $error);
			if (!$error) {
				$result["message"] = "Successfully restored database to the requested snapshot date";
				$result["success"] = true;
			}
		}
	}
}

echo json_encode($result);