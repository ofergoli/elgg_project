<?php 
	include_once("header.php");

	$db = new DataBase();

	// if(isset($_GET['filename'])){
	// 	export_csv($_GET['filename']);
	// }
	if(isset($_POST['Create'])){		// check isset <--- issues
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['displayname']) && isset($_POST['sitename']) && isset($_POST['email'])){
			$check = new SocialNetwork();
			$status = $check->createSN();
			if($status!="failed"){
				$db->Query("CREATE DATABASE ".$status);
				
				$getParam = array('username' => $_POST['username'],
		 					       'password' => $_POST['password'],
		 					       'displayname' => $_POST['displayname'] ,
		 					       'sitename'=> $_POST['sitename'],
		 					       'email'=>$_POST['email'],
		 					       'path' =>  $status);
				$date = date('Y-m-d H:i:s');
				$sn_path = "/sites/elgg_project/soical_networks/" . $status . "/elgg-1.9.5/index.php";
				$insert_new_user = "insert into users (sn_link,username,password,email,sn_name,sn_date) values ('" . $sn_path . "','" . $_POST['username'] .
													 "','" . $_POST['password'] ."','" . $_POST['email'] . "','" . $_POST['sitename'] . "','" .  $date . "')";
				$db->Query($insert_new_user);
				
				header('Location: auto_install.php?' . http_build_query($getParam));
			}
		}
		else{
			echo "please fill fields";
		}
	}
	// $pass = md5("ofergoli" . "M0ABlCEl");
	// echo $pass;
?>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">BGUNET Sign Up</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign Up</h6>
			                <form action="signup.php" method="post" value="create_sn">
				                <input class="form-control" type="text" name="username" placeholder="user name">
				                <input class="form-control" type="password" name="password" placeholder="Password">
				                <input class="form-control" type="text" name="email" placeholder="E-mail address">
				               <!--  <input class="form-control" type="password" placeholder="Confirm Password"> -->
				                <input class="form-control" type="text" name="displayname" placeholder="display name">
				                <input class="form-control" type="text" name="sitename" placeholder="Social network name">
				                <div class="action">
				               		<input class="btn btn-primary signup" type="submit" name="Create" value="Create"  />
				                   <!--  <a class="btn btn-primary signup" href="index.html">Sign Up</a> -->
				                </div>
			                </form>                
			            </div>
			        </div>

			        <div class="already">
			            <p>Have an account already?</p>
			            <a href="login.php">Login</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<img id="elgg_img" src="img/elgg_logo_new.png">
<?php
	include_once('footer.php');
?>