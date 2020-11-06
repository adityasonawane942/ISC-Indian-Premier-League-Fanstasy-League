<!DOCTYPE html>
<?php 

$connection = Yii::app()->db;
if ($connection) {
    // echo 'conn';
} else {
    die("Connection failed.");
}

$resultmatches = $connection->createCommand("SELECT * FROM ipl_matches")->queryAll();

$result = $connection->createCommand("SELECT * FROM ipl_fl")->queryAll();

$count = 0;
$ind = 0;
foreach($result as $participant) {
    $ind++;
    $ldapp = $participant['ldap'];
    $namep = $participant['name'];
    $cs = json_decode($participant['captains']);
    $vcs = json_decode($participant['vice_captains']);
    $gtotal = 0;
    $pointobjvar = get_object_vars(json_decode($participant['points']));
    for($i=1;$i<=50;$i++) {
        $total = 0;
        if(isset($pointobjvar[$i])) {
            $count++;
            $mp = json_decode($resultmatches[$i-1]['points']);
            $keysFromObjectf = array_keys(get_object_vars($pointobjvar[$i]));
            foreach($keysFromObjectf as $player) {
                if($cs->$i==$player) {
                    $total = $total + 2*$mp->$player;
                }
                else if($vcs->$i==$player) {
                    $total = $total + 1.5*$mp->$player;
                }
                else {
                    $total = $total + $mp->$player;
                }
            }
        }
        $gtotal = $gtotal + $total;
    }
    // $upd = $connection->createCommand("UPDATE ipl_fl SET daily_points='$gtotal' WHERE ldap='$ldapp'");
    // $upd->execute();
    // echo $ind."<br>";
}

echo $count;


?>