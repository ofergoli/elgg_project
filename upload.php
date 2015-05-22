<?php
include_once('post.php');
include_once('utility.php');

function uploadCsv($file)
{
	try {
		global $Url;
		if ($file['error'] == 0) {
			$name = $file['name'];
			$ext = strtolower(end(explode('.', $file['name'])));
			$type = $file['type'];
			$tmpName = $file['tmp_name'];
			if ($ext === 'csv') {
				if (($handle = fopen($tmpName, 'r')) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
						$newUser = array('username' => $data[0],
							'password' => $data[1],
							'name' => $data[3],
							'email' => $data[2]);
						$path = $Url . "/social_networks/" . $_POST['select'] . "/elgg-1.9.5/engine/start.php";
						doPost($newUser, $path);
					}
				}
				return true;
			}
			return false;
		}
	} catch (Exception $e) {
		return false;
	}
}

?>
