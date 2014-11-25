<?php 
	require_once("database.php");
	require_once("csv_exporter.php");

	//$pass = md5("ronkahat" . "M0ABlCEl");
	//echo $pass;
	echo "shiloo";
	export_csv("elgg_users_entity");
	//export_csv("elgg_access_collections");

?>