<?php
	session_start();
	include_once('utility.php');
	include_once('post.php');
	
	//using get param and do the 6 steps to install elgg and redirect to my_social_networks.php
	$paramters = $_SESSION['autoInstallParams'];

	if(isset($paramters['username']) && isset($paramters['password']) && isset($paramters['displayname'])
 	 		&& isset($paramters['sitename']) && isset($paramters['email']) && isset($paramters['path'])){
		$username = $paramters['username'];
		$password = $paramters['password'];
		$displayname = $paramters['displayname'];
		$sitename = $paramters['sitename'];
		$email = $paramters['email'];
		$path = $paramters['path'];

		$dataBaseParam = array('dbuser' => $DBUser,
							   'dbpassword' => $DBPass,
							   'dbname' => $path ,
							   'dbhost'=>'localhost',
							   'dbprefix'=>'elgg_');

		$settingsParam = array('sitename' => $sitename,
							   'siteemail' => $email,
							   'wwwroot' => $Url . '/social_networks/'.$path.'/elgg-1.9.5/' ,
							   'path'=> $Path . '\social_networks\\'.$path.'\elgg-1.9.5/',
							   'dataroot'=> $Path . '\social_networks\\'.$path.'\elgg-1.9.5\\',
							   'siteaccess'=>'Private');
		
		$adminParam = array('displayname' => $displayname,
		 					 'email' => $email,
		 					 'username' => $username ,
		 					 'password1'=> $password,
		 					 'password2'=> $password );


		$urldb = $Url . '/social_networks/'.$path.'/elgg-1.9.5/install.php?step=database';
        doPost($dataBaseParam,$urldb);

        $urlset = $Url . '/social_networks/'.$path.'/elgg-1.9.5/install.php?step=settings';
	    doPost($settingsParam,$urlset);

	    $urladm = $Url . '/social_networks/'.$path.'/elgg-1.9.5/install.php?step=admin';
		doPost($adminParam,$urladm);

		header('Location: my_social_networks.php');
	}
	// else{//redirect to index.php with error message
	// 	header('Location: http://localhost/sites/elgg_project/index.php?install_error=install_fatal_error');		
	// }		

?>