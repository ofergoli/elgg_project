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

	foreach ($files as $file) {
		if (!$file->isDir()) {
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);
			$zip->addFile($filePath, $relativePath);
		}
	}

	$zip->close();
	return $path . ".zip";
}

?>

<div class="row">
	<div class="col-sm-5">
		<legend>
			Export Database
		</legend>
		<dl class="dl-horizontal">
			<dt>Export database to CSV:</dt>
			<dd>
				<button id="export-db" class="btn btn-default">
					<i class="glyphicon glyphicon-export"></i>
					Export to CSV
				</button>
				<?php echo '<input id="sn-key" class="hidden_input" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
			</dd>
			<dt></dt>
			<dd>
				<h3><i class="fa fa-spinner fa-pulse"></i></h3>
				<a id="csv-download" class="btn btn-default" href="" download="File">Download CSV files</a>
			</dd>
		</dl>
	</div>
	<div class="col-sm-5">
		<legend>
			Import Database
		</legend>
		<dl class="dl-horizontal">
			<dt>Import database from CSV:</dt>
			<dd>
				<button id="import-db" class="btn btn-default">
					<i class="glyphicon glyphicon-import"></i>
					Import from CSV
				</button>
				<?php echo '<input id="sn-key" class="hidden_input" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
			</dd>
		</dl>
	</div>
	<div class="col-sm-2">
		<img id="db-img" class="pull-right" src="img/db.png" alt="Database"/>
	</div>
</div>