<?php
    include_once('post.php');
    include_once('utility.php');
    include_once('MailService.php');
    include_once('DB/DataQueries.php');

    function uploadCsv($file){
        try{
            $social_name = DataQueries::GetNetworkBySocialKey($_POST['selectNet']);
            $group_name = DataQueries::GetGroupById($_POST['selectNet'],$_POST['selectGrp']);
            $MAIL = new MailService();
            global $Url;
            if($file['error'] == 0){
                $name = $file['name'];
                $ext = strtolower(end(explode('.',$file['name'])));
                $type = $file['type'];
                $tmpName = $file['tmp_name'];
                if($ext === 'csv'){
                    if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                        while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                            $newUser = array('username' => $data[0],
                               'password' => $data[1],
                               'name' => $data[3] ,
                               'email'=>$data[2] ,
                               'group' => $_POST['selectGrp']);
                            $UrlToSocial =  $Url . "/social_networks/".$_POST['selectNet']."/elgg-1.9.5/index.php";
                            $path = $Url . "/social_networks/".$_POST['selectNet']."/elgg-1.9.5/engine/start.php";
                            doPost($newUser,$path);
                            $text = 'Wellcome to ' . $social_name[0]['network_name'] . 'Network you can click the link below to enter the Social Network ';
                            $text.= 'use Your BGU username and password in order to login to the network '; 
                            $text.= 'You are signed already to ' . $group_name[0]['name'] . ' Group ';
                            $text.= 'Link :' . $UrlToSocial;
                            $MAIL->Send("ofergolib@gmail.com","Wellcome to " . $social_name[0]['network_name'] . " Network",$text);
                        }
                    }
                    return true;
                }
                return false;
            }
        }
        catch(Exception $e){
            return false;
        }
    }
?>
<!-- //  echo $_POST['selectNet'];
 echo $_POST['selectGrp'];
echo $_SESSION['username']; -->