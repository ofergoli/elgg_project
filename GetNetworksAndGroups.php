<?php 
session_start();
include_once('DB/DataQueries.php');
	$result_response = array();
	$networks = DataQueries::GetUserSocialNetworks($_SESSION['username']);
	foreach($networks as $net){
		$result_response[$net['network_name']] = array();
		$result_response[$net['network_name']][$net['network_name']] = $net['social_key'];
		$result_response[$net['network_name']]['groups']= DataQueries::GetGroups($net['social_key']);
	}
echo json_encode($result_response);
?>