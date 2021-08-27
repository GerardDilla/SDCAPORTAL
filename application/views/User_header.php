<?php 

$First_Name = $this->session->userdata('First_Name');
$Middle_Name = $this->session->userdata('Middle_Name');
$Last_Name = $this->session->userdata('Last_Name');
$Course = $this->session->userdata('Course');
$YearLevel = $this->session->userdata('YearLevel');
$Address_No = $this->session->userdata('Address_No');
$Address_Street = $this->session->userdata('Address_Street');
$Address_Subdivision = $this->session->userdata('Address_Subdivision');
$Address_Barangay = $this->session->userdata('Address_Barangay');
$Address_City = $this->session->userdata('Address_City');
$Address_Province = $this->session->userdata('Address_Province');
$Email = $this->session->userdata('Email');
$Cp_No = $this->session->userdata('Cp_No');
$Tel_No = $this->session->userdata('Tel_No');
$Student_Number = $this->session->userdata('Student_Number');
$Reference_Number = $this->session->userdata('Reference_Number');
$picture = $this->session->userdata('picture');
$logged_in = $this->session->userdata('logged_in');
$Account_Number = $this->session->userdata('Account_Number');

?>

<?php

$profile = "";
$grades = "";
$balance = "";
$sched = "";
$awards = "";
$payment = "";
$sanctions = "";
$req = "";
$clearance = "";

if($active == 1){
	$profile = "margin-left:5px;";

	}
else if($active == 2){
	$grades = "margin-left:5px;";

	}
else if($active == 3){
	$balance = "margin-left:5px;";

	}
else if($active == 4){
	$sched = "margin-left:5px;";

	}
else if($active == 5){
	$awards = "margin-left:5px;";

  }
else if($active == 6){
  $payment = "margin-left:5px;";

  }
else if($active == 6){
	$sanctions = "margin-left:5px;";

	}
else if($active == 7){
	$req = "margin-left:5px;";

	}
else if($active == 8){
  $clearance = "margin-left:5px;";

  }

?>

<html>
<head>
<title>SDCAPortal</title>
<style type="text/css">
a:hover, a:visited, a:link, a:active
{
    text-decoration: none !important;
}
.pagination{
	
	color:#666 !important;
	
	}
.navbar-inverse{
	
	background-image: ('<?php echo base_url() ?>Assets/img/navbar.png');
	
	}

body{
	background-size:cover;
	background-attachment: fixed;
	background-image: url(<?php echo base_url();?>Assets/img/BG.JPG);
	background-repeat: no-repeat;
	background-position:center left;
}

.label-info{
    background-color: #cc0000 !important;
}

.content-title{
	font-family: Verdana, Geneva, sans-serif;
	font-size:200%;
	color:#FFF;
	margin-top: 40px;
	margin-bottom: 50px;
	margin-left: 50px;
    opacity:1;
}
#title{
	width:40px; 
    height:40px; 
    padding-left:45px; 
    background-image:url(<?php echo base_url(); ?>Assets/img/miniLogo.png);
    background-position:center; background-repeat:no-repeat; 
    padding-bottom:50px; 
    margin-left:20px;

}
#pic{
max-width:100px;
max-height:100px;
}

::-webkit-scrollbar {
  width: 7px;
  height: 7px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: #666;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-thumb:hover {
  background: #666;
}
::-webkit-scrollbar-thumb:active {
  background: #666;
}
::-webkit-scrollbar-track {
  background: #333;
  border: 0px none #ffffff;
  border-radius: 0px;
}
::-webkit-scrollbar-track:hover {
  background: #333;
}
::-webkit-scrollbar-track:active {
  background: #333;
}
::-webkit-scrollbar-corner {
  background: transparent;
}
#notif{

position:fixed; 
margin-bottom:10px; 
bottom: 50px;
right:10px; 
z-index:50;
color:#FFF; 
padding-left:0px;
padding-right:30px;
padding-top:0px;
padding-bottom:0px;
border-radius:4px; 
height:100px;
border-radius:8px;
cursor:pointer;

}
@media only screen and (max-height: 800px) {

#notif{
top:50px;
right:5px; 
}

}
#messages{

max-height:150px;
min-width:200px;
overflow-y:auto;
padding:10px;

}

.msg{
padding:10px;
border-radius:4px;
margin:10px;
background-color:rgba(255,0,0,0.9);
}
.deptlogo{
width:250px; 
height:250px; 
padding:10px; 
border-radius:50%; 
box-shadow: 0 2px 2px 0 rgba(2, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.19);

  
}
.deptlogo:hover{

box-shadow: 0 4px 8px 0 rgba(2, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.glow {
text-decoration: none;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s;
  
  color: #fff;
  -webkit-animation: neon1 1.5s ease-in-out infinite alternate;
  -moz-animation: neon1 1.5s ease-in-out infinite alternate;
  animation: neon1 1.5s ease-in-out infinite alternate;
}

@-webkit-keyframes neon1 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #FF1177, 0 0 70px #FF1177, 0 0 80px #FF1177, 0 0 100px #FF1177, 0 0 150px #FF1177;
  }
  to {
    text-shadow: 0 0 5px #f00, 0 0 10px #f00, 0 0 15px #f00, 0 0 20px #f00, 0 0 35px #FF1177, 0 0 40px #FF1177, 0 0 50px #FF1177, 0 0 75px #FF1177;
  }
}

@-moz-keyframes neon1 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #FF1177, 0 0 70px #FF1177, 0 0 80px #FF1177, 0 0 100px #FF1177, 0 0 150px #FF1177;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #FF1177, 0 0 35px #FF1177, 0 0 40px #FF1177, 0 0 50px #FF1177, 0 0 75px #FF1177;
  }
}

.notifbell:hover{
text-decoration: none;
}
@media print {
  body * {
    visibility: hidden;
  }
  .divprint, .divprint * {
    visibility: visible;
  }
  .divprint {
    position: absolute;
    left: 0;
    top: 0;
    width:100%;
    height:100%;
    min-height:100%; 
    max-height:100%; 
    padding:0px;
 
  }
}
#ContentContainer{
	
	padding-bottom:15px;
	
	}


input[type=submit]{
  margin-left: 15px;
  background-color: transparent; 
  color: #fff;
  border: none;
  padding-bottom: 4px 15px;
  }
  
input[type=submit]:hover{
  color: #00FFFF;
 }

.boxhover{
  -webkit-transition: -webkit-box-shadow .25s;
    transition: -webkit-box-shadow .25s;
    transition: box-shadow .25s;
    transition: box-shadow .25s, -webkit-box-shadow .25s;
    border-radius: 2px;

   box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
}


</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='<?php echo base_url();?>Bootstrap/css/bootstrap.min.css'>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Sidebar.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/w3.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Styles.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Modal.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/fac_eval.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type=text/javascript src="https://wpp-test.wirecard.com/loader/paymentPage.js"></script>
    <script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>JS/Pace.js"></script>
    <script src="<?php echo base_url();?>JS/additem.js"></script>
    <script src="<?php echo base_url();?>C_editor/ckeditor.js"></script>
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js'></script>
    <link rel="shortcut icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png">
    <link rel="icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png" type="image/gif"> 
    
  

</head>


<body>

<script>
$(window).scroll(function(){
    $(".content-title").css("opacity", 1 - $(window).scrollTop() / 100);
  });
</script>

<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>

<nav class="navbar navbar-inverse affix" id="FontstyleNav" style="margin-bottom:0px; left:0px; width:100%; border-radius: 0px; z-index:50; border:0;">
        <div class="container-fluid">
        
        <!--logo--!-->
        <div class="navbar-header" style="color:#FFF">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <button type="button" class="navbar-toggle" id="menu-toggle">
        <i class="glyphicon glyphicon-user"></i> 
        </button>
        
        <div id="title" style="">
        <a href="<?php echo base_url();?>index.php/Student/profile" class="navbar-brand" id="menu-toggle" style="float:left">SDCAPortal</a>
        </div>
        
        </div>
        <!--logo--!-->
        
        <!--Navcontent--!-->
        <div class="collapse navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right" style="cursor:pointer;">
        	
            
            <!--Dropdowns--!-->
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Features <span class="caret"></span></a>
            <ul class="dropdown-menu navbar-inverse" id="FontstyleNav" style="font-size:16px;">
            
            <li><a href="<?php echo base_url();?>index.php/Student/event">What's New</a></li>
    	      <li><a href="<?php echo base_url();?>index.php/Student/Curriculum">Curriculum</a></li>
            
            <li><a href="<?php echo base_url();?>index.php/Student/resume_form">Resume Builder</a></li>
            <li><a href="<?php echo base_url();?>index.php/Student/Diary">My Diary</a></li>
            
            </ul>
            </li>
            <!--Dropdowns--!-->

             <!--Dropdowns--!-->
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Evaluation <span class="caret"></span></a>
            <ul class="dropdown-menu navbar-inverse" id="FontstyleNav" style="font-size:16px;">

            <li>
          
             
         
             <li>
                 <form method="post" action="User_Faculty_Eval"> 
                    <input name="" type="hidden" value="">
                    <input type="submit" value="Instructor Evaluation">
                 </form>
            </li>


            <li>
                 <form method="post" action="Customer_Satisfactory"> 
                    <input name="get_eval_assign_id" type="hidden" value="7">
                    <input name="instructor" type="hidden" value="">
                    <input type="submit" value="Customer Satisfaction">
                 </form>
            </li>




            <li>
                  <form method="post" action="Customer_Satisfactory"> 
                    <input name="get_eval_assign_id" type="hidden" value="8">
                    <input name="instructor" type="hidden" value="">
                    <input type="submit" value="RM2USIC4">
                  </form>
            </li>


            </ul>

            </li>
            <!--Dropdowns--!-->

            
            <li><a href="<?php echo base_url();?>index.php/Student/User_settings">Profile settings</a></li>
          	<li><a href="<?php echo base_url();?>index.php/Student/Logout">Logout</a></li> 
        </ul>
        </div>
        <!--Navcontent--!-->
        
      
       </div> 
</nav>
 <div style="height:50px"></div>
        

<div id="wrapper">

<!--Wrapper--!-->

<div id="sidebar-wrapper" ><!--Sidebar--!-->
<div id="sidebarfix" style="min-height:200px; overflow-y:auto;"><!--SIDEBARFIX--!-->

<div id="notif_bell">

</div>

<!--Picture--!-->
<?php 

$fileT = './Profile/';


?>
<div id="AccountThumbnail" class="img-thumbnail img-responsive" style="background-image: url(<?php echo base_url(); ?>Profile/<?php echo $picture; ?>?<?php //echo filemtime($fileT); ?>)">

<form action="<?php echo base_url();?>index.php/Student/user_settings" method="post">
<button id="changepic" class="glyphicon glyphicon-pencil" type="submit" />
</form>



</div>
<!--Picture--!-->	





<div style="font-family:Verdana, Geneva, sans-serif; color:#FFF;">
<h4 align="center" style="text-transform: capitalize;"><?php echo $First_Name." ".$Last_Name  ?></h4>
<span class="label label-info center-block">Student ID: <?php echo $Student_Number ?></span>
</div>
</br></br>
	
	<ul class="sidebar-nav" style="font-family: Verdana, Geneva, sans-serif;"><!--Sidebar nav--!-->
    
		<li><a style="<?php echo $profile; ?>" href="<?php echo base_url();?>index.php/Student/Profile" class="active"> Profile <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-user pull-right"></span></a></li>
        
		<li ><a style="<?php echo $grades; ?>" href="<?php echo base_url();?>index.php/Student/grades">Grades <span style="font-size:150%; margin-right:10px; margin-top:9px;;" class="glyphicon glyphicon-education pull-right"></span></a></li>

		<li ><a style="<?php echo $balance; ?>" href="<?php echo base_url();?>index.php/Student/balance">Balance <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-piggy-bank pull-right"></span></a></li>
        
    <li ><a style="<?php echo $sched; ?>" href="<?php echo base_url();?>index.php/Student/schedule">Schedule <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-dashboard pull-right"></span></a></li>
        
    <li ><a style="<?php echo $awards; ?>" href="<?php echo base_url();?>index.php/Student/awards">Awards <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-thumbs-up pull-right"></span></a></li>

    <li ><a style="<?php echo $payment; ?>" href="<?php echo base_url();?>index.php/Student/Payment">Payment <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-thumbs-up pull-right"></span></a></li>

    <li ><a style="<?php echo $clearance; ?>" href="<?php echo base_url();?>index.php/Student/Clearance">Clearance <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-ok-sign pull-right"></span></a></li>
        
    <li><a style="<?php echo $sanctions; ?>; display:none;" href="<?php echo base_url();?>index.php/Student/Sanctions">Violations <span style="font-size:150%; margin-right:10px; margin-top:9px;" class="glyphicon glyphicon-exclamation-sign pull-right"></span></a></li>

        
        

        
       
      
	</ul><!--Sidebar nav--!-->
  
    </br>
  
</div><!--SIDEBARFIX--!-->
</div><!--Sidebar--!-->


<!--Notif--!-->
<!--<div id="notif" onClick="shownotif()" style="height:10px;">

<div id="messages">
 
</div>

</div>
-->
<!--Notif--!-->

<script type="text/javascript" charset="utf-8">

</script>

<script type="text/javascript" charset="utf-8">
/*
    function notify(msg){
        $("#notif_bell").html(msg);
    }

    function checknotif(){
 
        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>index.php/Student/Notif_bell",

            async: true, 
            cache: false,
            timeout:50000, 

            success: function(data){ 
                notify(data);
                setTimeout(
                    checknotif, 
                    5000 
                );
            },
           
        });
    };

    $(document).ready(function(){
        checknotif(); 
    });
	*/
</script>
