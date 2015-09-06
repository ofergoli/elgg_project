<?php

include_once("utility.php");
include_once("MailService.php");
include_once("DB/DataQueries.php");

$result["message"] = "Failed to invite groups users";
$result["success"] = false;

if(isset($_POST["snKey"]) && isset($_POST["groups"]) && isset($_POST["emailTitle"]) && isset($_POST["emailContent"])) {
	$snKey = $_POST["snKey"];
	$groups = $_POST["groups"];
	$users = array();
	foreach($groups as $group) {
		$groupUsers = DataQueries::GetUsersFromGroup($snKey, $group);
		echo $groupUsers["email"];
	}
}