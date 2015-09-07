<?php

include_once("DB/DataQueries.php");

if(isset($_GET["snKey"])) {
	$snKey = $_GET["snKey"];
	$usersStats = DataQueries::GetGroupsStats($snKey);

	$result = array();

	foreach($usersStats as $stats) {
		array_push($result, array("groupName" => $stats["group_name"], "filesCount" => $stats["files"]));
	}

	echo json_encode($result);
}
