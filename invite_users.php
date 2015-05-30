<?php 
  include_once("header.php");
  include_once("upload.php");
  //include session
  session_start();
  $username = "";
  $message="";
  //check if session alive else redirect to login page
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
  else{
    header('Location: login.php');
  }

  if(isset($_POST['selectNet']) && isset($_POST['selectGrp'])){
    if(uploadCsv($_FILES['csv'])){
       $message = "The file uploaded!";
    }
    else{
      $message = "The file must be a CSV File ! , Please try again";
    }
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
                    <form action="invite_users.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
<!--                           <select class="form-control" id="selectSocial" name="select">
                              <?php
                                while ($currSocial = current($_SESSION['social_networks_key_val'])) {
                                    echo "<option value=" .$currSocial .">" . key($_SESSION['social_networks_key_val']) . "</option>";
                                    next($_SESSION['social_networks_key_val']);
                                }
                              ?>
                          </select> -->
                           <h4>Select Social Network : </h4>
                           <select class="form-control" id="network" name="selectNet">

                           </select>
                           <h4>Select Group : </h4>
                           <select class="form-control" id="groups" name="selectGrp">

                           </select>
                        </div>
                        <div class="col-md-6">
                          <div class="sum_bgunet">
                            Upload a CSV containing the following fields:
                          </div>
                          <ul>
                            <li>Bgu Username</li>
                            <li>Bgu Password (At least 6 characters)</li>
                            <li>Bgu Email (Valid email)</li>
                            <li>Bgu Name</li>
                          </ul>
                        </div>
                          <div class="col-md-6">
                              <div class="sum_bgunet">
                                  Upload a CSV file where the records seperate by commas.
                                   <input type="button" id="exampleCsv" class="btn btn-primary" value="Example" />
                              </div>
                          </div>
                          <div class="col-md-12">
                            <br/><br/><br/>
                            <div class="col-md-5">
                                <input type="file" class="filestyle" data-buttonName="btn-primary" name="csv" value="" />
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Upload CSV" />
                            </div>
                          </div>
                      </form>
                  </div>
                </div>
                <div class="elgg-page-body">
                </div>
              </div>
              </div>
               <span id="im_note"><?php echo $message ?></span>
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