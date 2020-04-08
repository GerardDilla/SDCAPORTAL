<?php 
foreach($result as $info){
		$Firstname = $info->Firstname;
		$Initial = $info->Initial;
		$Lastname = $info->Lastname;
		$Course = $info->Course;
		$Birth = $info->Birthday;
		$Address = $info->Address;
		$Email = $info->Email;
		$Contact = $info->Contact_number;
		$ID = $info->StudentID;
		} 
?>

<html>
<head>
<title>SDCAPortal</title>
<style type="text/css">
body{
	background-size:cover;
	background-attachment: fixed;
	background-image: url(<?php echo base_url();?>Assets/img/BG.jpg);
	background-repeat: no-repeat;
	background-position: center center;
}
.content-title{
	font-family: Verdana, Geneva, sans-serif;
	font-size:40;
	color:#FFF;
	margin-top: 40px;
	margin-bottom: 50px;
	margin-left: 50px;
}
</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='../../Bootstrap/css/bootstrap.min.css'>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Sidebar.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Styles.css">
    <script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
  

</head>


<body>


<nav class="navbar navbar-inverse" id="FontstyleNav" style="margin-bottom:0px; left:0px; width:100%; border-radius: 0px; z-index:50;">
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
        <a href="#" class="navbar-brand" id="menu-toggle">SDCAPortal</a>
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
            <li><a href"#">Event Calendar</a></li>
            <li><a href"#">School Forms</a></li>
            <li><a href"#">Helpdesk</a></li>
            </ul>
            </li>
            <!--Dropdowns--!-->
            
            <li><a href="Main">Profile settings</a></li>
          	<li><a href="Main">Logout</a></li>
        </ul>
        </div>
        <!--Navcontent--!-->
        
      
       </div> 
</nav>
 
        

<div id="wrapper">

<!--Wrapper--!-->

<div id="sidebar-wrapper"><!--Sidebar--!-->
<div id="sidebarfix"><!--SIDEBARFIX--!-->
<div id="AccountThumbnail" class="img-thumbnail img-responsive"></div>
<div style="font-family:Verdana, Geneva, sans-serif; color:#FFF;">
<h4 align="center"><?php echo $Firstname." ".$Initial.". ".$Lastname  ?></h4>
<span class="label label-info center-block">ID: <?php echo $ID ?></span>
</div>

	<ul class="sidebar-nav" style="font-family: Verdana, Geneva, sans-serif;"><!--Sidebar nav--!-->
    
		<li style="padding-top:30px"><a href="#" class="active">Profile<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-user pull-right"></span></a></li>
        
		<li><a href="#">Grades<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-education pull-right"></span></a></li>
        
		<li><a href="#">Balance<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-piggy-bank pull-right"></span></a></li>
        
        <li><a href="#">Schedule<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-dashboard pull-right"></span></a></li>
        
        <li><a href="#">Awards<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-thumbs-up pull-right"></span></a></li>
        
        <li style="padding-bottom:50px"><a href="#">Requirements<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-record pull-right"></span></a></li>
	</ul><!--Sidebar nav--!-->
    
</div><!--SIDEBARFIX--!-->
</div><!--Sidebar--!-->


<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
        <div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title" style="background-color:rgba(0,0,0,0.5);"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Profile</div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
  		
           <table class="table table-user-information" style="color:#666">
            <tbody>
            		  <tr>
                       <td>Firstname:</td>
                        <td><?php echo $Firstname; ?></td>
                      </tr>
                      
                      <tr>
                       <td>Initial:</td>
                        <td><?php echo $Initial; ?>.</td>
                      </tr>
                      
                      <tr>
                       <td>Lastname:</td>
                        <td><?php echo $Lastname; ?></td>
                      </tr>
                      
                      <tr>
                        <td>Course:</td>
                        <td><?php echo $Course; ?></td>
                      </tr>
                      
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $Birth; ?></td>
                      </tr>
                   
                       <tr>
                      <tr>
                        <td>Home Address</td>
                        <td><?php echo $Address; ?></td>
                      </tr>
                      
                      <tr>
                        <td>Email</td>
                        <td><?php echo $Email; ?></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td><?php echo $Contact; ?></td>
                        
                           
						   
                      </tr>
            </tbody>
            </table>
         
            <button class="btn btn-success center-block" style="margin:auto; margin-bottom:50px;">Download <span class="glyphicon glyphicon-floppy-save"></span></button>
          </div>
         
        </div><!--BODY--!-->
       
       <div class="col-md-12"><!--FOOTER--!-->
       
        <div class="row" style="background-color: rgba(0,0,0,0.5); color:#FFF; font-size:16; margin-top:auto; margin-bottom:auto; height:50px; line-height:50px; height:auto;">
  
        <span style="margin-left:20px; margin-top:20px; margin-bottom:20px;">Connect with us:</span>
        
        </div>
       
       </div><!--FOOTER--!-->
       
       
	</div>
</div>
</div><!--Content--!-->


</div>

<script>
$("#menu-toggle").click( function (e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
</script>

</body>



</html>
