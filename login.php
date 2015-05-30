<?php
include_once('header.php');
include_once('DB/DataQueries.php');
//including the session
session_start();

$db = new DataBase();
$error_message = "";
//check if user post a login
if (isset($_POST['Login'])) {
	//if the form submitted (user posted) check if param entered
	if (isset($_POST['username']) && isset($_POST['password'])) {
		//check if user name and pass valid with db users table
		$DBresult = DataQueries::GetUser($_POST['username']);
		if (!empty($DBresult) && !empty($DBresult[0])) {
			$row = $DBresult[0];

			if ($row['password'] === $_POST['password']) {// good
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];

//				$social_networks_key_val = array();
//
//				$result = array(DataQueries::GetNetwork($_SESSION['username']));
//
//				if (!empty($result)) {
//					$networksDB = $result[0];
//
//					for($i = 0; $i < count($networksDB) ; $i++ ) {
//						$social_networks_key_val[$networksDB[$i]['network_name']] = $networksDB[$i]['social_key'];
//					}
//
//				}
//				$_SESSION['social_networks_key_val'] = $social_networks_key_val;
				header('Location: index.php');
			} else {
				$error_message = "Incorrect password.";
			}


		} else {
			$error_message = "Username not exists.";
		}
	}
?>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <a href="login.php">
	              <img id="bgu_logo" src="img/logotans.gif">
	              </a>
	              <div class="logo">
	                 <h1 id="topfix"><a href="login.php">Login</a></h1>
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
			                <h6>Sign In</h6>
			                <div class="social">
	                            <a class="face_login" href="#">
	                                <span class="face_icon">
	                                    <img src="img/facebook.png" alt="fb">
	                                </span>
								<span class="text">Sign in with Facebook</span>
							</a>
							<div class="division">
								<hr class="left">
								<span>or</span>
								<hr class="right">
							</div>
						</div>
						<form action="login.php" method="post" value="create_sn">
							<input class="form-control" type="text" name="username" placeholder="user name">
							<input class="form-control" type="password" name="password" placeholder="Password">
							<div class="action">
								<input class="btn btn-primary signup" type="submit" name="Login" value="Login"/>
							</div>
							<!--    <div class="error_login"><?php echo $error_message ?></div>  -->
						</form>

					</div>
				</div>

				<div class="already">
					<p>Don't have an account yet?</p>
					<a href="signup.php">Sign Up</a>
				</div>
			</div>
		</div>
	</div>

<img id="elgg_img" src="img/elgg_logo_new.png">

<?php 
	include_once('footer.php');
?>