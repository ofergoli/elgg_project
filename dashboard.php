<?php
include_once("header.php");
include_once('DB/DataQueries.php');
//include session
session_start();
$username = "";
//check if session alive else redirect to login page
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
else {
	header('Location: login.php');
}

include_once('body_header.php');
?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h3>
						<span class="glyphicon glyphicon-dashboard"></span>
						Experiment Tools
					</h3>
				</div>
				<div role="tabpanel">
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active">
							<a href="#backup" aria-controls="backup" role="tab" data-toggle="tab">Backup</a>
						</li>
						<li role="presentation">
							<a href="#snapshots" aria-controls="snapshots" role="tab" data-toggle="tab">Snapshots</a>
						</li>
						<li role="presentation">
							<a href="#user-management" aria-controls="user-management" role="tab" data-toggle="tab">User
								Management</a>
						</li>
						<li role="presentation">
							<a href="#file-validation" aria-controls="file-validation" role="tab" data-toggle="tab">File
								Validation</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="backup">
					</div>
					<div role="tabpanel" class="tab-pane" id="snapshots">
					</div>
					<div role="tabpanel" class="tab-pane" id="user-management">
					</div>
					<div role="tabpanel" class="tab-pane" id="file-validation">
					</div>
				</div>
			</div>
		</div>
	</div>

<?php

include_once("footer.php");

?>