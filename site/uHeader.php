<!DOCTYPE html>
<html>
<head>
<title>Jobsguider</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="frontBoot/cssbootstrap/bootstrap.min.css">
<style>
  *{padding: 0; margin: 0; box-sizing: border-box;}
#mySidebar a{
color:gray;
 padding-bottom:20px;
 font-weight:bold;
}
.w3-myfont {
  font-family: "Comic Sans MS", cursive, sans-serif;
}
a{
	text-decoration: none;
}
a:hover{
	text-decoration: none;
}
@media only screen and (max-width: 600px){
#jobdetail{
  padding-top:60px!important;
}
}
</style>
</head>
<body style="background-color:#E7E7E7;">

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
  <img src="white-logo.png" alt="Lights" class="w3-image">
  <a href="#" class="w3-bar-item w3-button w3-border-bottom" style="margin-top:64px;">PPSC JOBS</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">POLICE JOBS</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">Government Jobs</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">Private Jobs</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">Education Jobs</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">NTS Jobs</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">PTS Jobs</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">Army Jobs Jobs</a>
  <a href="#" class="w3-bar-item w3-button w3-border-bottom">Ranger Jobs Jobs</a>
  <a href="#" class="w3-bar-item w3-button">FCPS Jobs</a>

</div>

<div class="w3-main" style="margin-left:200px">
  <div class="w3-blue" style="display:flex; justify-content:space-between; align-items:center;" id="headerHide">
  <div class="w3-container">
    <h3 style="vertical-align: middle;" class="w3-hide-large">Jobsguider</h3>
  </div>
  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
  
</div>