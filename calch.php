<!DOCTYPE html>
<?php 

$connection = Yii::app()->db;
if ($connection) {
    // echo 'conn';
} else {
    die("Connection failed.");
}

$result = $connection->createCommand("SELECT * FROM ipl_fl ORDER BY daily_points DESC")->queryAll();
$resulth = $connection->createCommand("SELECT * FROM ipl_fl")->queryAll();
$ind = 0;
$hp = [];
$hp['h1'] = $resulth[0]['h_points'];
$hp['h2'] = $resulth[1]['h_points'];
$hp['h3'] = $resulth[2]['h_points'];
$hp['h4'] = $resulth[3]['h_points'];
$hp['h5'] = $resulth[4]['h_points'];
$hp['h6'] = $resulth[5]['h_points'];
$hp['h9'] = $resulth[6]['h_points'];
$hp['h10'] = $resulth[7]['h_points'];
$hp['h11'] = $resulth[8]['h_points'];
$hp['h12'] = $resulth[9]['h_points'];
$hp['h13'] = $resulth[10]['h_points'];
$hp['h14'] = $resulth[11]['h_points'];
$hp['h15'] = $resulth[12]['h_points'];
$hp['h18'] = $resulth[13]['h_points'];
$hp['ht'] = $resulth[14]['h_points'];
$hostelcount = [];
$hostelcount['h1'] = 0;
$hostelcount['h2'] = 0;
$hostelcount['h3'] = 0;
$hostelcount['h4'] = 0;
$hostelcount['h5'] = 0;
$hostelcount['h6'] = 0;
$hostelcount['h9'] = 0;
$hostelcount['h10'] = 0;
$hostelcount['h11'] = 0;
$hostelcount['h12'] = 0;
$hostelcount['h13'] = 0;
$hostelcount['h14'] = 0;
$hostelcount['h15'] = 0;
$hostelcount['h18'] = 0;
$hostelcount['ht'] = 0;

foreach($result as $participant) {
    $ind++;
    $tm1 = 50;
    $tm2 = 50;
    $pobj = json_decode($participant['points']);
    if($participant['hostel']=='Hostel 15' && $participant['gender']=='female') {
        if($hostelcount['h15']<25) {
            if(isset($pobj->$tm1)||isset($pobj->$tm2)) {
                $hp['h15'] = $hp['h15'] + $participant['daily_points'];
                $hostelcount['h15']++;   
            }
        }
        else {
            if(isset($pobj->$tm2)||isset($pobj->$tm1)) {
                $hp['h15'] = $hp['h15'] + 10; 
                $hostelcount['h15']++;    
            }
        }
    }
    else if(strlen($participant['hostel'])>5 && $participant['hostel']!='Hostel 7' && $participant['hostel']!='Hostel 8' && $participant['hostel']!='Hostel 16' && $participant['hostel']!='Hostel 15' && $participant['hostel']!='Hostel 17') {
        if($hostelcount['h'.substr($participant['hostel'],7)]<25) {
            if(isset($pobj->$tm2)||isset($pobj->$tm1)) {
                $hp['h'.substr($participant['hostel'],7)] = $hp['h'.substr($participant['hostel'],7)] + $participant['daily_points'];
                $hostelcount['h'.substr($participant['hostel'],7)]++;
            }
        }
        else {
            if(isset($pobj->$tm2)||isset($pobj->$tm1)) {
                $hostelcount['h'.substr($participant['hostel'],7)]++;
                $hp['h'.substr($participant['hostel'],7)] = $hp['h'.substr($participant['hostel'],7)] + 10;
            }
        }
    }
    else if(strlen($participant['hostel'])==5 && $hostelcount['ht']<25) {
        if(isset($pobj->$tm2)||isset($pobj->$tm1)) {
            $hp['ht'] = $hp['ht'] + $participant['daily_points'];
            $hostelcount['ht']++;  
        }
    }
    else if(strlen($participant['hostel'])==5) {
        if(isset($pobj->$tm2)||isset($pobj->$tm1)) {
            $hostelcount['ht']++;  
            $hp['ht'] = $hp['ht'] + 10;   
        }
    }
    echo $ind."<br>";
}

$ind = 0;
foreach($hp as $h) {
    echo $h."<br>";
    $ind++;
    $upd = $connection->createCommand("UPDATE ipl_fl SET h_points='$h' WHERE sr_no='$ind'");
    $upd->execute();
}
foreach($hostelcount as $h) {
    echo $h."<br>";
    $ind++;
    $upd = $connection->createCommand("UPDATE ipl_fl SET h_points='$h' WHERE sr_no='$ind'");
    $upd->execute();
}

?>