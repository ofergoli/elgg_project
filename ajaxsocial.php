<?php
	require_once("database.php");
	$db = new DataBase();

	$results;
	$results = array();

	$query = "SELECT * FROM users WHERE sn_name LIKE '". $_REQUEST['term']."%' ";

	$result = getQuery($conn,$query);	
	while($row = mysqli_fetch_array($result))
	{
		$results[] = array('label' => $row['sn_name']);
	}

	echo json_encode($results);

?>