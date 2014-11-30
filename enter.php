<!DOCTYPE html>
<?php 
	define("Host", "localhost");
	define("UserName","root");
	define("Pass","ofer");
	define("Shecma","social_network");
	$conn = mysqli_connect(Host,UserName,Pass,Shecma);
	if(mysqli_connect_errno()){
		die("database problem:". mysqli_connect_error() );
	}
	if(isset($_POST['username']) && isset($_POST['password'])){
			$result = mysqli_query($conn,"select * from users where username='".$_POST['username']."'");
			$row = mysqli_fetch_array($result);
			if($_POST['password'] == $row[2]){
				header('Location : index.php');
			}
	}




?>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="css/elggstyle.css" type="text/css">
</head>
<body>
	<header class="elgg-page-header" role="banner">
				<img src="img/elgg_logo.png" alt="Elgg">
	</header>
	<div class='wapper'>
		<div class="elgg-page-body">
			<h1>Create new Soical Network</h1>
				<form action="enter.php" method="post" name="form_cu" value="create_sn">
					<h3 >Make your own Soical Network : </h3>
					<div class="custom_div">
						<div class="custom_div">
							<h3 class="custom_ui">user name :</h3> <input type="text" value="" name="username" class="custom_ui"/>
						</div>
						<div class="custom_div">
							<h3 class="custom_ui">password  :</h3> <input type="text" value="" name="password" class="custom_ui"/>
						</div>
						<div class="custom_submit">
							 <input type="submit" name="Create" value="Create"  />
						</div>
					</div>
				</form>
		</div>
	</div>
</body>
</html>