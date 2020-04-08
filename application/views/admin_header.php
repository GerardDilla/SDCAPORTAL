<?php 

$Name = $this->session->userdata('Name');
$ID = $this->session->userdata('ID');
$Moderator = $this->session->userdata('Moderator');
$Professor = $this->session->userdata('Professor');
$Super_Admin = $this->session->userdata('Super_Admin');
$A_First_Name = $this->session->userdata('A_First_Name');
$A_Middle_Name = $this->session->userdata('A_Middle_Name');
$A_Last_Name = $this->session->userdata('A_Last_Name');
$admin_sidenav = $this->session->userdata('admin_sidenav');



?>

<html>
<head>
<title>SDCAPortal</title>
<style type="text/css">
.pagination{
	
	color:#666 !important;
	
	}
body{
	background-size:cover;
	background-attachment: fixed;
	background-image: url(<?php echo base_url();?>Assets/img/BG.JPG);
	background-repeat: no-repeat;
	background-position: center center;
}
.label-info {
    background-color: #cc0000 !important;
}
.content-title{
	font-family: Verdana, Geneva, sans-serif;
	font-size:40;
	color:#FFF;
	margin-top: 40px;
	margin-bottom: 50px;
	margin-left: 50px;
	opacity:1;
}
#pagination{
	color:#00F;
	margin-left:1px;
	letter-spacing:5px;
	}
#list_table{
	font-size:14px;
	
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
  background: #cc0000;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-thumb:hover {
  background: #cc0000;
}
::-webkit-scrollbar-thumb:active {
  background: #408080;
}
::-webkit-scrollbar-track {
  background: #ffcccc;
  border: 0px none #ffffff;
  border-radius: 0px;
}
::-webkit-scrollbar-track:hover {
  background: #cc0000;
}
::-webkit-scrollbar-track:active {
  background: #cc0000;
}
::-webkit-scrollbar-corner {
  background: transparent;
}
#accountpic{
	
	max-width:100px;
	max-height:100px;
	min-width:100px;
	min-height:100px;
	text-align: center;
	display: block;
	margin-top: 50px;
	margin-bottom: 30px;
	border: 3px solid #ddd;
	margin-right: auto;
	margin-left: auto;
	background-position:center; 
	background-repeat:no-repeat; 
	opacity: 1; 
	background-size:cover;
}

.student_search input[type="submit"] {
   background-color: transparent;
    border: 0px solid;
    height: 30px;
    width: 160px;
    color: #fff;
    margin-left: 20px;
    text-align: left;
  
}

.student_search:hover{
  background-color: #cc0000;
  height: 40px;

}


</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='<?php echo base_url();?>Bootstrap/css/bootstrap.min.css'>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/w3.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Sidebar.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Styles.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Modal.css">
<link rel="icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png" type="image/gif">
    <script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>JS/Pace.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png">
    
  

</head>


<body>
<script>
$(window).scroll(function(){
    $(".content-title").css("opacity", 1 - $(window).scrollTop() / 100);
  });
</script>

<!--Loading bar--!-->
<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
<!--Loading bar--!-->


<!--Navbar--!-->
<nav class="navbar navbar-inverse affix" id="FontstyleNav" style="margin-bottom:0px; left:0px; width:100%; border-radius: 0px; z-index:50;">
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
        <a href="#" class="navbar-brand" id="menu-toggle">SDCAPortal Admin</a>
        </div>
        <!--logo--!-->
        
        <!--Navcontent--!-->
        <div class="collapse navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right" style="cursor:pointer;">
        	
            
            <!--Dropdowns--!-->
           
            <!--Dropdowns--!-->
            
            <li><a href="admin_settings">Change Password</a></li>
          	<li><a href="<?php echo site_url(); ?>index.php/Administrator/Logout">Logout</a></li> 
        </ul>
        </div>
        <!--Navcontent--!-->
        
      
       </div> 
</nav>
<!--Navbar--!-->


<div style="height:50px"></div>
        

<div id="wrapper">

<!--Wrapper--!-->

<div id="sidebar-wrapper"><!--Sidebar--!-->
<div id="sidebarfix"><!--SIDEBARFIX--!-->

<div id="AccountThumbnail" class="img-thumbnail img-responsive" style="background-image: url(<?php echo base_url(); ?>Profile/Admin.png);"></div>

<div style="font-family:Verdana, Geneva, sans-serif; color:#FFF;">
<h4 align="center"><?php echo $A_First_Name." ".$A_Last_Name;  ?></h4>
<span class="label label-info center-block">ID: <?php echo $ID ?></span>
</div>

</br>



	<ul class="sidebar-nav" style="font-family: Verdana, Geneva, sans-serif;"><!--Sidebar nav--!-->
    
		<?php echo $admin_sidenav; ?>
        

        
	</ul><!--Sidebar nav--!-->

</div><!--SIDEBARFIX--!-->
</div><!--Sidebar--!-->




