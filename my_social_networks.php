<?php
include_once("header.php");
include_once('DB/DataQueries.php');
//including the session

session_start();
$username = "";
//check if session alive else redirect to login page
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
} else {
	header('Location: login.php');
}
include_once("header.php");
$db = new DataBase();
$alert = "";
//for the red alert if user have or dont have a social networks
$result_alert = DataQueries::GetNetworksByUser($_SESSION['username']);
if (empty($result_alert))
	$alert = " you don't any have Social Networks yet.";
include_once('body_header.php');
?>
<div class="page-content">
	<div class="row">
		<div class="col-md-2">
			<div class="sidebar content-box" style="display: block;">
				<ul class="nav">
					<!-- Main menu -->
					<li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i>My Profile</a></li>
					<li><a href="my_social_networks.php"><i class="glyphicon glyphicon-list"></i>My Social Networks</a>
					</li>
					<li><a href="create_social_networks.php"><i class="glyphicon glyphicon-pencil"></i> Create Social
							Network</a></li>
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
			<div class="col-md-6">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title"><h2>My Social Networks</div>
						<div id="spinner" class="three-quarters" style="display:none;"></div>
					</div>
					<div class="panel-body">
						<div class='wapper'>
							<div class="elgg-page-body">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">My Active Social Networks<span id="im_note"><?php echo $alert ?></span>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
								<tr>
									<th>#</th>
									<th>Admin</th>
									<th>Socian Network Name</th>
									<th>Invite Users</th>
									<th>Options</th>
								</tr>
								</thead>
								<tbody>
								<?php
								//get all user social networks and create a dynamic row for each one
								// each row represents a social network. the delete buttons warpped with form and a hidden textbox with md5 value
								// on each row we can know what social network md5
								//								$query_network_escaped = sprintf("SELECT * from networks where username='%s'", mysql_real_escape_string($_SESSION['username']));
								$result = DataQueries::GetNetworksByUser($_SESSION['username']);

								if (!empty($result) && !empty($result[0])) {
									for ($i = 0; $i < count($result); $i++) {
										echo "<tr>
											<td>" . ($i + 1) . "</td>
                            			    <td>" . $_SESSION['username'] . "</td>
                                			<td>" . $result[$i]['name'] . "</td>
                                			<td>Delete/Enter Social Network
                                  			<a href=\"" . $result[$i]['url'] . "\"  target=\"_blank\">
                                     			<br/><br/>
                                       			<input class=\"btn btn-primary signup\" id=\"dynamic\" type=\"submit\" name=\"CreateNewSN\" value=\"Enter Social Network\"  />
                                  			</a>
											  <form action=\"my_social_networks.php\" method=\"post\" value=\"delete\">
												  <a class=\"btn btn-default\" href=\"dashboard.php\">Tools</a>
												  <input class=\"btn btn-danger delete-network-btn\" type=\"button\" id=\"delete_bt\" name=\"delete\" value=\"Delete\"  />
												  <input name=\"sn\" class=\"hidden_input\" style=\"visibility: hidden;\" value=\"" . $result[$i]['nid'] . "\"/>
											  </form>
											</td>
										 </tr>";
									}
								}
								?>
								</tbody>
							</table>
						</div>
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
