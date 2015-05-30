<?php
include_once("header.php");
include_once('DB/DataQueries.php');
session_start();
$db = new DataBase();
// if(isset($_GET['filename'])){
// 	export_csv($_GET['filename']);
// }
//check if user request and post new user creation
if (isset($_POST['Create'])) {        // check isset <--- issues
	//check params
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		$_SESSION['username'] = $_POST['username'];
		// $user_query = "insert into users (username,password,email) values ('" . $_POST['username'] . "','" . $_POST['password'] . "','" . $_POST['email'] . "')";
		// $db->Query($user_query);
		//insert the new user to users table need to check if username isn't allready exiest! not written yet
		DataQueries::InsertUser($_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email']);

		header('Location: index.php');
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
					<a href="login.php">
						<img id="bgu_logo" src="img/logotans.gif">
					</a>

					<div class="logo">
						<h1><a href="index.html">Sign Up</a></h1>
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
							<form action="signup.php" method="post" data-toggle="validator">
								<div class="form-group">
									<input class="form-control" type="text" name="username" maxlength="20" pattern="^([_A-z0-9]){6,}$" placeholder="Username" data-error="Username must be at least 6 characters long alphanumeric string" required />
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input id="inputPassword" data-minlength="6" class="form-control" type="password" name="password" placeholder="Password" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input id="inputPasswordConfirm" class="form-control" type="password" placeholder="Confirm Password" data-match="#inputPassword"
										   data-match-error="Passwords don't match" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="E-mail Address" data-error="Invalid e-mail address" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input class="btn btn-primary signup" type="submit" name="Create" value="Create"/>
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