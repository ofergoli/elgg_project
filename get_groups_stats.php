<?php

include_once("DB/DataQueries.php");

if(isset($_GET["snKey"])) {
	$snKey = $_GET["snKey"];
	$usersStats = DataQueries::GetGroupsStats($snKey);

	$result = array();

	foreach($usersStats as $stats) {
		array_push($result, array("groupName" => $stats["group_name"], "postsCount" => $stats["posts"]));
	}

	echo json_encode($result);
}

