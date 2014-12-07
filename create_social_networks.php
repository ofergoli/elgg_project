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

  include_once("header.php");

  $db = new DataBase();

  if(isset($_POST['CreateNewSN'])){    // check isset <--- issues
    if(isset($_POST['displayname']) && isset($_POST['sitename']) && isset($_POST['email'])){
      $check = new SocialNetwork();
      $status = $check->createSN();
      if($status!="failed"){
        $db->Query("CREATE DATABASE ".$status);
        
        $getParam = array('username' => $_SESSION['username'],
                     'password' => $_SESSION['password'],
                     'displayname' => $_POST['displayname'] ,
                     'sitename'=> $_POST['sitename'],
                     'email'=>$_POST['email'],
                     'path' =>  $status);
        $sn_path = "/sites/elgg_project/soical_networks/" . $status . "/elgg-1.9.5/index.php";
        $query_network = "insert into networks (social_key,username,network_name,sn_link) values ('" . $status . "','" . $_SESSION['username'] . "','" . $_POST['sitename'] . "','" . $sn_path . "')";
        $db->Query($query_network);
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
              <div class="panel-heading">
              <div class="panel-title"><h3>Create New Social Network</div>
            </div>
              <div class="panel-body">
              <div class='wapper'>
                <div class="elgg-page-body">
                    <div class="sum_bgunet">Bgu.net platform let you create as much social networks as you want with only one simple one step.</div>
                    <div class="sum_bgunet">As soon as the soical network created you'll  get an adminstrator Permissions to your new network.</div>
                    <br/>
                    <div class="sum_bgunet"><span id="im_note">importent!</span> your username and password will be the <b> same</b> as your bgu.net <b>username/password</b> .</div>
                    <div class="sum_bgunet"><span id="im_note">You can change it from the elgg username password settings</span></div>
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
                  <form class="form-horizontal" role="form" action="create_social_networks.php" method="post" value="create_sn">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email"  placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="displayname" placeholder="Social Network User Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="sitename" placeholder="Social Network Name">
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group pull-right">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="CreateNewSN" class="btn btn-primary">Create</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>

<!--           <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Please fill the following field:</div>
                </div>
                <div class="content-box-large box-with-header">
                      <form action="create_social_networks.php" method="post" value="create_sn">
                        <input class="form-control-cus" type="text" name="email" placeholder="E-mail address">
                        <input class="form-control-cus" type="text" name="displayname" placeholder="display name">
                        <input class="form-control-cus" type="text" name="sitename" placeholder="Social network name">
                        <div class="action">
                          <input class="btn btn-primary-cus signup" type="submit" name="CreateNewSN" value="Create"  />
                           <!--  <a class="btn btn-primary signup" href="index.html">Sign Up</a> -->
                        </div>
                      </form>       
                   <br /><br />
              </div>
              </div>
            </div>
          </div>
        </div> -->


        <div id="space"></div>
<!--        <div class="content-box-large">
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