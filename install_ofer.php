<?php
	$url = 'http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/install.php?step=database';
	$data = array('dbuser' => 'root', 'dbpassword' => 'ofer','dbname' => $_GET['db_name'] , 'dbhost'=>'localhost','dbprefix'=>'elgg_');

	// use key 'http' even if you send the request to https://...
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data),
	    ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);


	$url2 = 'http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/install.php?step=settings';
	$data2 = array('sitename' => 'goliworld', 'siteemail' => 'goli@world.com','wwwroot' => 'http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/' , 'path'=>'C:\xampp\htdocs\sites\elgg_project\soical_networks\\'.$_GET['db_name'].'\elgg-1.9.5/','dataroot'=> 'C:\xampp\htdocs\sites\elgg_project\soical_networks\\'.$_GET['db_name'].'\elgg-1.9.5\\','siteaccess'=>'Private');

	// use key 'http' even if you send the request to https://...
	$options2 = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data2),
	    ),
	);
	$context2  = stream_context_create($options2);
	$result2 = file_get_contents($url2, false, $context2);


	$url3 = 'http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/install.php?step=admin';
	$data3 = array('displayname' => 'GOLISOICAL', 'email' => 'goli@world.com','username' => 'ofergoli' , 'password1'=>'goliworld','password2'=>'goliworld');

	// use key 'http' even if you send the request to https://...
	$options3 = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data3),
	    ),
	);
	$context3  = stream_context_create($options3);
	$result3 = file_get_contents($url3, false, $context3);
	
	header('Location: http://localhost/sites/elgg_project/soical_networks/'.$_GET['db_name'].'/elgg-1.9.5/admin');

?>