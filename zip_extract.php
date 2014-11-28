<?php

	class SocialNetwork{
		var $zip;


		public function SocialNetwork()
		{
			$this->zip = new ZipArchive;
		}
	
		function createSN(){
			$folderName = md5(uniqid(rand(), true));
			mkdir('./soical_networks/'.$folderName);
			$res = $this->zip->open('./soical_networks/elgg-1.9.5.zip');
			if ($res === TRUE) {
			    $this->zip->extractTo('./soical_networks/' . $folderName);
			    $this->zip->close();
			    return $folderName;
			} 
			else {
			    echo 'failed, code:' . $res;
			}
		}
	}

	$check = new SocialNetwork();
	$check->createSN();


?>