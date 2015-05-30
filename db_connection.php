<?php
	include('utility.php');
	//db connection
	define("Host", "localhost");
	define("UserName",$DBUser);
	define("Pass",$DBPass);
	define("Schema","bgunet_db");
	$conn = mysqli_connect(Host,UserName,Pass,Schema);
	if(mysqli_connect_errno()){
		die("database problem:". mysqli_connect_error() );
	}
 ?>