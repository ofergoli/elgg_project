<?php
session_start();
include_once('header.php');
include_once('DB/DataQueries.php');

$username = "";
//check if session alive else redirect to login page
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
} else {
	header('Location: login.php');
}

if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) )
{
	$user = DataQueries::VerifyUser($username,$_POST['oldPassword']);

	if($user == false)
	{
		// Invalid credentials.
		$response = array('status' => 'Invalid Credentials');
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	DataQueries::UpdateUserPassword($user["uid"],$_POST['newPassword']);

	$response = array('status' => 'success');
	header('Content-Type: application/json');
	echo json_encode($response);
}
elseif(isset($_POST['newEmail']) && isset($_POST['password']) )
{
	$user = DataQueries::VerifyUser($username,$_POST['password']);

	if($user == false)
	{
		// Invalid credentials.
		$response = array('status' => 'Invalid Credentials');
		header('Content-Type: application/json');
		echo json_encode($response);
	}

		DataQueries::UpdateUserEmail($user["uid"], $_POST["newEmail"]);

		$response = array('status' => 'success');
		header('Content-Type: application/json');
		echo json_encode($response);


}

include_once('body_header.php');
?>

	<div class="page-content">
		<div class="row">

			<div class="col-md-2">
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
						<!-- Main menu -->
						<li><a href="index.php"><i class="glyphicon glyphicon-home"></i>My Profile</a></li>
						<li><a href="my_social_networks.php"><i class="glyphicon glyphicon-list"></i>My Social Networks</a></li>
						<li><a href="create_social_networks.php"><i class="glyphicon glyphicon-pencil"></i> Create Social Network</a></li>
						<li><a href="invite_users.php"><i class="glyphicon glyphicon-upload"></i> Invite Users</a></li>
						<li class="submenu">
							<a href="#">
								<i class="glyphicon glyphicon-list"></i> Pages
								<span class="caret pull-right"></span>
							</a>
							<!-- Sub menu -->
							<ul>
								<li><a href="login.html">Login</a></li>
								<li><a href="signup.html">Signup</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-md-10">
				<div class="content-box-header">

					<div class="content-box-header">
						<!-- add user name to wellcome -->
						<div class="panel-title"><h4>Change your account settings</h4>
						</div>
					</div>

					<div class="content-box-large box-with-header">
						<div >
							<dl class="dl-horizontal">
								<dt>Password:</dt>
								<dd><button id="change-password-btn" class="btn btn-sm btn-default">Change Password</button></dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Email:</dt>
								<dd><button id="change-email-btn" class="btn btn-sm btn-default">Change Email</button></dd>
							</dl>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

<?php
include_once('footer.php');
?>
