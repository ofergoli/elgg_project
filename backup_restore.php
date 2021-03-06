<?php
include_once('DB/DataQueries.php');
include_once('utility.php');
if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
}


if (isset($_FILES["zip_file"])) {
	$snKey = $_POST['snKey'];

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

	$continue = (strtolower($name[1]) == 'zip');
	if (!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	}


	$target_path = getcwd() . "/tmp/upload/zip/" . $filename;  // change this to the correct site path
	if (move_uploaded_file($source, $target_path)) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);
		if ($x === true) {
			$folder_path = getcwd() . "/tmp/upload/zip/" . substr($filename, 0, strlen($filename) - 4);
			$zip->extractTo($folder_path); // change this to the correct site path
			$zip->close();

			unlink($target_path);
			import_to_database($folder_path, $snKey);
		}
		$message = "Your .zip file was uploaded and unpacked.";
	} else {
		$message = "There was a problem with the upload. Please try again.";
	}

	echo $message;

	exit;
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

function import_to_database($path, $dbName)
{
	$csvFiles = scandir($path);
	foreach ($csvFiles as $filename) {
		$file = fopen($path . "/" . $filename, "r");
		$table_name = substr($filename, 0, -4);
		if ($file) {
			$lines = array();
			while ($line = fgets($file)) {
				array_push($lines, "'" . str_replace(",", "','", $line) . "'");
			}
			DataQueries::ReplaceIntoTable($dbName, $table_name, $lines);
		}
	}
}

?>

<?php echo '<input id="sn-key" class="hidden_input" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
<?php include_once("modal.php"); ?>
<div class="row">
	<div class="col-sm-5">
		<legend>
			Export Database
		</legend>
		<div class="dashboard-form">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<label>Export to CSV:</label>
				</div>
				<div class="col-sm-6">
					<button id="export-csv-btn" class="btn btn-default">
						<i class="glyphicon glyphicon-export"></i>
						Export to CSV
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<h3><i id="csv-download-spinner" class="fa fa-spinner fa-pulse"></i></h3>
					<a id="csv-download" class="btn btn-default" href="" download="File">Download CSV files</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<p>
						Export the database to a ZIP file containing CSV files for each table in database
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<label>Export to SQL dump:</label>
				</div>
				<div class="col-sm-6">
					<button id="export-sql-btn" class="btn btn-default">
						<i class="glyphicon glyphicon-export"></i>
						Export to SQL dump
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<h3><i id="sql-download-spinner" class="fa fa-spinner fa-pulse"></i></h3>
					<a id="sql-download" class="btn btn-default" href="" download="File">Download SQL dump</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<p>
						Export the database to SQL dump file. This option is recommended if you only need to download a backup for the database and do not need to edit the data
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-5">
		<legend>
			Import Database
		</legend>
		<form id="upload-zip" enctype="multipart/form-data" method="post" action="backup_restore.php">
			<div class="dashboard-form">
				<div class="row">
					<div class="col-sm-5 col-sm-offset-1">
						<label>Import from CSV:</label>
					</div>
					<div class="col-sm-6">
						<button type="button" id="upload-csv-btn" class="btn btn-default">
							Upload CSV files
						</button>
						<input id="upload-csv-file" name="zip_file" type="file" accept="application/zip"
							   style="visibility: hidden"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-6 col-sm-6">
						<p>Import data from CSV files containing database table data. Note that the CSV files structure should be the same as the export CSV output</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-6 col-sm-6">
						<button type="button" id="csv-import-btn" class="btn btn-default" href="">
							<i class="glyphicon glyphicon-import"></i>
							Import from CSV
						</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-6">
						<label id="override-data-cb">
							<input name="override_data" type="checkbox"/>
							Override existing data
						</label>
					</div>
				</div>
			</div>
		</form>
		<form id="upload-sql" enctype="multipart/form-data" method="post" action="backup_restore.php">
			<div class="dashboard-form">
				<div class="row">
					<div class="col-sm-5 col-sm-offset-1">
						<label>Import from SQL dump:</label>
					</div>
					<div class="col-sm-6">
						<button type="button" id="upload-sql-btn" class="btn btn-default">
							Upload SQL file
						</button>
						<input id="upload-sql-file" name="sql_file" type="file" accept="*.sql"
							   style="visibility: hidden"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-6 col-sm-6">
						<p>Import data from CSV files containing database table data. Note that the CSV files structure should be the same as the export CSV output</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-6 col-sm-6">
						<button type="button" id="sql-import-btn" class="btn btn-default" href="">
							<i class="glyphicon glyphicon-import"></i>
							Import from SQL
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<div class="col-sm-2">
		<img id="db-img" class="pull-right" src="img/db.png" alt="Database"/>
	</div>
</div>