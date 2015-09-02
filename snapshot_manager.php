<?php
include_once('DB/DataQueries.php');
include_once('utility.php');

if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
}
?>


<div class="row">
	<div class="col-md-5">
		<div class="row">
			<legend>
				View Snapshot
			</legend>
		</div>
		<div class="row">
			<dl class="dl-horizontal">
				<dt>Date:</dt>
				<dd>
					<input type="date" id="view-datepicker" style="height: 28px;">
				</dd>
				<dt style="padding-top: 15px;">Snapshot:</dt>
				<dd style="padding-top: 15px;">
					<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
					<button id="view-snapshot-btn" class="btn btn-default btn-xs">
						View
					</button>
				</dd>
			</dl>
		</div>
		<div class="row">
			<div class="well well-sm">
				You can view a snapshot of previous state of the network. <br/>
				Please choose a date and then press the View button.
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="row">
			<legend>
				Load Snapshot
			</legend>
		</div>
		<div class="row">
			<dl class="dl-horizontal">
				<dt>Date:</dt>
				<dd>
					<input type="date" id="load-datepicker" style="height: 28px;">
				</dd>
				<dt style="padding-top: 15px;">Snapshot:</dt>
				<dd style="padding-top: 15px;">
					<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
					<button id="load-snapshot-btn" class="btn btn-default btn-xs">
						<!--						<i class="glyphicon glyphicon-export"></i>-->
						Load
					</button>
				</dd>
			</dl>
		</div>
		<div class="row">
			<div class="well well-sm">
				You can Import a snapshot of previous state of the network. <br/>
				Please choose a date and then press the Load button.
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<img src="img/snapshot.png" class="pull-right" style="height: 110px">
	</div>
</div>