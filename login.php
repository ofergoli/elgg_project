<?php
include_once('header.php');
//including the session
session_start();

$db = new DataBase();
$error_message = "";
//check if user post a login
if (isset($_POST['Login'])) {
	//if the form submitted (user posted) check if param entered
	if (isset($_POST['username']) && isset($_POST['password'])) {
		//check if user name and pass valid with db users table
		$query_escaped = sprintf("SELECT * from users where username='%s'", mysql_real_escape_string($_POST['username']));
		$result = $db->Query($query_escaped);
		$row = $result->fetch_assoc();
		//insert into session global object the user & pass
		if (password_verify($_POST['password'], $row['password'])) {// good
			$_SESSION['username'] = $_POST['username'];

			$social_networks_key_val = array();
			$query_network_escaped = sprintf("SELECT * from networks where username='%s'", mysql_real_escape_string($_SESSION['username']));
			$result = $db->Query($query_network_escaped);
			while ($row = $result->fetch_assoc()) {
				$social_networks_key_val[$row['network_name']] = $row['social_key'];
			}
			$_SESSION['social_networks_key_val'] = $social_networks_key_val;
			header('Location: index.php');
		} else {// bad
			$error_message = "Please check your username/password";
		}
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
</div>

<img id="elgg_img" src="img/elgg_logo_new.png">

<?php
include_once('footer.php');
?>