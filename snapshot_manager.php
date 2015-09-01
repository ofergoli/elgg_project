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
				Create Snapshot
			</legend>
		</div>
		<div class="row">
			<dl class="dl-horizontal">
				<dt>Date:</dt>
				<dd>
					<input type="text" id="export_datepicker">
				</dd>
				<dt style="padding-top: 15px;">Snapshot:</dt>
				<dd style="padding-top: 15px;">
					<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
					<button class="btn btn-default btn-xs">
						Download
					</button>
				</dd>
			</dl>
		</div>
		<div class="row">
			<div class="well well-sm">
				You can download a snapshot of previous state of the network. <br/>
				Please choose a date and than press the Download button.
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
					<input type="text" id="import_datepicker">
				</dd>
				<dt style="padding-top: 15px;">Snapshot:</dt>
				<dd style="padding-top: 15px;">
					<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>
					<button class="btn btn-default btn-xs">
						<!--						<i class="glyphicon glyphicon-export"></i>-->
						Load
					</button>
				</dd>
			</dl>
		</div>
		<div class="row">
			<div class="well well-sm">
				You can Import a snapshot of previous state of the network. <br/>
				Please choose a date and than press the Load button.
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<img src="img/snapshot.png" class="pull-right" style="height: 110px">
	</div>
</div>