<?php
include_once("DB/DataQueries.php");

if(isset($_GET["snKey"])) {
	$snKey = $_GET["snKey"];
	$notifications = DataQueries::GetNotifications($snKey);

	$result = array();

	foreach($notifications as $notification) {
		array_push($result, array("type" => $notification["type"], "timeStamp" => $notification["time_created"]));
	}

	echo json_encode($result);
}
