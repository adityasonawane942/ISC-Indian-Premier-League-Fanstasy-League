<?php 
session_start();
// $servername = "localhost";
// $username = "usera";
// $password = "test1234";
// $dbname = "trial";

// $connection = mysqli_connect($servername, $username, $password, $dbname);
$connection = Yii::app()->db;
if ($connection) {
    // echo 'conn';
} else {
    die("Connection failed.");
}

if(isset($_SESSION["logdata"])) {
    $ud = $_SESSION["logdata"]; 
    // var_dump($ud);
    $ldap = $ud['user_information']['username'];
    $name = $ud['user_information']['first_name'].' '.$ud['user_information']['last_name'];
    $hostel = $ud['user_information']['insti_address']['hostel_name'];
    $gender = $ud['user_information']['sex'];
}
else {
    $ldap = '';
    echo "<script type='text/javascript'>window.top.location='https://gymkhana.iitb.ac.in/~sports/index.php?r=site/userlogin';</script>";
}

if(isset($_POST['c']) && isset($_POST['lop']) && isset($_POST['vc']) && isset($_POST['mno']) && isset($_POST['ke']) && $ldap!='') {
    $key = $_POST['ke'];
    if($key==1) {
        $cap = $_POST['c'];
        $vcap = $_POST['vc'];
        $players = $_POST['lop'];
        $matchno = $_POST['mno'];
        $matchres = $connection->createCommand("SELECT * FROM ipl_matches WHERE match_no='$matchno'")->queryAll();
        foreach($matchres as $match) {
            $resmatch = $match;
        }
        $currtime = date_format(date_add(date_create(date("Y-m-d H:i", time())), date_interval_create_from_date_string("5 hours 30 minutes")), "Y-m-d H:i");
        if($resmatch['match_time'] > $currtime) {
            $j = 1;
            $k = 0;
            $prepp = '{';
            
            for($i = 0; $i < count($players)-$j; $i++) {
                $prepp = $prepp.'"'.$players[$i].'":"'.$k.'",';
            }
            $prepp = $prepp.'"'.$players[count($players)-$j].'":"'.$k.'"}';
    
            $mainres = $connection->createCommand("SELECT * FROM ipl_fl WHERE ldap='$ldap'")->queryAll();
            // $mainres = mysqli_query($connection, $mainsql);
            $count = count($mainres);
    
            $matchres = $connection->createCommand("SELECT * FROM ipl_matches WHERE match_no='$matchno'")->queryAll();
            foreach($matchres as $match) {
                $resmatch = $match;
            }
    
            if($count==0) {
                $pointobj = new stdClass();
                $pointobj->$matchno = $prepp;
                $lengthofinsertingstring = strlen($prepp);
    
                $capobj = new stdClass();
                $capobj->$matchno = $cap;
    
                $vcapobj = new stdClass();
                $vcapobj->$matchno = $vcap;
    
                $processedpoints = json_encode($pointobj);
                $propropoints = str_replace('\\', '', $processedpoints);
                $secpointsl = substr($propropoints,strlen($propropoints)-1);
                $secpointsf = substr($propropoints,0,strlen($propropoints)-2);
                $propropoints = $secpointsf.$secpointsl;
                $thipointsf = substr($secpointsf,0,strlen($secpointsf)-$lengthofinsertingstring-1);
                $thipointsl = substr($secpointsf,strlen($secpointsf)-$lengthofinsertingstring);
                $propropoints = $thipointsf.$thipointsl.'}';
                $processedcaptains = json_encode($capobj);
                $processedvicecaptains = json_encode($vcapobj);
    
                try {
                    $sql = $connection->createCommand("INSERT INTO ipl_fl (ldap, points, captains, vice_captains, name, hostel, gender) VALUES ('$ldap', '$propropoints', '$processedcaptains', '$processedvicecaptains', '$name', '$hostel', '$gender')");
                    $sql->execute();
                    die("inserted");
                } catch (Exception $e) {
                    die('Query failed '.$e->getMessage());
                }
            }
            else {
                foreach($mainres as $entry) {
                    $pro = $entry;
                }
    
                $points = $pro['points'];
                $pointobj = json_decode($points);

                if(isset($pointobj->$matchno)) {
                    $pointobj->$matchno = "w".$prepp."w";
                    $lengthofinsertingstring = strlen($prepp);
        
                    $captains = $pro['captains'];
                    $capobj = json_decode($captains);
                    $capobj->$matchno = $cap;
        
                    $vcaptains = $pro['vice_captains'];
                    $vcapobj = json_decode($vcaptains);
                    $vcapobj->$matchno = $vcap;
                    $processedpoints = json_encode($pointobj);
                    $propropoints = str_replace('\\', '', $processedpoints);
                    $propropoints = str_replace('"w{', '{', $propropoints);
                    $propropoints = str_replace('}w"', '}', $propropoints);
                    $processedcaptains = json_encode($capobj);
                    $processedvicecaptains = json_encode($vcapobj);
                    try {
                        $sql = $connection->createCommand("UPDATE ipl_fl SET points='$propropoints', captains='$processedcaptains', vice_captains='$processedvicecaptains', hostel='$hostel', gender='$gender' WHERE ldap='$ldap'");
                        $sql->execute();
                        die("updated");
                    } catch (Exception $e) {
                        die('Query failed '.$e);
                    }
                }
                else {
                    $pointobj->$matchno = $prepp;
                    $lengthofinsertingstring = strlen($prepp);
        
                    $captains = $pro['captains'];
                    $capobj = json_decode($captains);
                    $capobj->$matchno = $cap;
        
                    $vcaptains = $pro['vice_captains'];
                    $vcapobj = json_decode($vcaptains);
                    $vcapobj->$matchno = $vcap;
        
                    $processedpoints = json_encode($pointobj);
                    $propropoints = str_replace('\\', '', $processedpoints);
                    $secpointsl = substr($propropoints,strlen($propropoints)-1);
                    $secpointsf = substr($propropoints,0,strlen($propropoints)-2);
                    $propropoints = $secpointsf.$secpointsl;
                    $thipointsf = substr($secpointsf,0,strlen($secpointsf)-$lengthofinsertingstring-1);
                    $thipointsl = substr($secpointsf,strlen($secpointsf)-$lengthofinsertingstring);
                    $propropoints = $thipointsf.$thipointsl.'}';
                    $processedcaptains = json_encode($capobj);
                    $processedvicecaptains = json_encode($vcapobj);
                    try {
                        $sql = $connection->createCommand("UPDATE ipl_fl SET points='$propropoints', captains='$processedcaptains', vice_captains='$processedvicecaptains', hostel='$hostel', gender='$gender' WHERE ldap='$ldap'");
                        $sql->execute();
                        die("updated");
                    } catch (Exception $e) {
                        die('Query failed '.$e);
                    }
                }
                
            }
        }
        else {
            die("exceeded");
        }
    }
    else {
        $_SESSION["logdata"] = '';
        session_unset();
        session_destroy();
        die('logged out');
    }
}

?>