<?php 
	include_once("header.php");
	session_start();
	$username = "";
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}
	else{
		header('Location: login.php');
	}
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
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i>My Profile</a></li>
                    <li><a href="my_social_networks.php"><i class="glyphicon glyphicon-list"></i>My Social Networks</a></li>
                    <li><a href="create_social_networks.php"><i class="glyphicon glyphicon-pencil"></i> Create Social Networks</a></li>
<!--                     <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li> -->
<!--                     <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li> -->
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
<!-- 		  				<div class="panel-heading">
							<div class="panel-title">New vs Returning Visitors</div>
						</div> -->
		  				<div class="panel-body">
							<div class='wapper'>
								<div class="elgg-page-body">
									<h1>Welcome <?php echo $username ?></h1>
								</div>
							</div>
		  				</div>
		  			</div>
		  		</div> 

		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Welcome to bgunet platform</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
			  					<div class="sub_title_warpper">
			  						<span class="sub_title" >Social Network</span>
								</div>
								<ul>
									<li class="sum_bgunet">
										BGUNET refer mainly to Online Social Networks.
									</li>
									<li class="sum_bgunet">
										A social network is a social structure made up of a set of social actors.
									</li>
									<li class="sum_bgunet">
										Social networks has spread like a wildfire since the internet was introduced to the wide public
									</li>
				  				</ul>
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Elgg Platform</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  					<div class="sub_title_warpper">
				  						<span class="sub_title" >The ELGG provide us a solid foundation with an infrastructure of efficient tools, such as:</span>
									</div>
									<ul>
										<li class="sum_bgunet">
											Semi database to store the network data.
										</li>
										<li class="sum_bgunet">
											User management dashboard and Access control over elements within the Social network.
										</li>
										<li class="sum_bgunet">
											Plugins importer, possibility to apply plugin (open source) 
										</li>
										<li class="sum_bgunet">
											Infrastructure of a social network with an installer of it ( need to customize<br/> the code for a better usage for our need with emphasis on the installation part)
										</li>
					  				</ul>
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

<!-- 		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">New vs Returning Visitors</div>
		  			</div>
		  			<div class="content-box-large box-with-header">
			  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
						<br /><br />
					</div>
		  		</div>
		  	</div> -->
		  	<div id="space"></div>
<!-- 		  	<div class="content-box-large">
				<br /><br />
		  	</div> -->
		  </div>
			<img id="mainpage_logo" src="img/elgg_logo_new.png">
		</div>
    </div>
    
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

<?php
	include_once('footer.php');
?>