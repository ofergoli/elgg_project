<?php
include_once('DB/DataQueries.php');
include_once('utility.php');
if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
}

if ($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];

	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach ($accepted_types as $mime_type) {
		if ($mime_type == $type) {
			$okay = true;
			break;
		}
	}

	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if (!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	}

	$target_path = "C:/xampp/htdocs/elgg_project/tmp/upload/" . $filename;  // change this to the correct site path
	if (move_uploaded_file($source, $target_path)) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);
		if ($x === true) {
			$zip->extractTo("C:/xampp/htdocs/elgg_project/tmp/upload/" . substr($filename, 0, strlen($filename) - 4)); // change this to the correct site path
			$zip->close();

			unlink($target_path);
		}
		$message = "Your .zip file was uploaded and unpacked.";
	} else {
		$message = "There was a problem with the upload. Please try again.";
	}
}


if (isset($_POST['dbName'])) {
	if (isset($_POST['zipFile'])) {
		echo json_encode($_POST['zipFile']);
		exit;
	} else {
		$path = DataQueries::GetAllTables($_POST['dbName']);
		$result = new stdClass();
		$result->filename = basename($path);
		$result->url = $Url . "/" . create_zip($path);
		echo json_encode($result);
		exit;
	}
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

function extract_zip($zipFile)
{

}

?>

<div class="row">
	<div id="export-container" class="col-sm-5">
		<legend>
			Export Database
		</legend>
		<dl class="dl-horizontal">
			<dt>Export database to CSV:</dt>
			<dd>
				<button id="export-db-btn" class="btn btn-default">
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
	<div id="import-container" class="col-sm-5">



<!--		<form enctype="multipart/form-data" method="post" action="backup_restore.php">-->
<!--			<label>Choose a zip file to upload: <input type="file" name="zip_file"/></label>-->
<!--			<br/>-->
<!--			<input type="submit" name="submit" value="Upload"/>-->
<!--		</form>-->



		<legend>
			Import Database
		</legend>
		<form id="upload-zip" enctype="multipart/form-data" method="post" action="backup_restore.php">

			<dl class="dl-horizontal">
				<dt>Import database from CSV:</dt>
				<dd>
					<button type="button" id="upload-csv-btn" class="btn btn-default">
						Upload CSV files
					</button>

					<input id="upload-csv-file" name="zip_file" type="file" accept="application/zip"
						   style="visibility: hidden"/>
					<?php echo '<input id="sn-key" class="hidden_input" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
				</dd>
				<dt></dt>
				<dd>
					<label id="override-data-cb">
						<input name="override_data" type="checkbox"/>
						Override existing data
					</label>
				</dd>
				<dt></dt>
				<dd>
					<!-- <h3><i class="fa fa-spinner fa-pulse"></i></h3>-->
					<button id="csv-import-btn" class="btn btn-default" href="">
						<i class="glyphicon glyphicon-import"></i>
						Import from CSV
					</button>
				</dd>
			</dl>
		</form>
	</div>
	<div class="col-sm-2">
		<img id="db-img" class="pull-right" src="img/db.png" alt="Database"/>
	</div>
</div>