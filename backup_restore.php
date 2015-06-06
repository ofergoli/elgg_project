<?php
include_once('DB/DataQueries.php');
include_once('utility.php');
if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
}
if (isset($_POST['dbName'])) {
	$path = DataQueries::GetAllTables($_POST['dbName']);
	$result = new stdClass();
	$result->filename = basename($path);
	$result->url = $Url . "/" . create_zip($path);
	echo json_encode($result);
	exit;
}

function create_zip($path)
{
	$rootPath = realpath($path);
	$zip = new ZipArchive();
	$zip->open($path . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach($files as $file) {
		if(!$file->isDir()) {
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			$zip->addFile($filePath, $relativePath);
		}
	}

	$zip->close();

//	foreach($files as $file) {
//		chmod($file, 0750);
//		unlink($file);
//	}
	return $path . ".zip";
}

?>

<h3>Backup & Restore</h3>
<div class="content-box">
	<h4>Export database to CSV:</h4>
	<button id="export-db" class="btn btn-default">Export to CSV</button>
	<?php echo '<input id="sn-key" class="hidden_input" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
	<h3><i class="fa fa-spinner fa-pulse"></i></h3>
	<a id="csv-download" class="btn btn-default" href="" download="File">Download CSV filesV</a>
</div>