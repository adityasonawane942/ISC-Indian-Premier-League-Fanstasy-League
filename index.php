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

 $this->pageTitle="IPL Fantasy League - ". Yii::app()->name;
?>

<?php 
session_start();
?>

<style>
html::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
}
body {
    padding: 0 !important;
}
p {
    margin : 0;
    font-size: 1.2vw;
    text-align: center;
}
.card-img-top {
    width: 50%; padding: 5px;
}
.col-sm-3 {
    padding: 0;
}
.card {
    border: 2px solid #19398a;
    border-radius: 15px;
    background-color: white;
    color: white;
    cursor: pointer;
    transition: ease 0.3s;
    margin: 5px;
}
.card:hover {
    transform: scale(0.98);
    box-shadow: 0 0 15px 1px black;
}
.btna {
    background-color: #19398a; border: 0; padding: 10px 15px; border-radius: 10px; width: 100%;
    transition: ease 0.3s;
    color: white;
    outline: 0 !important;
}
.btna:hover {
    background-color: black;
    color: white;
}
#link {
    outline: 0;
    font-size: 17px;
    border: 1px solid #19398a;
    padding: 5px 5px;
    transition: ease 0.3s;
    background-color: #19398a;
    color: white;
}
#link:hover {
    background-color: white;
    color: #19398a;
}
#rule {
    outline: 0;
    border: 2px solid black;
    padding: 10px 15px;
    border-radius: 10px;
    background-color: black;
    color: white;
    transition: ease 0.3s;
    width: 50%;
}
#rule:hover {
    background-color: white;
    color: black;
}
#fh5co-blog-section {
    padding: 7em 0 0 0; 
}
.close {
    font-size: 3.5rem;
}
.modal-header .close {
    padding: 0.7rem 1rem;
}
#wel {
    font-size: 17px;
}
#fh5co-header {
    z-index: 2;
}
select {
    margin: 5px;
    outline: 0;
    padding: 5px 10px;
    border: 2px solid black;
    transition: ease 0.3s;
}
#fal {
    display: none;
}
select:focus {
    border: 2px solid #FCC72C;
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
.modal-title {
    font-size: 2rem;
    color: black;
}
#tab {
    width: 50%;
    display: inline-block;
    margin: 0 auto;
    border: 0;
    vertical-align: top;
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
}
#tab::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
}
#prevtab {
    width: 50%;
    border: 0;
    margin: auto;
}
#logo {
    position: absolute; right: 15px; margin-top: -8px;
}
#lead {
    position: absolute; right: 15px; margin-top: -8px;
}
.table > thead > tr > th {
    border: 0;
    font-size: 20px;
}
.table > tbody > tr > td {
    border: 0;
    padding: 5px;
}
.table {
    border: 0;
}
.btn-success:hover {
    background-color: #28a745 !important;
}
.btn-success:focus {
    background-color: #28a745 !important;
}


@media screen and (max-width: 900px) {
    p {
        font-size: 1.6vw;
    }
}

@media screen and (max-width: 576px) {
    p {
        font-size: 4vw;
    }
    .modal-footer {
        padding: 1.75rem;
    }
    .btn {
        font-size: 1.2rem;
    }
    .col-sm-6 {
        padding: 0;
    }
    #mainc {
        box-shadow: 0 0 15px 1px black;
    }
    .card:hover {
        box-shadow: 0 0 black;
        transform: none;
    }
    .card-header:hover {
        background-color: #19398a;
        color: white;
    }
    .card-img-top {
        width: 75%; padding: 5px;
    }
    .card {
        margin: 10px;
    }
    #wel {
        font-size: 17px;
    }
    .modal-header {
        border-bottom: 0;
    }
    .modal-content {
        overflow-y: scroll;
        overflow-x: hidden;
    }
    #prevtab {
        width: 100%;
    }
    .modal-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: white;
        padding-right: 15px;
    }
    .btna:hover {
        background-color: #19398a;
        color: white;
    }
    #fal {
        display: block;
    }
    .card-header {
        text-align: center;
    }
}

@media screen and (max-width: 380px) {
    #logo > button {
        font-size: 12px;
    }
    #lead > a > button {
        font-size: 12px;
    }
    .modal-footer {
        padding: 1.75rem;
    }
    .btn {
        font-size: 1.2rem;
    }
    #wel {
        font-size: 14px;
    }
}
</style>
<html>
<body>
<div class="fh5co-overlay" style=" height: 80px;"></div>
<div id="fh5co-blog-section" class="fh5co-section-gray">
  <div class="container" style="margin-top:60px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
        <h3>IPL FANTASY LEAGUE</h3>
      </div>
    </div>
  </div>
</div>

<?php 
// var_dump($_SESSION['logdata']);
// $servername = "localhost";
// $username = "usera";
// $password = "test1234";
// $dbname = "trial";

// $connection = mysqli_connect($servername, $username, $password, $dbname);

$csk = 'CSK';
$mi = 'MI';
$rr = 'RR';
$rcb = 'RCB';
$kkr = 'KKR';
$kxip = 'KXIP';
$dc = 'DC';
$srh = 'SRH';
$colorcodes = new stdClass();
$colorcodes->$csk = 'rgba(243,207,3,1)';
$colorcodes->$rr = 'rgba(227,26,129,1)';
$colorcodes->$mi = 'rgba(13,45,91,1)';
$colorcodes->$rcb = 'rgba(184,14,34,1)';
$colorcodes->$kkr = 'rgba(68,0,120,1)';
$colorcodes->$srh = 'rgba(241,112,14,1)';
$colorcodes->$dc = 'rgba(17,74,144,1)';
$colorcodes->$kxip = 'rgba(158,12,18,1)';

$connection = Yii::app()->db;
if ($connection) {
    // echo 'conn';
} else {
    die("Connection failed.");
}

if(isset($_SESSION["logdata"])) {
    $ud = $_SESSION["logdata"]; 
    $ldap = $ud['user_information']['username'];
    $name = $ud['user_information']['first_name'];
    $hostel = $ud['user_information']['insti_address']['hostel_name'];

    
$currtime = date_format(date_add(date_create(date("Y-m-d H:i", time())), date_interval_create_from_date_string("5 hours 30 minutes")), "Y-m-d H:i");

$resultmatches = $connection->createCommand("SELECT * FROM ipl_matches")->queryAll();
// $resultmatches = mysqli_query($connection, $matches);
$upcoming = [];
$previous = [];
$later = [];
$ind = 0;
foreach($resultmatches as $match) {
    if($match['match_time'] < $currtime && $match['match_no']!=19 && $match['match_no']!=20) {
        array_push($previous, $match);
    }
    else if($ind<2 && $match['match_no']!=19 && $match['match_no']!=20) {
        array_push($upcoming, $match);
        $ind++;
    }
    else if($ind<6 && $match['match_no']!=19 && $match['match_no']!=20) {
        array_push($later, $match);
        $ind++;
    }
}

$previous = array_reverse($previous);

$resultprofile = $connection->createCommand("SELECT * FROM ipl_fl WHERE ldap='$ldap'")->queryAll();
// $resultprofile = mysqli_query($connection, $profile);

if(count($resultprofile)) {
    foreach($resultprofile as $aprofile) {
        $currprofile = $aprofile;
        $cs = json_decode($currprofile['captains']);
        $vcs = json_decode($currprofile['vice_captains']);
    }
    $pointobj = json_decode($currprofile['points']);
}
else {
    $pointobj = new stdClass();
}
$gtotal = 0;
$total = array_fill(1,60,0);

for($i=1;$i<=60;$i++) {
    if(isset($pointobj->$i)) {
        $keysFromObjectf = array_keys(get_object_vars($pointobj->$i));
        $resultmatcht = $connection->createCommand("SELECT * FROM ipl_matches WHERE match_no='$i'")->queryAll();
        $resultmatchi = $resultmatcht[0];
        $matchpoints = json_decode($resultmatchi['points']);
        foreach($keysFromObjectf as $player) {
            if($cs->$i==$player) {
                $total[$i] = $total[$i] + 2*$matchpoints->$player;
            }
            else if($vcs->$i==$player) {
                $total[$i] = $total[$i] + 1.5*$matchpoints->$player;
            }
            else {
                $total[$i] = $total[$i] + $matchpoints->$player;
            }
        }
        $gtotal = $gtotal + $total[$i];
    }
}

}
else {
    $gtotal = 0;
    echo "<script type='text/javascript'>window.top.location='https://gymkhana.iitb.ac.in/~sports/index.php?r=site/userlogin';</script>";
}

?>

<div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.04);">
<!-- <h4 id="wel"><b><span>Weekly Points : <?php echo $gtotal ?></span></b></h4> -->
<h4 id="wel"><b><span>Total Points : <?php echo $gtotal ?></span></b> <span id="lead"><a style="color: black; text-decoration: none;" href="https://gymkhana.iitb.ac.in/~sports/index.php?r=site/iplfantasyleagueleaderboard"><button id="link">Leaderboard</button></a></span> <!-- <span id="logo"><button onclick="sub(0)" id="link">Logout</button></span> --> </h4>
<hr style="margin-top: 0; border-top: 1px solid rgba(0, 0, 0, 0); margin-bottom: 0.5rem;">
<div id="accordion">
    <div>
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
            
      <div class="card-header">
          Upcoming Matches
      </div>
        </a>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
        <div class="row">
        <!-- <p style="margin: auto; color: black;"><b>Playoffs will be updated soon!</b></p> -->
        <!-- <p style="margin: auto; color: black;"><b>The IIT Bombay's Fantasy League will continue after the midsems from Monday, 12th Oct (Week 4 according to the Rulebook)</b></p> -->
        <?php 
        if(isset($_SESSION["logdata"])) {
            foreach($upcoming as $match) {
                $teama = $match['teama'];
                $teamb = $match['teamb'];
                echo '<div class="col-sm-6">';
                    echo '<div class="card" onclick="mchange()" id="mainc" style="color: white; border: 0;" data-toggle="modal" data-target="#myModal'.$match['match_no'].'">';
                    echo '<div style="display: inline-block; border-radius: 15px 15px 0 0; background: linear-gradient(90deg, '.$colorcodes->$teama.' 33.3333333%, '.$colorcodes->$teamb.' 67.777777%);">' ;   
                    echo '<div style="width: 50%; display: inline-block; text-align: center;"><img class="card-img-top" src="images/ipl/'.$match['teama'].'.png" alt="Card image"></div>';
                    echo '<div style="width: 50%; display: inline-block; text-align: center;"><img class="card-img-top" src="images/ipl/'.$match['teamb'].'.png" alt="Card image"></div>';
                    echo '</div>';

                        echo '<div class="card-body">';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                echo '<p style="color: #19398a;"><b>'.$match['teama'].'&nbsp vs &nbsp'.$match['teamb'].'</b></p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                $ftime = date_format(date_create($match['match_time']), "jS M, Y H:i");
                                echo '<p style="color: #19398a;">'.$ftime.' IST</p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                // echo '<p style="color: #19398a;">Points : '.$total[$match['match_no']].'</p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                echo '<p style="color: #19398a;">Venue : '.$match['venue'].'</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>'; 
            
                    echo '<div class="modal fade" id="myModal'.$match['match_no'].'">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content" id="outer">
                    <div class="modal-header">
                      <h4 class="modal-title"><b>'.$match['teama'].'&nbsp vs &nbsp'.$match['teamb'].'</b></h4>
                      <button type="button" style="outline: 0;" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">';
                    $id = $match['match_no'];
                        $resultmatch = $connection->createCommand("SELECT * FROM ipl_matches WHERE match_no='$id'")->queryAll();
                        // $resultmatch = mysqli_query($connection, $matches);
                        foreach($resultmatch as $amatch) {
                            $currmatch = $amatch;
                        }
                        $mpoints = json_decode($currmatch['points']);
                        $keysFromObjectm = array_keys(get_object_vars($mpoints));
                        if(isset($pointobj->$id)) {
                            $keysFromObjectt = array_keys(get_object_vars($pointobj->$id));
                            echo '<p style="text-align: left;"><b>Current Choices</b></p>';
                            echo '<hr style="margin-top: 0; border-top: 1px solid #FCC72C; margin-bottom: 0.5rem;">';
                            echo '<div class="row" style="padding: 0 15px;">';
                            echo 'Captain : '.substr($cs->$id,2).'<br>Vice Captain : '.substr($vcs->$id,2);
                            echo '<br>All Choices : |';
                            foreach($keysFromObjectt as $pl) {
                                echo ' '.substr($pl,2).' |';
                            }
                            echo '<br><br></div>';
                        }
                        echo '<p style="text-align: left;"><b>Select 7 Players</b></p>';
                        echo '<hr style="margin-top: 0; border-top: 1px solid #FCC72C; margin-bottom: 0.5rem;">';
                        echo '<div class="row" style="text-align: center; display: inline-block; width: 100%; margin: 0 auto;">';
                            $teamap = [];
                            $teambp = [];
                            for($i=0;$i<count($keysFromObjectm);$i++) {
                                if(substr($keysFromObjectm[$i],0,2)==substr($teama,0,2)) {
                                    array_push($teamap,$keysFromObjectm[$i]);
                                }
                                else {
                                    array_push($teambp,$keysFromObjectm[$i]);
                                }
                            }
                            echo '<div id="tab" class="table-responsive">
                            <table style="text-align: center;" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>'.$teama.'</th>
                                    </tr>
                                </thead>
                                <tbody>';
                            $i = 0;
                            for(;$i<count($teamap);$i++) {
                                $mi = sprintf("%02d", $id);
                                $pi = sprintf("%02d", $i);
                                echo '<tr>';
                                echo '<td><button av="'.$teamap[$i].'" id="'.$mi.$pi.'" onclick="sel(`'.$mi.$pi.'`)" class="btna">'.substr($teamap[$i],2).'</button></td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>';
                            echo '<div id="tab" class="table-responsive">
                            <table style="text-align: center;" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>'.$teamb.'</th>
                                    </tr>
                                </thead>
                                <tbody>';
                            for($j=0;$j<count($teambp);$j++) {
                                $mi = sprintf("%02d", $id);
                                $pi = sprintf("%02d", $i);
                                echo '<tr>';
                                echo '<td><button av="'.$teambp[$j].'" id="'.$mi.$pi.'" onclick="sel(`'.$mi.$pi.'`)" class="btna">'.substr($teambp[$j],2).'</button></td>';
                                echo '</tr>';
                                $i++;
                            }
                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>';
                        echo '</div><br><hr style="margin-top: 0; border-top: 1px solid #FCC72C; margin-bottom: 0.5rem;">';
                        echo '<div class="int" id="proc'.$id.'"></div><div id="fal"><br><br><br><br></div></div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" onclick="proceed('.$id.')" class="btn btn-success">Proceed</button>
                        </div>';
                  echo '</div>
                </div>
            </div>';
                }
        } else {
            echo "<script type='text/javascript'>window.top.location='https://gymkhana.iitb.ac.in/~sports/index.php?r=site/userlogin';</script>";
        }
        
    ?>
        </div>
        </div>
      </div>
    </div>
    <div>
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
      <div class="card-header">
          Previous Matches
      </div>
        </a>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
        <div class="row">
        <?php 
        if(isset($_SESSION["logdata"])) {
            foreach($previous as $match) {
                echo '<div class="col-sm-3">';
                    echo '<div class="card" style="color: white;" data-toggle="modal" data-target="#myModal'.$match['match_no'].'">';
                        echo '<div class="card-body">';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                echo '<p style="color: #19398a;"><b>'.$match['teama'].'&nbsp vs &nbsp'.$match['teamb'].'</b></p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                $ftime = date_format(date_create($match['match_time']), "jS M, Y H:i");
                                echo '<p style="color: #19398a;">'.$ftime.' IST</p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                echo '<p style="color: #19398a;">Points : '.$total[$match['match_no']].'</p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="col-sm-12">';
                                echo '<p style="color: #19398a;">Venue : '.$match['venue'].'</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>'; 
            
                echo '<div class="modal fade" id="myModal'.$match['match_no'].'">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content" id="outer">
                    <div class="modal-header">
                      <h4 class="modal-title"><b>'.$match['teama'].'&nbsp vs &nbsp'.$match['teamb'].'</b></h4>
                      <button type="button" style="outline: 0;" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">';
                    $id = $match['match_no'];
                    if(isset($pointobj->$id)) {
                        $keysFromObject = array_keys(get_object_vars($pointobj->$id));
                        echo '<p style="text-align: left;"><b>Fixed Choices</b></p>';
                        echo '<hr style="margin-top: 0; border-top: 1px solid #FCC72C; margin-bottom: 0.5rem;">';
                        $points = json_decode($match['points']);
                        echo '<div id="prevtab" class="table-responsive">
                        <table style="text-align: center;" class="table table-borderless table-sm">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Name</th>';
                        echo '<th>Points</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        foreach($keysFromObject as $player) {
                            echo '<tr>';
                            if($cs->$id==$player) {
                                echo '<td>'.substr($player,2).' (C)</td><td>'.$points->$player.'</td>';
                            }
                            else if($vcs->$id==$player) {
                                echo '<td>'.substr($player,2).' (VC)</td><td>'.$points->$player.'</td>';
                            }
                            else {
                                echo '<td>'.substr($player,2).'</td><td>'.$points->$player.'</td>';
                            }
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table></div>';
                        echo '</div>';
                    }
                    else {
                        echo '<p style="color: red; font-weight: 900;">You missed the chance!</p>';
                        echo '</div>';
                    }
                  echo '</div>
                </div>
            </div>';
                    }
        } else {
            echo "<script type='text/javascript'>window.top.location='https://gymkhana.iitb.ac.in/~sports/index.php?r=site/userlogin';</script>";
        }
        
    ?>
        </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class="row">
        <div class="offset-sm-2"></div>
        <div class="col-sm-8" style="text-align: center;">
            <a href="assets/view/IPL FPL Rulebook.pdf" target="_blank"><button id="rule">RULEBOOK</button></a>
        </div>
  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>

<script type="text/javascript">
selected = [];
cap = '';
vcap = '';
inner = '';
innerf = '';
k = 0;
l = 0;
matchno = 0;
mano = '';

function mchange() {
    selected = [];
    cap = '';
    vcap = '';
    inner = '';
    innerf = '';
    ints = document.getElementsByClassName("int");
    for(var int of ints) {
        int.innerHTML = '';
    }
    k = 0;
    l = 0;
    matchno = 0;
    var all = document.getElementsByClassName("btna");
    for(var el of all) {
        el.style.color = "white";
        el.style.background = "#19398a";
    }
}

function sel(ind) {
    if(selected.length==7) {
        // // console.log(ind);
        if(selected.includes(document.getElementById(ind).getAttribute("av"))) {
            document.getElementById(ind).style.background = "#19398a";
            document.getElementById(ind).style.color = "white";
            selected.splice(selected.indexOf(document.getElementById(ind).getAttribute("av")),1);
            // // console.log("proc".concat((ind.toString()).substring(0,2)));
            document.getElementById("proc".concat((ind.toString()).substring(0,2))).innerHTML = '';
            k = 1;
            return;
        }
        // // console.log(selected);
    }
    else { 
        // // console.log(ind);
        if(selected.includes(document.getElementById(ind).getAttribute("av"))) {
            document.getElementById(ind).style.background = "#19398a";
            document.getElementById(ind).style.color = "white";
            selected.splice(selected.indexOf(document.getElementById(ind).getAttribute("av")),1);
            return;
        }

        if(selected.length<7) {
            if(!selected.includes(document.getElementById(ind).getAttribute("av"))) {
                document.getElementById(ind).style.background = "#52f206";
                document.getElementById(ind).style.color = "black";
                selected.push(document.getElementById(ind).getAttribute("av"));
            }
        }
        else {
            alert("You can select only 7 players.");
        }
        // console.log(selected);
    }
}

function capc(ind) {
    document.getElementById("procf".concat(ind.toString())).innerHTML = '';
    tempcap = document.getElementById("capt").value;
    for(var c of selected) {
        if(c.substring(2,c.length)==tempcap) {
            cap = c;
        }
    }
    // console.log(cap);
    k=4;
}

function vcapc(ind) {
    tempvcap = document.getElementById("vcapt").value;
    for(var vc of selected) {
        if(vc.substring(2,vc.length)==tempvcap) {
            vcap = vc;
        }
    }
    // console.log(vcap);
}

function proceed(ind) {
    matchno = ind;
    if(selected.length==7) {
        // console.log(cap);
        if(cap=='') {
            // console.log("DEF");
            inner = '<div class="row" style="text-align: center;"><div class="col-sm-6"><p style="color: black; margin-top: 10px;">Select a Captain</p></div><div class="col-sm-6">';
            inner = inner + '<select onchange="capc('+ind+')" id="capt">';
            for(var i = 0 ; i < 7; i++) {
                inner = inner + '<option>'+selected[i].substring(2,selected[i].length)+'</option>';
            }
            inner = inner + '</select></div>';
            inner = inner + '</div><div class="int" id="procf'+ind.toString()+'"></div>';
            // console.log("proc".concat(ind.toString()));
            document.getElementById("proc".concat(ind.toString())).innerHTML = inner;
            // console.log("proc".concat(ind.toString()));
            var elmnt = document.getElementById("proc".concat(ind.toString()));
            elmnt.scrollIntoView({ behavior: 'smooth'});
            tempcap = document.getElementById("capt").value;
            for(var c of selected) {
                if(c.substring(2,c.length)==tempcap) {
                    cap = c;
                }
            }
            // console.log(cap);
            k=4;
        }
        else if(k==1) {
            // console.log("K",k);
            inner = '<div class="row" style="text-align: center;"><div class="col-sm-6"><p style="color: black; margin-top: 10px;">Select a Captain</p></div><div class="col-sm-6">';
            inner = inner + '<select onchange="capc('+ind+')" id="capt">';
            for(var i = 0 ; i < 7; i++) {
                inner = inner + '<option>'+selected[i].substring(2,selected[i].length)+'</option>';
            }
            inner = inner + '</select></div>';
            inner = inner + '</div><div class="int" id="procf'+ind.toString()+'"></div>';
            document.getElementById("proc".concat(ind.toString())).innerHTML = inner;
            var elmnt = document.getElementById("proc".concat(ind.toString()));
            elmnt.scrollIntoView({ behavior: 'smooth'});
            tempcap = document.getElementById("capt").value;
            for(var c of selected) {
                if(c.substring(2,c.length)==tempcap) {
                    cap = c;
                }
            }
            // console.log(cap);
            k=4
        }
        else if(k==4) {
            // console.log("K",k);
            proceedf(ind);
        }
        else if(k==5) {
            // console.log("K",k);
            var result = confirm("Are you sure you want to submit your choices?");
            if(result) {
                // console.log("ok");
                sub(1);
            }
            else {
                // console.log("cancel");
            }
        }
        else {
            // console.log("ELSE");
            tempcap = document.getElementById("capt").value;
            for(var c of selected) {
                if(c.substring(2,c.length)==tempcap) {
                    cap = c;
                }
            }
            // console.log(cap);
        }
    }
    else {
        alert("Please select 7 players.");
    }
}

function proceedf(ind) {
    // console.log(vcap);
    innerf = '';
    innerf = innerf + '<hr style="margin-top: 0; border-top: 1px solid #FCC72C; margin: 0.5rem 0;"><div class="row" style="text-align: center;"><div class="col-sm-6"><p style="color: black; margin-top: 10px;">Select a Vice Captain</p></div><div class="col-sm-6">';
    innerf = innerf + '<select onchange="vcapc('+ind+')" id="vcapt">';
    for(var i = 0 ; i < 7; i++) {
        if(selected[i]!=cap) {
            innerf = innerf + '<option>'+selected[i].substring(2,selected[i].length)+'</option>';
        }
    }
    innerf = innerf + '</select></div>';
    innerf = innerf + '</div>';
    document.getElementById("procf".concat(ind.toString())).innerHTML = innerf;
    var elmnt = document.getElementById("procf".concat(ind.toString()));
    elmnt.scrollIntoView({ behavior: 'smooth'});
    tempvcap = document.getElementById("vcapt").value;
    for(var vc of selected) {
        if(vc.substring(2,vc.length)==tempvcap) {
            vcap = vc;
        }
    }
    // console.log(vcap);
    k=5;
}

function sub(k) {
        if(k==1 && selected.length!=7) {
        alert("BKL");
        location.reload();
        return;
        }
        else {
            if(k==0) {
                selected = "ddsd";
                cap = "dsds";
                vcap = "ddsd";
                matchno = "dssds";
            }
            $.ajax({
                type: "POST",
                url: "https://gymkhana.iitb.ac.in/~sports/index.php?r=site/subipl",
                data: {lop: selected, c: cap, vc: vcap, mno: matchno, ke: k},
                success: function(data) {
                    if(data=="exceeded") {
                        alert("You are late! If you had previously made a choice of players for this match, that choice has been saved.");
                        location.reload();
                    }
                    else if(data=="inserted") {
                        alert("Your choices have been saved.");
                        location.reload();
                    }
                    else if(data=="updated") {
                        alert("Your choices have been updated.");
                        location.reload();
                    }
                    else if(data=="logged out") {
                        window.top.location='https://gymkhana.iitb.ac.in/~sports/index.php?r=site/userlogin';
                    }
                    else {
                    }
                }
            });
        }
}
</script>

</body>
</html>