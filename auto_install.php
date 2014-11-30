<?php
	function doPost($parameters,$path,$step){
		$url = 'http://localhost/sites/elgg_project/soical_networks/'.$path.'/elgg-1.9.5/install.php?step='.$step;
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($parameters),
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	}

	if(isset($_GET['db_name'])){

		$dataBaseParam = array('dbuser' => 'root',
							   'dbpassword' => 'ofer',
							   'dbname' => $_GET['db_name'] ,
							   'dbhost'=>'localhost',
							   'dbprefix'=>'elgg_');

		$settingsParam = array('sitename' => 'goliworld',
							   'siteemail' => 'goli@world.com',
							   'wwwroot' => 'http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/' ,
							   'path'=>'C:\xampp\htdocs\sites\elgg_project\soical_networks\\'.$_GET['db_name'].'\elgg-1.9.5/',
							   'dataroot'=> 'C:\xampp\htdocs\sites\elgg_project\soical_networks\\'.$_GET['db_name'].'\elgg-1.9.5\\',
							   'siteaccess'=>'Private');
		
		$adminParam = array('displayname' => 'GOLISOICAL',
		 					 'email' => 'goli@world.com',
		 					 'username' => 'ofergoli' ,
		 					 'password1'=>'goliworld',
		 					 'password2'=>'goliworld');

        doPost($dataBaseParam,$_GET['db_name'],'database');
	    doPost($settingsParam,$_GET['db_name'],'settings');
		doPost($adminParam,$_GET['db_name'],'admin');
	   	header('Location: http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/admin');
	}
	else{//redirect to index.php with error message
		header('Location: http://localhost/sites/elgg_project/index.php?install_error=install_fatal_error');		
	}
?>