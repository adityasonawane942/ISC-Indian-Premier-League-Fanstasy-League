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

$resultsortedgrand = $connection->createCommand("SELECT * FROM ipl_fl ORDER BY grand_total DESC")->queryAll();

$resultsorted = $connection->createCommand("SELECT * FROM ipl_fl ORDER BY total_points DESC")->queryAll();

$resultsortedh = $connection->createCommand("SELECT * FROM ipl_fl")->queryAll();

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
<h2 style="text-align: center;"><b>320</b> Dream Teams made today!!</h2><br>
<div id="accordion">
    <div>
        <a class="card-link" data-toggle="collapse" href="#collapseTwo">            
      <div class="card-header">
      Daily Leaderboard
      </div>
        </a>
      <div id="collapseTwo" class="collapse show" data-parent="#accordion">
        <div class="card-body">
        <!-- <h3 style="text-align: center;">Today's Leaderboard will be updated soon<br><b>STAY TUNED . . .</b></h3><br> -->
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
                $i = 0;
                foreach($resultsorteddaily as $participant) {
                    // echo $rank;
                    $i++;
                    if($rank<=20) {
                        if(!(isset($prevpoint) && $prevpoint==$participant['daily_points'])) {
                            $rank++;
                        }
                        if(isset($ldap) && $rank<21) {
                            if($participant['ldap']==$ldap) {
                                $found = 1;
                                echo '<tr style="background: black; color: white; font-size: 15px;">';
                                echo '<td>'.$rank.'</td>';
                                echo '<td>'.$participant['name'].'</td>';
                                echo '<td>'.$participant['daily_points'].'</td>';
                                echo '</tr>';
                            }
                            else {
                                echo '<tr>';
                                echo '<td>'.$rank.'</td>';
                                echo '<td>'.$participant['name'].'</td>';
                                echo '<td>'.$participant['daily_points'].'</td>';
                                echo '</tr>';
                            }
                        } 
                        else if($rank<21) {
                            echo '<tr>';
                            echo '<td>'.$rank.'</td>';
                            echo '<td>'.$participant['name'].'</td>';
                            echo '<td>'.$participant['daily_points'].'</td>';
                            echo '</tr>';
                        }
                        else if(isset($ldap)) {
                            if($participant['ldap']==$ldap) {
                                $foundrank = $rank;
                                $foundpoint = $participant['daily_points'];
                            }
                        }
                        $prevpoint = $participant['daily_points'];
                    }
                    else if(isset($ldap)) {
                        if(!(isset($prevpoint) && $prevpoint==$participant['daily_points'])) {
                            $rank++;
                        }
                        if($participant['ldap']==$ldap) {
                            $foundrank = $rank;
                            $foundpoint = $participant['daily_points'];
                        }
                        $prevpoint = $participant['daily_points'];
                    }
                }
                if($found==0 && isset($ldap)) {
                    echo '<tr style="background: black; color: white; font-size: 15px;">';
                    echo '<td>'.$foundrank.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$foundpoint.'</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
        </div>
      </div>
    </div>
    <div>
        <a class="card-link" data-toggle="collapse" href="#collapseThree">            
      <div class="card-header">
      Hostel Leaderboard
      </div>
        </a>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
        <!-- <h3 style="text-align: center;">Leaderboard will be updated soon <br><b>STAY TUNED . . .</b></h3><br> -->
<div id="tab" class="table-responsive">
    <table style="text-align: center; transition: ease 0.3s;" class="table table-bordered table-sm">
        <thead>
            <tr style="background: rgba(0, 0, 0, 0);">
                <th>Rank</th>
                <th>Hostel</th>
                <th>Total Points</th>
                <th>Today's Participation</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $hp = [];
                $hp['h1'] = $resultsortedh[0]['h_points'];
                $hp['h2'] = $resultsortedh[1]['h_points'];
                $hp['h3'] = $resultsortedh[2]['h_points'];
                $hp['h4'] = $resultsortedh[3]['h_points'];
                $hp['h5'] = $resultsortedh[4]['h_points'];
                $hp['h6'] = $resultsortedh[5]['h_points'];
                $hp['h9'] = $resultsortedh[6]['h_points'];
                $hp['h10'] = $resultsortedh[7]['h_points'];
                $hp['h11'] = $resultsortedh[8]['h_points'];
                $hp['h12'] = $resultsortedh[9]['h_points'];
                $hp['h13'] = $resultsortedh[10]['h_points'];
                $hp['h14'] = $resultsortedh[11]['h_points'];
                $hp['h15'] = $resultsortedh[12]['h_points'];
                $hp['h18'] = $resultsortedh[13]['h_points'];
                $hp['ht'] = $resultsortedh[14]['h_points'];
                arsort($hp);
                $hostelcount = [];
                $hostelcount['h1'] = $resultsortedh[15]['h_points'];
                $hostelcount['h2'] = $resultsortedh[16]['h_points'];
                $hostelcount['h3'] = $resultsortedh[17]['h_points'];
                $hostelcount['h4'] = $resultsortedh[18]['h_points'];
                $hostelcount['h5'] = $resultsortedh[19]['h_points'];
                $hostelcount['h6'] = $resultsortedh[20]['h_points'];
                $hostelcount['h9'] = $resultsortedh[21]['h_points'];
                $hostelcount['h10'] = $resultsortedh[22]['h_points'];
                $hostelcount['h11'] = $resultsortedh[23]['h_points'];
                $hostelcount['h12'] = $resultsortedh[24]['h_points'];
                $hostelcount['h13'] = $resultsortedh[25]['h_points'];
                $hostelcount['h14'] = $resultsortedh[26]['h_points'];
                $hostelcount['h15'] = $resultsortedh[27]['h_points'];
                $hostelcount['h18'] = $resultsortedh[28]['h_points'];
                $hostelcount['ht'] = $resultsortedh[29]['h_points'];
                $hostelnames = [];
                $hostelnames['h1'] = "- Queen of the Campus";
                $hostelnames['h2'] = "- The Wild Ones";
                $hostelnames['h3'] = "- Vitruvians";
                $hostelnames['h4'] = "- MadHouse";
                $hostelnames['h5'] = "- Penthouse";
                $hostelnames['h6'] = "- Vikings";
                $hostelnames['h9'] = "- Nawaabon ki Basti";
                $hostelnames['h10'] = "- Phoenix";
                $hostelnames['h11'] = "- Athena";
                $hostelnames['h12'] = "- Crown of the Campus";
                $hostelnames['h13'] = "- House of Titans";
                $hostelnames['h14'] = "- Silicon Ship";
                $hostelnames['h15'] = "- Trident";
                $hostelnames['h18'] = "";
                $hostelnames['ht'] = "Tansa";
                $keys = array_keys($hp);
                $rank  = 0;
                $prevpoint = 0;
                $i = 0;
                foreach($hp as $hostel) {
                    if(!(isset($prevpoint) && $prevpoint==$hostel)) {
                        $rank++;
                    }
                    if($keys[$i]=='ht') {
                        echo '<tr>';
                        echo '<td>'.$rank.'</td>';
                        echo '<td>'.$hostelnames[$keys[$i]].'</td>';
                        echo '<td>'.$hostel.'</td>';
                        echo '<td>'.$hostelcount[$keys[$i]].'</td>';
                        echo '</tr>';
                    }
                    else {
                        echo '<tr>';
                        echo '<td>'.$rank.'</td>';
                        echo '<td>H'.substr($keys[$i],1).' '.$hostelnames[$keys[$i]].'</td>';
                        echo '<td>'.$hostel.'</td>';
                        echo '<td>'.$hostelcount[$keys[$i]].'</td>';
                        echo '</tr>';
                    }
                    $prevpoint = $hostel;
                    $i++;
                }
            ?>
        </tbody>
    </table>
</div>
        </div>
      </div>
    </div>
    <div>
        <a class="card-link" data-toggle="collapse" href="#collapseFour">            
      <div class="card-header">
      Overall Leaderboard
      </div>
        </a>
      <div id="collapseFour" class="collapse" data-parent="#accordion">
        <div class="card-body">
        <!-- <h3 style="text-align: center;">Leaderboard will be updated soon <br><b>STAY TUNED . . .</b></h3><br> -->
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
                $i = 0;
                foreach($resultsortedgrand as $participant) {
                    $i++;
                    if($rank<=20) {
                        if(!(isset($prevpoint) && $prevpoint==$participant['grand_total'])) {
                            $rank++;
                        }
                        if(isset($ldap) && $rank<21) {
                            if($participant['ldap']==$ldap) {
                                $found = 1;
                                echo '<tr style="background: black; color: white; font-size: 15px;">';
                                echo '<td>'.$rank.'</td>';
                                echo '<td>'.$participant['name'].'</td>';
                                echo '<td>'.$participant['grand_total'].'</td>';
                                echo '</tr>';
                            }
                            else {
                                echo '<tr>';
                                echo '<td>'.$rank.'</td>';
                                echo '<td>'.$participant['name'].'</td>';
                                echo '<td>'.$participant['grand_total'].'</td>';
                                echo '</tr>';
                            }
                        } 
                        else if($rank<21) {
                            echo '<tr>';
                            echo '<td>'.$rank.'</td>';
                            echo '<td>'.$participant['name'].'</td>';
                            echo '<td>'.$participant['grand_total'].'</td>';
                            echo '</tr>';
                        }
                        else if(isset($ldap)) {
                            if($participant['ldap']==$ldap) {
                                $foundrank = $rank;
                                $foundpoint = $participant['grand_total'];
                            }
                        }
                        $prevpoint = $participant['grand_total'];
                    }
                    else if(isset($ldap)) {
                        if(!(isset($prevpoint) && $prevpoint==$participant['grand_total'])) {
                            $rank++;
                        }
                        if($participant['ldap']==$ldap) {
                            $foundrank = $rank;
                            $foundpoint = $participant['grand_total'];
                        }
                        $prevpoint = $participant['grand_total'];
                    }
                }
                if($found==0 && isset($ldap)) {
                    echo '<tr style="background: black; color: white; font-size: 15px;">';
                    echo '<td>'.$foundrank.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$foundpoint.'</td>';
                    echo '</tr>';
                }
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