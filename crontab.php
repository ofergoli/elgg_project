<?php
include_once('DB/DataQueries.php');
include_once('utility.php');

//createSnapshot('bgunet_db');
$allNetworksArray = DataQueries::GetAllNetworks();

foreach($allNetworksArray as $network) {
	createSnapshot($network['nid']);
}

echo "Successfully created snapshots for all networks";

function createSnapshot($dbName)
{


	global $DBUser, $DBPass, $Path;
	if(!is_dir($Path . "\\snapshots")) {
		mkdir($Path . "\\snapshots");
	}

	$dbPath = "\\snapshots\\" . $dbName;
	$currentDate = getdate();

	$sqlFilename = $currentDate["mday"] . "_" . $currentDate["mon"] . "_" . $currentDate["year"] . ".sql";

	if (!is_dir($Path . $dbPath)) {
		mkdir($Path . $dbPath);
	}
	$commandString = "mysqldump -u " . $DBUser . " --password=" . $DBPass . " " . $dbName . " > " . $Path . $dbPath . "\\" . $sqlFilename;
	shell_exec($commandString);
}