<?php
include_once("header.php");
include_once('DB/DataQueries.php');
//include session
session_start();
$username = "";
//check if session alive else redirect to login page
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
} else {
	header('Location: login.php');
}
//include header
include_once("header.php");
$db = new DataBase();
//check if user post a new request in order to create a new social network
if (isset($_POST['CreateNewSN'])) {    // post set
	if (isset($_POST['displayname']) && isset($_POST['sitename']) && isset($_POST['email'])) { // check params sets
		//  create a new social network
		//  if status!="failed" status will be the md5 that generated
		//  the name of the new folder that under elgg_project/social_networks/md5
		//  the zip file is extract into this folder if not failed returned
		$check = new SocialNetwork();
		$status = $check->createSN();

		if ($status != "failed") {
			$_SESSION['social_networks_key_val'][$_POST['sitename']] = $status;

			//create database base on the md5 token!
		//	$db->Query("CREATE DATABASE " . $status);  (Old Ofer code)
			DataQueries::CreateDB($status);
			$getParam = array('username' => $_SESSION['username'],
				'password' => $_SESSION['password'],
				'displayname' => $_POST['displayname'],
				'sitename' => $_POST['sitename'],
				'email' => $_POST['email'],
				'path' => $status);
			$sn_path = $Url . "/social_networks/" . $status . "/elgg-1.9.5/index.php";

//			//insert new s_n into networks table
//			$query_network_escaped = sprintf("INSERT into networks (social_key,username,network_name,sn_link) values ('%s','%s','%s','%s')", mysql_real_escape_string($status), mysql_real_escape_string($_SESSION['username']), mysql_real_escape_string($_POST['sitename']), $sn_path);
//			//execute
//			$db->Query($query_network_escaped);

			DataQueries::SetNetwork($status, $_SESSION['username'], $_POST['sitename'], $sn_path);
			//redirect into auto_install ---> need to put getParam on the session and not on a get request

			$_SESSION['autoInstallParams'] = $getParam;
			//header('Location: auto_install.php?' . http_build_query($getParam));
			header('Location: auto_install.php');
		}
	} else {
		echo "please fill fields";
	}
}
// $pass = md5("ofergoli" . "M0ABlCEl");
// echo $pass;
?>
	<body>
<?php
include_once('body_header.php');
?>
	<div class="page-content">
		<div class="row">
			<div class="col-md-2">
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
						<!-- Main menu -->
						<li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i>My Profile</a>
						</li>
						<li><a href="my_social_networks.php"><i class="glyphicon glyphicon-list"></i>My Social Networks</a>
						</li>
						<li><a href="create_social_networks.php"><i class="glyphicon glyphicon-pencil"></i> Create
								Social Network</a></li>
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
				<div class="row">
					<div class="col-md-6">
						<div class="content-box-large">
							<div class="panel-heading">
								<div class="panel-title"><h3>Create New Social Network</div>
							</div>
							<div class="panel-body">
								<div class='wapper'>
									<div class="elgg-page-body">
										<div class="sum_bgunet">Bgu.net platform let you create as much social networks
											as you want with only one simple one step.
										</div>
										<div class="sum_bgunet">As soon as the social network created you'll get an
											adminstrator Permissions to your new network.
										</div>
										<br/>

										<div class="sum_bgunet"><span id="im_note">importent!</span> your username and
											password will be the <b> same</b> as your bgu.net <b>username/password</b> .
										</div>
										<div class="sum_bgunet"><span id="im_note">You can change it from the elgg username password settings</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="content-box-large">
							<br/>

							<div class="panel-title">Please fill in the following:</div>
							<br/>

							<div class="panel-body">
								<form class="form-horizontal" role="form" action="create_social_networks.php"
									  method="post" value="create_sn">
									<div class="form-group">
										<div class="col-sm-10">
											<div class="col-sm-10">
												<input type="email" class="form-control" name="email"
													   placeholder="Email">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-10">
											<div class="col-sm-10">
												<input type="text" class="form-control" name="displayname"
													   placeholder="Social Network User Name">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-10">
											<div class="col-sm-10">
												<input type="text" class="form-control" name="sitename"
													   placeholder="Social Network Name"/>
											</div>
											<div id="spinner" class="three-quarters" style="display:none;"></div>
										</div>
									</div>
									<div class="form-group">
									</div>
									<div class="form-group pull-right">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="CreateNewSN" class="btn btn-primary">Create
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<!--                 <div class="content-box-header">
										  <div class="panel-title">Make your own Social studies using BGU.net</div>

										</div> -->
						<div class="content-box-large box-with-header">
							<div class="sum_bgunet">Social studies that can conduct from our system will have great
								benefit to the whole educational system, benefits like :
							</div>
							<ul>
								<li>Teacher will know which topics are hard to “digest” by the students, and can take
									action to prevent those difficulties among the students.
								</li>
								<br/>
								<li>The teacher will have Indicators of accessing materiel, and question and answer in
									course groups.
								</li>
								<br/>
								<li>This system can provide a lot of data( and meta-data) that can be analyzed for a
									better education in the future.
								</li>
								<br/>
							</ul>
							<br><br>
						</div>
					</div>
					<div id="space"></div>

				</div>
				<img id="mainpage_logo" src="img/elgg_logo_new.png">
			</div>
		</div>

		<footer>
			<div class="container">

				<div class="copy text-center">
					Copyright 2015 <a href='#'>Website</a>
				</div>

			</div>
		</footer>

<?php
  include_once('footer.php');
?>