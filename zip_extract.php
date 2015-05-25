<?php
	//extreacting the file. opens a new folder with a given md5 hash create folder and execut the 
	//soical network into the md5 folder
	class SocialNetwork{
		var $zip;

		public function SocialNetwork()
		{
			$this->zip = new ZipArchive;
		}
	
		function createSN(){
			$folderName = md5(uniqid(rand(), true));
			mkdir('./soical_networks/'.$folderName);
			$res = $this->zip->open('./social_networks/elgg-1.9.5.zip');
			if ($res === TRUE) {
			    $this->zip->extractTo('./social_networks/' . $folderName);
			    $this->zip->close();
			    return $folderName;
			} 
			else {
			    echo 'failed';
			}
		}
	}
?>