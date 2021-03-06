<?php

include_once("utility.php");
include_once("DB/AdoHelper.php");
include_once("db_connection.php");

$result["success"] = false;
$result["message"] = "Could not find a snapshot for the requested date";

if (isset($_POST["snapshotFilename"]) && isset($_POST["snKey"])) {
	$snapshotFilename = $_POST["snapshotFilename"];
	$snKey = $_POST["snKey"];
	$snapshotPath = $Path . "\\snapshots\\" . $snKey . "\\" . $snapshotFilename;

	if (file_exists($snapshotPath)) {

		$output = array();
		$command = 'mysql'
			. ' --host=localhost'
			. ' --user=' . $DBUser
			. ' --password=' . $DBPass
			. ' --database=' . $snKey
			. ' --execute="SOURCE ' . $snapshotPath;
		$commandResult = exec($command, $output, $error);
		if (!$error) {
			$result["message"] = "Successfully restored database to the requested snapshot date";
			$result["success"] = true;
		}
	}
}

echo json_encode($result);