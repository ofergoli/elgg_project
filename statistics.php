<?php
if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
}

?>

<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>


<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default" style="height: 485px;">
			<div class=" panel-heading">
				<i class="glyphicon glyphicon-stats"></i> Users Usage
			</div>
			<div id="users_amount_line" style="padding-top: 23px">
			</div>

		</div>
	</div>
	<div class="col-lg-4">
		<div id="notification-panel" class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-bell"></i> Notifications Panel
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="list-group">
				</div>
				<!-- /.list-group -->
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				Groups Usage
			</div>
			<div id="profiles_use">
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				Posts Made
			</div>
			<div id="file_type_pie">

			</div>
		</div>
	</div>
</div>