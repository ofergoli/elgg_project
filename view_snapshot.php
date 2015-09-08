<?php
error_reporting(E_ERROR | E_PARSE);

include_once("utility.php");
include_once("DB/DataQueries.php");
include_once("db_connection.php");
include_once("zip_extract.php");

$result["success"] = false;
$result["message"] = "Could not find a snapshot for the requested date";


if (isset($_POST["snapshotFilename"]) && isset($_POST["snKey"])) {
	$snapshotFilename = $_POST["snapshotFilename"];
	$snKey = $_POST["snKey"];
	$snapshotPath = $Path . "\\snapshots\\" . $snKey . "\\" . $snapshotFilename;

	if (file_exists($snapshotPath)) {

		$copyNetworkName = $snKey . "_copy";

		// Copy social network directory
		$dest = $Path . "/social_networks/" . $copyNetworkName;
		$source = $Path . "/social_networks/" . $snKey . "/";

		mkdir($dest, 0755);
		foreach ($iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
			\RecursiveIteratorIterator::SELF_FIRST) as $item) {
			if ($item->isDir()) {
				mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
			} else {
				if (endsWith($item, "engine\\settings.php")) {
					$oldFile = fopen($item, "r");
					$newFile = fopen($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName(), "w");
					if ($oldFile) {
						$lines = array();
						while ($line = fgets($oldFile)) {
							fwrite($newFile, str_replace($snKey, $copyNetworkName, $line));
						}
					}
					fclose($oldFile);
					fclose($newFile);

				} else {
					copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
				}
			}
		}

		DataQueries::CreateDB($copyNetworkName);

		$output = array();
		$command = 'mysql'
			. ' --host=localhost'
			. ' --user=' . $DBUser
			. ' --password=' . $DBPass
			. ' --database=' . $copyNetworkName
			. ' --execute="SOURCE ' . $snapshotPath;
		$commandResult = exec($command, $output, $error);
		if (!$error) {
			DataQueries::UpdateCopyDatabase($copyNetworkName, $snKey);
			$result["message"] = "Successfully restored database to the requested snapshot date";
			$result["success"] = true;
			$result["url"] = $Url . "/social_networks/" . $copyNetworkName . "/elgg-1.9.5/index.php";;
		}

	}
}


echo json_encode($result);

function startsWith($haystack, $needle)
{
	// search backwards starting from haystack length characters from the end
	return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

function endsWith($haystack, $needle)
{
	// search forward starting from end minus needle length characters
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}
