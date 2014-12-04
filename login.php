<?php 
	include_once('header.php');

	$db = new DataBase();
	$error_message = "";

	if(isset($_POST['Login'])){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$query = "select * from users where username='". $_POST['username']."'";
			$result = $db->Query($query);
			$row = $result->fetch_assoc();
			if($row['password'] === $_POST['password']){// good
				header('Location: enter.php?username=' . $_POST['username']);
			}
			else{// bad
				$error_message = "Please check your username/password";
			}
		}
	}

?>

<div class="elgg-page-body">
	<h1>Social Network Manager:</h1>
		<form action="login.php" method="post" value="create_sn">
			<h3>Please Login : </h3>
			<div class="custom_div">
				<div class="custom_div">
					<h3 class="custom_ui">user name :</h3> <input type="text" value="" name="username" class="custom_ui"/>
				</div>
				<div class="custom_div">
					<h3 class="custom_ui">password  :</h3> <input type="text" value="" name="password" class="custom_ui"/>
				</div>

				<div class="custom_div">
					<a href="signup.php"><div id="new_user">new user?</div></a> <div id="login_bt"> <input type="submit" name="Login" value="Login"  /></div>
				</div>
			</div>
		</form>
<div class="error_login"><?php echo $error_message?></div>
</div>


<?php 
	include_once('footer.php');
?>