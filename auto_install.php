<?php
	session_start();
	include_once('post.php');
	//using get param and do the 6 steps to install elgg and redirect to my_social_networks.php
	if(isset($_GET['username']) && isset($_GET['password']) && isset($_GET['displayname']) && 
									isset($_GET['sitename']) && isset($_GET['email']) && isset($_GET['path'])) {

		$username = $_GET['username'];
		$password = $_GET['password'];
		$displayname = $_GET['displayname'];
		$sitename = $_GET['sitename'];
		$email = $_GET['email'];
		$path = $_GET['path'];

		$dataBaseParam = array('dbuser' => 'root',
							   'dbpassword' => 'ofer',
							   'dbname' => $path ,
							   'dbhost'=>'localhost',
							   'dbprefix'=>'elgg_');

		$settingsParam = array('sitename' => $sitename,
							   'siteemail' => $email,
							   'wwwroot' => 'http://localhost/sites/elgg_project/soical_networks/'.$path.'/elgg-1.9.5/' ,
							   'path'=>'C:\xampp\htdocs\sites\elgg_project\soical_networks\\'.$path.'\elgg-1.9.5/',
							   'dataroot'=> 'C:\xampp\htdocs\sites\elgg_project\soical_networks\\'.$path.'\elgg-1.9.5\\',
							   'siteaccess'=>'Private');
		
		$adminParam = array('displayname' => $displayname,
		 					 'email' => $email,
		 					 'username' => $username ,
		 					 'password1'=> $password,
		 					 'password2'=> $password );


		$urldb = 'http://localhost/sites/elgg_project/soical_networks/'.$path.'/elgg-1.9.5/install.php?step=database';
        doPost($dataBaseParam,$urldb);

        $urlset = 'http://localhost/sites/elgg_project/soical_networks/'.$path.'/elgg-1.9.5/install.php?step=settings';
	    doPost($settingsParam,$urlset);

	    $urladm = 'http://localhost/sites/elgg_project/soical_networks/'.$path.'/elgg-1.9.5/install.php?step=admin';
		doPost($adminParam,$urladm);

		header('Location: my_social_networks.php');
	   	//header('Location: http://localhost/sites/elgg_project/soical_networks/'.$path.'/elgg-1.9.5/admin');
	}
	// else{//redirect to index.php with error message
	// 	header('Location: http://localhost/sites/elgg_project/index.php?install_error=install_fatal_error');		
	// }

?>