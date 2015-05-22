<?php
	session_start();
	require_once("database.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hash = $_POST['hash'];

	$db = new DataBase();

	$query_escaped = sprintf("SELECT * from users where username='%s'",mysql_real_escape_string($username));
	$result = $db->Query($query_escaped);

	$row = $result->fetch_assoc();
	//insert into session global object the user & pass
	if($row['password'] === $password){// good

		$foundNetwork = false;
		$networkQuery_escaped = sprintf("SELECT social_key from networks where username='%s'",mysql_real_escape_string($username));
		$networkResult = $db->Query($networkQuery_escaped);
		while($row = $networkResult->fetch_assoc()){
			if($row['social_key'] == $hash)
				$foundNetwork = true;
		}
		if($foundNetwork){
			if(($key = array_search($hash, $_SESSION['social_networks_key_val'])) !== false) {
				unset($_SESSION['social_networks_key_val'][$key]);
			}

			//delete the social network from the table
			$delete_from_networks = "DELETE FROM networks where social_key='" . $hash . "' and username='" . $username . "'";
			$db->Query($delete_from_networks);

	        //Dropping DataBASE !!!
			$drop_db = "DROP DATABASE " . $hash;
			$db->Query($drop_db); 
	         //deleting all files in the $hash folder name --> all the folder of the social network
			$delete_folder = dirname(__FILE__) . "\social_networks\\" . $hash ;
	         //recursive function that delete in a given path all files in that folder
			function recursive_delete_folder($delete_folder){
				$it = new RecursiveDirectoryIterator($delete_folder, RecursiveDirectoryIterator::SKIP_DOTS);
				$files = new RecursiveIteratorIterator($it,
					RecursiveIteratorIterator::CHILD_FIRST);
				foreach($files as $file) {
					if ($file->getFilename() === '.' || $file->getFilename() === '..') {
						continue;
					}
					if ($file->isDir()){
						rmdir($file->getRealPath());
					} else {
						unlink($file->getRealPath());
					}
				}
				rmdir($delete_folder);
			}
	        //calling remove recursive
			recursive_delete_folder($delete_folder);
			$response = array('status' => 'success');
			header('Content-Type: application/json');
			echo json_encode($response);
			}
	}
	else{// invalid password
		$response = array('status' => 'invalid credentials');
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	// $data = array( 'username' => $username, 'password' => $password, 'hash' => $hash);
	// header('Content-Type: application/json');
	// echo json_encode($data);
?>