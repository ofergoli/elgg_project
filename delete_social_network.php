<?php

session_start();
require_once("database.php");
include_once('DB/DataQueries.php');
$username = $_POST['username'];
$password = $_POST['password'];
$networkSocialKey = $_POST['hash'];

// Get User details from DB.
$user = DataQueries::VerifyUser($username, $password);

// Authenticate User:
if (!isset($user)) {
	// Invalid credentials.
	$response = array('status' => 'Invalid Credentials');
	header('Content-Type: application/json');
	echo json_encode($response);
} else {
	// Get Network from DB.
	$network = DataQueries::GetNetworkBySocialKey($networkSocialKey);
	// Check if Network exists.
	if (!empty($network)) {
		// Delete Network from the DB, its DB and files on HD.
		DataQueries::DeleteNetwork($networkSocialKey, $username);
		DataQueries::DeleteDB($networkSocialKey);
		recursive_delete_folder($networkSocialKey);

		// Return response (success).
		$response = array('status' => 'success');
		header('Content-Type: application/json');
		echo json_encode($response);
		//header('Location: index.php');
	}
}


function recursive_delete_folder($socialKey)
{
	$delete_folder = dirname(__FILE__) . '\social_networks\\' . $socialKey;
	$it = new RecursiveDirectoryIterator($delete_folder, RecursiveDirectoryIterator::SKIP_DOTS);
	$files = new RecursiveIteratorIterator($it,
		RecursiveIteratorIterator::CHILD_FIRST);
	foreach ($files as $file) {
		if ($file->getFilename() === '.' || $file->getFilename() === '..') {
			continue;
		}
		if ($file->isDir()) {
			rmdir($file->getRealPath());
		} else {
			unlink($file->getRealPath());
		}
	}
	rmdir($delete_folder);
}

