<?php
    include_once('post.php');
    include_once('utility.php');
    if($_POST['select']){
        if($_FILES['csv']['error'] == 0){
            $name = $_FILES['csv']['name'];
            $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
            $type = $_FILES['csv']['type'];
            $tmpName = $_FILES['csv']['tmp_name'];
            if($ext === 'csv'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                            $newUser = array('username' => $data[0],
                                             'password' => $data[1],
                                             'name' => $data[3] ,
                                             'email'=>$data[2]);
                            $path = $Url . "/social_networks/".$_POST['select']."/elgg-1.9.5/engine/start.php";
                            doPost($newUser,$path);
                     }
                }
            }
        }
        header("Location:invite_users.php"); 
    }
    else{

    }

?>
