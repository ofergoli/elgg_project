<?php 
include_once("header.php");
  //including the session
session_start();
$username = "";
  //check if session alive else redirect to login page
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}
else{
  header('Location: login.php');
}
include_once("header.php");
$db = new DataBase();
$alert="";
  //for the red alert if user have or dont have a social networks
$query_network_escaped_alert = sprintf("SELECT * from networks where username='%s'",mysql_real_escape_string($_SESSION['username']));
$result_alert = $db->Query($query_network_escaped_alert);
if(!$result_alert->fetch_assoc())
 $alert=" you don't any have Social Networks yet.";
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
<!--           <?php 
              $query_network_escaped = sprintf("SELECT * from networks where username='%s'",mysql_real_escape_string($_SESSION['username']));
              $result =$db->Query($query_network_escaped);
               while($row = $result->fetch_assoc()){
                    echo "<div class=\"col-md-6\"><div class=\"row\"><div class=\"col-md-12\"><div class=\"content-box-header\"><div class=\"panel-title\">". $row['network_name'] . "</div></div><div class=\"content-box-large box-with-header\"><h3>". $row['network_name'] . "</h3><ul><li class=\"sum_bgunet\">Admin : " . $row['username'] . "</li></ul><div class=\"action\"><a href=\"". $row['sn_link'] . "\"  target=\"_blank\"><br/><br/><input class=\"btn btn-primary signup\" id=\"dynamic\" type=\"submit\" name=\"CreateNewSN\" value=\"Enter Social Network\"  /></a></div><form action=\"my_social_networks.php\" method=\"post\" value=\"delete\"><input class=\"btn btn-danger\" type=\"submit\" name=\"delete\" value=\"Delete\"  /><input name=\"sn\" style=\"visibility: hidden;\" value=\"" . $row['social_key'] .  "\"/></form><br /><br /></div></div></div></div>";
               }
               ?> -->



<!--           <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Please fill the following field:</div>
                </div>
                <div class="content-box-large box-with-header">
                        <h2> </h2>
                        <br/>
                        <br/>
                        <div class="action">
                          <input class="btn btn-primary signup" type="submit" name="CreateNewSN" value="Create"  />
                          <input class="btn btn-primary-del signup" type="submit" name="CreateNewSN" value="Delete"  />
                          <!--  <a class="btn btn-primary signup" href="index.html">Sign Up</a> -->
<!--                         </div>
                   <br /><br />
              </div>
              </div>
            </div>
          </div> --> 


        </div>
        <div class="col-md-6">
          <div class="content-box-large">
            <div class="panel-heading">
              <div class="panel-title">My Active Social Networks<span id="im_note"><?php echo $alert ?></span></div>
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
                    $query_network_escaped = sprintf("SELECT * from networks where username='%s'",mysql_real_escape_string($_SESSION['username']));
                    $result =$db->Query($query_network_escaped);
                    $index = 1;
                    while($row = $result->fetch_assoc()){
                       echo "<tr>
                                <td>" . $index . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['network_name'] . "</td>
                                <td>Delete/Enter Social Network
                                  <a href=\"". $row['sn_link'] . "\"  target=\"_blank\">
                                     <br/><br/>
                                       <input class=\"btn btn-primary signup\" id=\"dynamic\" type=\"submit\" name=\"CreateNewSN\" value=\"Enter Social Network\"  />
                                  </a>
                                  <form action=\"my_social_networks.php\" method=\"post\" value=\"delete\">
                                      <input class=\"btn btn-danger\" type=\"button\" id=\"delete_bt\" name=\"delete\" value=\"Delete\"  />
                                      <input name=\"sn\" class=\"hidden_input\" style=\"visibility: hidden;\" value=\"" . $row['social_key'] .  "\"/>
                                  </form>
                                </td>
                             </tr>";
                       $index++;
                    }
                   ?>
                 </tbody>
               </table>
             </div>
           </div>
           <i class="glyphicon glyphicon-remove"></i><span id="im_note">   Attention! - Click on <b>Delete</b> button will erase permanently the social network with all databases included!<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bgu.net username/password authentication required</span>
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