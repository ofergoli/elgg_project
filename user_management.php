<?php

include_once("utility.php");
include_once("DB/DataQueries.php");
if (isset($_GET['sn'])) {
	$sn_key = $_GET['sn'];
	$networkGroups = DataQueries::GetNetworkGroups($sn_key);
}

?>

<?php echo '<input id="sn-key" class="hidden_input" name="snKey" style="visibility: hidden;" value="' . $sn_key . '"/>'; ?>


<div class="row">
	<div class="col-md-10">
		<legend>
			Send Experiment Invitations:
		</legend>
		<div class="row">
			<div class="col-md-5">
				<div class="row">
					<h4>Select the groups you wish to send an experiment invitation to:</h4>
					<?php
					foreach ($networkGroups as $group) {
						$group_id = $group["guid"];
						echo '<div class="row">' .
							'<div class="col-md-6">' .
							'<input id=group-"' . $group_id . '" data-group="' . $group_id . '" class="group-cb" type="checkbox"> ' .
							'<label for=group-"' . $group_id . '"> ' . $group["name"] . '</label>' .
							'</div>' .
							'</div>';
					}
					?>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12">
						<h4>Invitation Email:</h4>

						<div class="row">
							<div class="col-md-3">
								<label for="email-title">Subject:</label>
							</div>
							<div class="col-md-9">
								<input class="form-control" type="text" id="email-title" placeholder="Email Subject">
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-3">
								<label for="email-content">Body:</label>
							</div>
							<div class="col-md-9">
							<textarea class="form-control" name="email-content" id="email-content" cols="20" rows="10"
									  placeholder="Email Body"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-3 col-md-8">
								<button id="send-inivitation-btn" class="btn btn-default btn-lg">Send Invitations</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<img id="users-img" src="img/users.png">
	</div>
</div>
