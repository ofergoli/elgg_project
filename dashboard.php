<?php
require_once("header.php");
require_once('DB/DataQueries.php');
//include session
session_start();
$username = "";
//check if session alive else redirect to login page
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
} else {
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
						<?php echo "Tools for " . $_GET['name'] . " network" ?>
					</h3>
				</div>
				<div role="tabpanel">
					<ul class="nav nav-tabs nav-justified" role="tablist">

						<li role="presentation" class="active">
							<a href="#statistics" aria-controls="statistics" role="tab" data-toggle="tab">
								Statistics </a>
						</li>

						<li role="presentation" >
							<a href="#backup" aria-controls="backup" role="tab" data-toggle="tab">Backup & Restore</a>
						</li>
						<li role="presentation">
							<a href="#snapshots" aria-controls="snapshots" role="tab" data-toggle="tab">Snapshots</a>
						</li>
						<li role="presentation">
							<a href="#user-management" aria-controls="user-management" role="tab" data-toggle="tab">User
								Management</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="statistics">
						<div class="content-box tab-content">
							<?php require_once('statistics.php'); ?>

						</div>
					</div>

					<div role="tabpanel" class="tab-pane" id="backup">
						<div class="content-box tab-content">
							<?php require_once('backup_restore.php'); ?>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="snapshots">
						<div class="content-box tab-content">
							<?php require_once('snapshot_manager.php'); ?>

						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="user-management">
						<div class="content-box tab-content">
							<?php require_once('user_management.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php

include_once("footer.php");

?>