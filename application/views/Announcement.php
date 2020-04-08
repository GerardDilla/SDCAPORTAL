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
    <script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>JS/Pace.js"></script>
    <script src="<?php echo base_url();?>JS/additem.js"></script>
    <script src="<?php echo base_url();?>C_editor/ckeditor.js"></script>
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js'></script>
    <link rel="shortcut icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png">
    <link rel="icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png" type="image/gif"> 
  

</head>


<body>
<!--HEADER-->
<div class="container" style="text-align:center; background-color:rgba(0,0,0,0.5)">
<img src="<?php echo base_url(); ?>Assets/img/Portal_side.png" width="50%" />
</div>
<!--//HEADER-->
<div class="container" style=" background-color:#fff; padding:50px">
<?php if($announcement_content->num_rows() != 0): ?>
<?php foreach($announcement_content->result_array() as $row): ?>
<h1 style="color:#cc0000"><?php echo $row['Event_Name']; ?></h1><p><?php echo date("d/m/Y", strtotime($row['Date'])); ?></p>
<hr>

<?php echo $row['Description']; ?>

<?php endForeach; ?>
<?php else:?>
<h1>
An Error Occured, Can't Access the Content.
</h1>
<?php endIf;?>
</div>


       

</body>

</html>