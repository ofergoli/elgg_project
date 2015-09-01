<?php
include_once('DB/DataQueries.php');
include_once('utility.php');

//createSnapshot('bgunet_db');
$allNetworksArray = DataQueries::GetAllNetworks();

foreach($allNetworksArray as $network) {
	createSnapshot($network['nid']);
}

function createSnapshot($dbName)
{


	global $DBUser, $DBPass, $Path;
	if(!is_dir($Path . "\\snapshots")) {
		mkdir($Path . "\\snapshots");
	}

	$dbPath = "\\snapshots\\" . $dbName;
	$currentDate = getdate();

	$sqlFilename = $currentDate["mday"] . "_" . $currentDate["mon"] . "_" . $currentDate["year"] . ".sql";

	echo $Path . $dbPath;
	if (!is_dir($Path . $dbPath)) {
		mkdir($Path . $dbPath);
	}
	$commandString = "mysqldump -u " . $DBUser . " --password=" . $DBPass . " " . $dbName . " > " . $Path . $dbPath . "\\" . $sqlFilename;
	echo $commandString;
	shell_exec($commandString);
}