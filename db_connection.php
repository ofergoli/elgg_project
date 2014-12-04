<?php
	define("Host", "localhost");
	define("UserName","root");
	define("Pass","ofer");
	define("Shecma","social_network");
	$conn = mysqli_connect(Host,UserName,Pass,Shecma);
	if(mysqli_connect_errno()){
		die("database problem:". mysqli_connect_error() );
	}
 ?>
