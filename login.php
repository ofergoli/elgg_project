<?php 
	include_once('header.php');
	session_start();
	
	$db = new DataBase();
	$error_message = "";
	if(isset($_POST['Login'])){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$query = "select * from users where username='". $_POST['username']."'";
			$result = $db->Query($query);
			$row = $result->fetch_assoc();
			if($row['password'] === $_POST['password']){// good
					$_SESSION['username'] = $_POST['username'];
					$_SESSION['password'] = $_POST['password'];
				header('Location: index.php');
			}
			else{// bad
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
	              <div class="logo">
	                 <h1><a href="login.php">BGUNET Login</a></h1>
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
			              	      <input class="form-control" type="text"  name="username" placeholder="user name">
			              		  <input class="form-control" type="password" name="password" placeholder="Password">
					              <div class="action">
					                    <input class="btn btn-primary signup" type="submit" name="Login" value="Login"  />
					              </div>  
					           <!--    <div class="error_login"><?php echo $error_message?></div>  -->
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