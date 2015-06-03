
<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<!-- Logo -->
				<a href="index.php"><img id="bgu_logo" src="img/logotans.gif"></a>

				<div class="logo">
					<h1><a href="index.php">Admin Center</a></h1>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-lg-12">
						<div class="input-group form">
							<input type="text" class="form-control" id="search_text"
								   placeholder="search social networks">
                         <span class="input-group-btn">
                           <button class="btn btn-primary" type="button">Search</button>
                         </span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="navbar navbar-inverse" role="banner">
					<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<!-- take user name from session and echo into top bar -->
								<a href="#" class="dropdown-toggle"
								   data-toggle="dropdown"><?php echo ucfirst(strtolower($_SESSION['username'])) ?>
									Account <b class="caret"></b></a>
								<ul class="dropdown-menu animated fadeInUp">
									<li><a href="userProfile.php">Profile</a></li>
									<li><a href="session_destroy.php">Logout</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>