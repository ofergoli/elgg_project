<?php

include_once("utility.php");
include_once("MailService.php");
include_once("DB/DataQueries.php");

$result["message"] = "Failed to invite groups users";
$result["success"] = false;

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


if(isset($_POST["snKey"]) && isset($_POST["groups"]) && isset($_POST["emailTitle"]) && isset($_POST["emailContent"])) {
	$snKey = $_POST["snKey"];
	$groups = $_POST["groups"];
	$emailTitle = $_POST["emailTitle"];
	$emailContent = $_POST["emailContent"];
	$emails = array();
	foreach($groups as $group) {
		$groupUsers = DataQueries::GetUsersFromGroup($snKey, $group);
		foreach($groupUsers as $user) {
			if(!in_array($user["email"], $emails)) {
				array_push($emails, $user["email"]);
			}
		}
	}

	$mailService = new MailService();
	foreach($emails as $email) {
		$mailService->Send($email, $emailTitle, $emailContent);
	}

//	$result["message"] = "Successfully sent invitations to the selected groups' members";
//	$result["success"] = true;
}

//echo json_encode($result);