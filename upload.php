<?php
	if($_FILES['file']['upload'] != "" )
	{
	   copy( $_FILES['file']['upload'], "C:"\xampp"\htdocs"\sites"\elgg_project" ) or 
	           die( "Could not copy file!");
	}
	else
	{
	    die("No file specified!");
	}
?>
<html>
<head>
<title>Uploading Complete</title>
</head>
	<body>
		<h2>Uploaded File Info:</h2>
	<ul>
		<li>Sent file: <?php echo $_FILES['file']['name'];  ?>
		<li>File size: <?php echo $_FILES['file']['size'];  ?> bytes
		<li>File type: <?php echo $_FILES['file']['type'];  ?>
	</ul>
	</body>
</html>