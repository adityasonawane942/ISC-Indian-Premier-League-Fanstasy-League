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

 $this->pageTitle="Dashboard - ". Yii::app()->name;
?>

<style>
    
h4,p {
  margin-bottom: 30px;
}
a {
    color: white;
}
a:hover {
    text-decoration: none;
}
a:focus {
    text-decoration: none;
}
#link {
    outline: 0;
    border: 2px solid black;
    padding: 10px 15px;
    border-radius: 10px;
    background-color: black;
    color: white;
    transition: ease 0.3s;
    width: 50%;
}
#link:hover {
    background-color: white;
    color: black;
}
.row {
    margin: 15px 0;
}

#fh5co-blog-section {
    padding: 7em 0 0 0; 
}
.col-sm-8 {
  padding : 20vh 0;
}

@media screen and (max-width: 576px) {
  
.col-sm-8 {
  padding : 23vh 0;
}
  button {
      font-size: 15px;
  }
  #link { 
      width: 100%;
  }
}
</style>
<?php 
session_start();
if(isset($_SESSION["logdata"])) {
    $ud = $_SESSION["logdata"]; 
    $ldap = $ud['user_information']['username'];
}
else {
    $ldap = '';
    echo "<script type='text/javascript'>window.top.location='https://gymkhana.iitb.ac.in/~sports/index.php?r=site/userlogin';</script>";
}
?>

<html>
<body>

<div class="fh5co-overlay" style=" height: 80px;"></div>
<div id="fh5co-blog-section" class="fh5co-section-gray">
  <div class="container" style="margin-top:60px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box" style="margin-bottom: 0;">
        <h3>Dashboard</h3>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.04); text-align: center;">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <a target="_blank" href="https://gymkhana.iitb.ac.in/~sports/index.php?r=site/iplfantasyleague"><button id="link">IPL Fantasy League</button></a>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <a target="_blank" href="https://gymkhana.iitb.ac.in/~sports/index.php?r=site/courtbooking"><button id="link">Court Booking</button></a>
        </div>
    </div> -->
</div>

</body>
</html>