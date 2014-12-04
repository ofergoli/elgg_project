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
				$insert_new_user = "insert into users (username,password,email,sn_name) values ('" . $_POST['username'] . "','" . $_POST['password'] ."','" . $_POST['email'] . "','" . $_POST['sitename'] . "')";
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
	<div class='wapper'>
<!--  		<div class="elgg-page-body">
			<h1>Execute CSV File choose table</h1>
			<div class="download_section">
				<form action="index.php" method="get">
					<select class="elgg-input-text" name="filename">
						<?php 
							$resultTableName = $db->Query("SHOW TABLES FROM elgg");
							while ($row = mysqli_fetch_row($resultTableName)) {
							    echo "<option value='{$row[0]}'> {$row[0]} </option>";
							}	
						?>
					</select>
					<input type="submit" value="download" id="bt_csv"/>
				</form>
			</div>
		</div> -->
		<div class="elgg-page-body">
			<h1>Create new Soical Network</h1>
				<form action="signup.php" method="post" value="create_sn">
					<h3 >Make your own Soical Network : </h3>
					<div class="custom_div">
						<div class="custom_div">
							<h3 class="custom_ui">user name :</h3> <input type="text" value="" name="username" class="custom_ui"/>
						</div>
						<div class="custom_div">
							<h3 class="custom_ui">password  :</h3> <input type="text" value="" name="password" class="custom_ui"/>
						</div>
						<div class="custom_div">
							<h3 class="custom_ui">email     :</h3> <input type="text" value="" name="email" class="custom_ui"/>
						</div>
						<div class="custom_div">
							<h3 class="custom_ui">display name:</h3> <input type="text" value="" name="displayname" class="custom_ui"/> 	
						</div>
						<div class="custom_div">
							<h3 class="custom_ui">site name   :</h3> <input type="text" value="" name="sitename" class="custom_ui"/>
						</div>
						<div class="custom_submit">
							 <input type="submit" name="Create" value="Create"  />
						</div>
					
					</div>
				</form>
		</div>
	</div>
<?php
	include_once('footer.php');
?>