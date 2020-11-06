<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<?php
/* @var $this SidebarrightController */

 $this->pageTitle="IPL Fantasy League Leaderboard - ". Yii::app()->name;
?>

<?php 
session_start();
?>

<style>
.container-fluid {
    background-color: rgba(0, 0, 0, 0.04);
}  
#fh5co-blog-section {
    padding: 7em 0 0 0; 
}
#tab {
    width: 80%;
    margin: auto;
}
.table > caption + thead > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > th, .table > thead:first-child > tr:first-child > td {
    border-top: 2px solid #FCC72C;
}
.table-bordered > thead > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td {
    border: 2px solid #FCC72C;
}
tr {
    transition: ease 0.3s;
}
tr:hover {
    background: white;
}
.card-header {
    font-size: 15px;
    background-color: #19398a;
    color: white;
    transition: ease 0.3s;
    border: 2px solid #19398a;
}
.card-header:hover {
    background-color: white;
    color: #19398a;
}
.card-link {
    color: black !important;
}
.card-link:focus {
    text-decoration: none;
    color: black !important;
}
.card-link:hover {
    color: black !important;
}

@media screen and (max-width: 576px) {
    #tab {
        width: 100%;
        border: 2px solid #FCC72C;
    }
    .table {
        border: 2px solid #FCC72C;
    }
    .table > caption + thead > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > th, .table > thead:first-child > tr:first-child > td {
    border-top: 0px solid #FCC72C;
    }
    .table-bordered > thead > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td {
        border: 2px solid #FCC72C;
    }
    .card-header:hover {
        background-color: #19398a;
        color: white;
    }
    .card-header {
        text-align: center;
    }
}
</style>

<?php 

$connection = Yii::app()->db;
if ($connection) {
    // echo 'conn';
} else {
    die("Connection failed.");
}

if(isset($_SESSION["logdata"])) {
    $ud = $_SESSION["logdata"];
    $ldap = $ud['user_information']['username'];
    $name = $ud['user_information']['first_name'].' '.$ud['user_information']['last_name'];
}

$resultsorted = $connection->createCommand("SELECT * FROM ipl_fl ORDER BY total_points DESC")->queryAll();
$resultsortedh1 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 1' ORDER BY total_points DESC")->queryAll();
$resultsortedh2 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 2' ORDER BY total_points DESC")->queryAll();
$resultsortedh3 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 3' ORDER BY total_points DESC")->queryAll();
$resultsortedh4 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 4' ORDER BY total_points DESC")->queryAll();
$resultsortedh5 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 5' ORDER BY total_points DESC")->queryAll();
$resultsortedh6 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 6' ORDER BY total_points DESC")->queryAll();
$resultsortedh7 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 7' ORDER BY total_points DESC")->queryAll();
$resultsortedh8 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 8' ORDER BY total_points DESC")->queryAll();
$resultsortedh9 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 9' ORDER BY total_points DESC")->queryAll();
$resultsortedh10 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 10' ORDER BY total_points DESC")->queryAll();
$resultsortedh11 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 11' ORDER BY total_points DESC")->queryAll();
$resultsortedh12 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 12' ORDER BY total_points DESC")->queryAll();
$resultsortedh13 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 13' ORDER BY total_points DESC")->queryAll();
$resultsortedh14 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 14' ORDER BY total_points DESC")->queryAll();
$resultsortedh15 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 15' ORDER BY total_points DESC")->queryAll();
$resultsortedh16 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 16' ORDER BY total_points DESC")->queryAll();
$resultsortedh17 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 17' ORDER BY total_points DESC")->queryAll();
$resultsortedh18 = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Hostel 18' ORDER BY total_points DESC")->queryAll();
$resultsortedht = $connection->createCommand("SELECT * FROM ipl_fl WHERE hostel='Tansa' ORDER BY total_points DESC")->queryAll();
$resultsorteddaily = $connection->createCommand("SELECT * FROM ipl_fl ORDER BY daily_points DESC")->queryAll();

?>

<html>
<body>
<div class="fh5co-overlay" style=" height: 80px;"></div>
<div id="fh5co-blog-section" class="fh5co-section-gray">
  <div class="container" style="margin-top:60px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
        <h3>IPL FANTASY LEAGUE LEADERBOARD</h3>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">
<h2 style="text-align: center;"><b>470</b> Dream Teams made today!!</h2><br>
<div id="accordion">
    <div>
        <a class="card-link" data-toggle="collapse" href="#collapseOne">            
      <div class="card-header">
      Weekly Leaderboard
      </div>
        </a>
      <div id="collapseOne" class="collapse" data-parent="#accordion">
        <div class="card-body">
        <h3 style="text-align: center;">Leaderboard will be updated soon <br><b>STAY TUNED . . .</b></h3><br>
<div id="tab" class="table-responsive">
    <table style="text-align: center; transition: ease 0.3s;" class="table table-bordered table-sm">
        <thead>
            <tr style="background: rgba(0, 0, 0, 0);">
                <th>Rank</th>
                <th>Name</th>
                <th>Total Points</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $hostellist = [];
                $hostelcount = [];
                $hostelcount['h1'] = count($resultsortedh1);
                $hostelcount['h2'] = count($resultsortedh2);
                $hostelcount['h3'] = count($resultsortedh3);
                $hostelcount['h4'] = count($resultsortedh4);
                $hostelcount['h5'] = count($resultsortedh5);
                $hostelcount['h6'] = count($resultsortedh6);
                $hostelcount['h7'] = count($resultsortedh7);
                $hostelcount['h8'] = count($resultsortedh8);
                $hostelcount['h9'] = count($resultsortedh9);
                $hostelcount['h10'] = count($resultsortedh10);
                $hostelcount['h11'] = count($resultsortedh11);
                $hostelcount['h12'] = count($resultsortedh12);
                $hostelcount['h13'] = count($resultsortedh13);
                $hostelcount['h14'] = count($resultsortedh14);
                $hostelcount['h15'] = count($resultsortedh15);
                $hostelcount['h16'] = count($resultsortedh16);
                $hostelcount['h17'] = count($resultsortedh17);
                $hostelcount['h18'] = count($resultsortedh18);
                $hostelcount['ht'] = count($resultsortedht);
                $hostellist['h1'] = 0;
                $hostellist['h2'] = 0;
                $hostellist['h3'] = 0;
                $hostellist['h4'] = 0;
                $hostellist['h5'] = 0;
                $hostellist['h6'] = 0;
                $hostellist['h7'] = 0;
                $hostellist['h8'] = 0;
                $hostellist['h9'] = 0;
                $hostellist['h10'] = 0;
                $hostellist['h11'] = 0;
                $hostellist['h12'] = 0;
                $hostellist['h13'] = 0;
                $hostellist['h14'] = 0;
                $hostellist['h15'] = 0;
                $hostellist['h16'] = 0;
                $hostellist['h17'] = 0;
                $hostellist['h18'] = 0;
                $hostellist['ht'] = 0;
                $found = 0;
                $foundrank = 0;
                $foundpoint = 0;
                $rank  = 0;
                $prevpoint = 0;
                $i = 0;
                $keys = array_keys($hostellist);
                foreach($hostellist as $participant) {

                    $prevpoint = $prevpoint + $hostelcount[$keys[$i]];
                    // echo($i." ".$prevpoint)."<br>";
                    // $i++;
                    // if(strlen($participant['hostel'])>5 && $participant['hostel']!='Hostel 7' && $participant['hostel']!='Hostel 8' && $participant['hostel']!='Hostel 16' && $participant['hostel']!='Hostel 17') {
                    //     if($hostelcount['h'.substr($participant['hostel'],7)]<25) {
                    //         $hostellist['h'.substr($participant['hostel'],7)] = $hostellist['h'.substr($participant['hostel'],7)] + $participant['grand_total'];
                    //         $hostelcount['h'.substr($participant['hostel'],7)]++;
                    //     }
                    // }
                    // else if(strlen($participant['hostel'])==5 && $hostelcount['ht']<25) {
                    //     $hostellist['ht'] = $hostellist['ht'] + $participant['grand_total'];
                    //     $hostelcount['ht']++;
                    // }
                    // $i++;
                    // if($rank<=20) {
                    //     if(!(isset($prevpoint) && $prevpoint==$participant['total_points'])) {
                    //         $rank++;
                    //     }
                    //     if(isset($ldap) && $rank<21) {
                    //         if($participant['ldap']==$ldap) {
                    //             $found = 1;
                    //             echo '<tr style="background: black; color: white; font-size: 15px;">';
                    //             echo '<td>'.$rank.'</td>';
                    //             echo '<td>'.$participant['name'].'</td>';
                    //             echo '<td>'.$participant['total_points'].'</td>';
                    //             echo '</tr>';
                    //         }
                    //         else {
                    //             echo '<tr>';
                    //             echo '<td>'.$rank.'</td>';
                    //             echo '<td>'.$participant['name'].'</td>';
                    //             echo '<td>'.$participant['total_points'].'</td>';
                    //             echo '</tr>';
                    //         }
                    //     } 
                    //     else if($rank<21) {
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$keys[$i].'</td>';
                            echo '<td>'.$hostelcount[$keys[$i]].'</td>';
                            echo '</tr>';
                            $i++;
                    //     }
                    //     $prevpoint = $participant['total_points'];
                    // }
                    // else if(isset($ldap)) {
                        // if(!(isset($prevpoint) && $prevpoint==$participant['total_points'])) {
                        //     $rank++;
                        // }
                        // if($participant['ldap']==$ldap) {
                        //     $foundrank = $rank;
                        //     $foundpoint = $participant['total_points'];
                        // }
                        // $prevpoint = $participant['total_points'];
                    // }
                }
                echo $prevpoint;
                
                // var_dump($hostellist);
                // if($found==0 && isset($ldap)) {
                //     echo '<tr style="background: black; color: white; font-size: 15px;">';
                //     echo '<td>'.$foundrank.'</td>';
                //     echo '<td>'.$name.'</td>';
                //     echo '<td>'.$foundpoint.'</td>';
                //     echo '</tr>';
                // }
            ?>
        </tbody>
    </table>
</div>
        </div>
      </div>
    </div>
    <div>
        <a class="card-link" data-toggle="collapse" href="#collapseTwo">            
      <div class="card-header">
      Daily Leaderboard
      </div>
        </a>
      <div id="collapseTwo" class="collapse show" data-parent="#accordion">
        <div class="card-body">
        <h3 style="text-align: center;">Today's Leaderboard will be updated soon<br><b>STAY TUNED . . .</b></h3><br>
<div id="tab" class="table-responsive">
    <table style="text-align: center; transition: ease 0.3s;" class="table table-bordered table-sm">
        <thead>
            <tr style="background: rgba(0, 0, 0, 0);">
                <th>Rank</th>
                <th>Name</th>
                <th>Total Points</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $found = 0;
                $foundrank = 0;
                $foundpoint = 0;
                $rank  = 0;
                $prevpoint = 0;
                $sum = 0;
                $i = 0;
                foreach($resultsortedh6 as $participant) {
                    $i++;
                    if($i<=25) {
                        $sum = $sum+$participant['daily_points'];
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$participant['name'].'</td>';
                            echo '<td>'.$participant['daily_points'].'</td>';
                            echo '</tr>';
                    }
                }
                echo $sum;
            ?>
        </tbody>
    </table>
</div>

        </div>
      </div>
    </div>
</div><br><br><br>
            </div>

</body>
</html>