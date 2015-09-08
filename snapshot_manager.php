<?php
include_once('DB/DataQueries.php');
include_once('utility.php');

if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
}
?>


<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
<div class="row">
	<div class="col-md-5">
		<div class="row">
			<legend>
				View Snapshot
			</legend>
		</div>
		<div class="dashboard-form">
			<div class="row">
				<div class="col-sm-2 col-sm-offset-1">
					<label>Date:</label>
				</div>
				<div class="col-sm-6">
					<input type="date" id="view-datepicker" style="height: 28px;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-3 col-sm-9">
					<button id="view-snapshot-btn" class="btn btn-default">
						View Snapshot
					</button>
					<h3>
						<i id="view-snapshot-spinner" class="fa fa-spinner fa-pulse"></i>
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-3 col-sm-9">
					<h3>
						<i id="view-snapshot-spinner" class="fa fa-spinner fa-pulse"></i>
					</h3>
					<a id="view-snapshot-link" class="btn btn-default">View Network Snapshot</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
					<p>
						Choosing the 'view snapshot' option will create a new social network and the import the SQL dump
						file from the requested snapshot date.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="row">
			<legend>
				Load Snapshot
			</legend>
		</div>
		<div class="dashboard-form">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-2">
					<label>Date:</label>
				</div>
				<div class="col-sm-9">
					<input type="date" id="load-datepicker" style="height: 28px;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-3 col-sm-9">
					<button id="load-snapshot-btn" class="btn btn-default">
						<!--						<i class="glyphicon glyphicon-export"></i>-->
						Load Snapshot
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
					<h4 style="color: red">Warning!</h4>

					<p>
						This option will erase all current data on the social network database and restore the data to
						the requested snapshot date
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<img src="img/snapshot.png" class="pull-right" style="height: 110px">
	</div>
</div>