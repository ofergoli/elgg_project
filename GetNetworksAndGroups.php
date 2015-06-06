<?php 
session_start();
include_once('DB/DataQueries.php');
	$user = DataQueries::GetUserByName($_SESSION['username']);
	$result_response = array();
	$networks = DataQueries::GetUserSocialNetworks($user[0]['uid']);
	//print_r($networks[0]);
	foreach($networks as $net){
		$result_response[$net['name']] = array();
		$result_response[$net['name']][$net['name']] = $net['nid'];
		$result_response[$net['name']]['groups']= DataQueries::GetGroups($net['nid']);
	}
echo json_encode($result_response);
?>