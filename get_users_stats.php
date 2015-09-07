<?php

include_once("DB/DataQueries.php");

if(isset($_GET["snKey"])) {
	$snKey = $_GET["snKey"];
	$usersStats = DataQueries::GetUsersStats($snKey);

	$result = array();

	foreach($usersStats as $stats) {
		array_push($result, array("date" => $stats["date"], "userCount" => $stats["users_count"]));
	}

	echo json_encode($result);
}

