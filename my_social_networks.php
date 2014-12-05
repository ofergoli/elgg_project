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
              <div class="panel-heading">
              <div class="panel-title"><h2>All my Social Networks</div>
            </div>
              <div class="panel-body">
              <div class='wapper'>
                <div class="elgg-page-body">



                </div>
              </div>
              </div>
            </div>
          </div> 
          <?php 
              $db = new DataBase();
              $query = "select * from users where username='" . $_SESSION['username'] . "' and password='" . $_SESSION['password'] . "'";
              $result = $db->Query($query);
              while($row = $result->fetch_assoc()){
                echo "<div class=\"col-md-6\"><div class=\"row\"><div class=\"col-md-12\"><div class=\"content-box-header\"><div class=\"panel-title\">Please fill the following field:</div></div><div class=\"content-box-large box-with-header\"><h2>". $row['sn_name'] . "</h2><div class=\"action\"><a href=\"". $row['sn_link'] . "\"><input class=\"btn btn-primary signup\" id=\"dynamic\" type=\"submit\" name=\"CreateNewSN\" value=\"Enter Social Network\"  /></a></div><br /><br /></div></div></div></div>";
              }
          ?>
        </div>


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