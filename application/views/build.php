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
#proceed:hover {
	text-decoration:none;
	color:#FFF;
	
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


<nav class="navbar navbar-inverse affix" id="FontstyleNav" style="margin-bottom:0px; left:0px; width:100%; border-radius: 0px; z-index:50;">
        <div class="container-fluid">
        
        <!--logo--!-->
        <div class="navbar-header" style="color:#FFF; margin-bottom:15px;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand" id="menu-toggle" style="font-family:Verdana, Geneva, sans-serif; margin-bottom:6px; margin-left:50px;"><span><img src="<?php echo base_url();?>Assets/img/miniLogo.png" width="40" height="40" style="margin-bottom:5px" /></span>  SDCAPortal</a>
        </div>
        <!--logo--!-->
        
        <!--Navcontent--!-->
        <div class="collapse navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right" style="cursor:pointer; margin-top:5px;">
          	<li style="margin-right:100px; font-family:Verdana, Geneva, sans-serif; font-size:18px; margin-top:auto; margin-bottom:auto;"><a href="#"><button class="btn btn-success">Login</button></a></li> 
        </ul>
        </div>
        <!--Navcontent--!-->
        
      
       </div> 
</nav>
 <!--carousel--!-->
 
 <div style="width:100%">
 
 <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100%">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    	>
       <img class="center-block img-responsive" style="margin-top:15%; width:250; height:250;" src="<?php echo base_url();?>Assets/img/SoloLogo.png" alt="Chania">
    </div>

    <div class="item">
      <img class="center-block" src="<?php echo base_url();?>Assets/img/pic2.png" alt="Chania">
    </div>

    <div class="item">
       <img class="center-block" src="<?php echo base_url();?>Assets/img/pic3.png" alt="Flower">
    </div>

    <div class="item">
       <img class="center-block" src="<?php echo base_url();?>Assets/img/pic2.png" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <div class="container-fluid text-center" style="color:#FFF; font-size:24px; z-index:50; margin-top:5%;">
<div style="background-color:#2C3E50; opacity: 0.9;"><span>Welcome</span></div></br>
  <button class="btn btn-success"><a id="proceed" style="font-size:24px" href="#" class="center-block">Enter Portal</a></button>
  </div>
</div>

</div>     

 <!--carousel--!-->


</body>



</html>

