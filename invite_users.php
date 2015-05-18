<?php 
  include_once("header.php");
  //include session
  session_start();
  $username = "";
  //check if session alive else redirect to login page
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
  else{
    header('Location: login.php');
  }
  //$_SESSION['social_networks_key_val']
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
        <div class="row">
          <div class="col-md-6">
            <div class="content-box-large">
              <div class="panel-heading">
              <div class="panel-title"><h3>Please Choose Social Network And Invite Users :</div>
            </div>
              <div class="panel-body">
              <div class='wapper'>
                <div class="elgg-page-body">
                  <div class="col-md-6">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
                          <select class="form-control" id="selectSocial" name="select">
                              <?php
                                while ($currSocial = current($_SESSION['social_networks_key_val'])) {
                                    echo "<option value=" .$currSocial .">" . key($_SESSION['social_networks_key_val']) . "</option>";
                                    next($_SESSION['social_networks_key_val']);
                                }
                              ?>
                          </select>
                        </div>
                     <div class="col-md-6">
                      <div class="sum_bgunet">
                        You can upload a csv containing the following fields:
                      </div>
                      <ul>
                        <li>Bgu Username</li>
                        <li>Bgu Password</li>
                        <li>Bgu Email</li>
                      </ul>
                    </div>
                    <br/><br/><br/>
                        <div class="col-md-5">
                            <input type="file" class="filestyle" data-buttonName="btn-primary" name="csv" value="" />
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Upload CSV" />
                        </div>
                      </form>
                  </div>
                </div>
                <div class="elgg-page-body">
                </div>
              </div>
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
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

<?php
  include_once('footer.php');
?>