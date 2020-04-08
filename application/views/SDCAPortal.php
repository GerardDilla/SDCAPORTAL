
<html>
<title>SDCAPortal</title>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Dropdown.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Styles1.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Modal.css">
<script type="text/javascript" src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>JS/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>JS/Modal.js"></script>

<script type="text/javascript">
function delay(){
	setTimeout(Slider,5000);
	}
</script>
<script type="text/javascript" src="<?php echo base_url();?>JS/Imageslider.js"></script>





<body onLoad="delay();","Slider();" style="margin:auto;" style="width:1367px">



<div id="wrapper">
<div id="Menu">
<div id="Minlogo"><a href="index.php"></a></div>
<div id="Features" class="loginaccess">
<div id="Drop"><div id="Table">
<ul>
  <div class="Dropslide">
  <li> <a href="#">Features</a>
  <ul>
  <li><a href="#">Event Calendar</a></li>
  <li><a href="#">Curriculum</a></li>
  <li><a href="#">Class Schedule</a></li>
  <li><a href="#">Scholarship Form</a></li> 
  </ul>
  </li></div>
</ul>

</div><!--Table-->
</div><!--Drop-->
</div><!--Features-->

<div id="Profile">
<div id="Drop"><div id="Table">
<ul>
  <div class="Dropslide">
  <li> <a href="#">Profile</a>
  <ul>
  <li><a href="">Grades</a></li>
  <li><a href="#">Balance</a></li>
  <li><a href="#">Achievements</a></li>
  <li><a href="#">Requirements</a></li> 
  </ul>
  </li></div>
</ul>

</div><!--Table-->
</div><!--Drop-->
</div><!--Profile--> 
<div id="Homefont"><a href="Main">SDCA Portal</a></div>
</div><!--Menu-->
<div class="slider">
  <img id="1" src="<?php echo base_url();?>Assets/img/pic1.png" alt="1"/>
  <img id="2" src="<?php echo base_url();?>Assets/img/pic2.png"/>
  <img id="3" src="<?php echo base_url();?>Assets/img/pic3.png" border="0" alt="3"/>
  
</div>
<div id="shadow"></div>
<div class="directory" id="About" onClick="scroll1();" onMouseOut="out1();" onMouseOver="document.getElementById('ban1').style.height='100px';" style="cursor:pointer">About</div>
<div class="directory" id="Features2" onClick="scroll2();" onMouseOut="out2();" onMouseOver="document.getElementById('ban2').style.height='100px';" style="cursor:pointer">Features</div>
<div class="directory" id="Connect" onClick="scroll1();" onMouseOut="out3();" onMouseOver="document.getElementById('ban3').style.height='100px';" style="cursor:pointer">Be Connected</div>
<div class="directory" id="GetStarted" onMouseOut="out4();" onMouseOver="document.getElementById('ban4').style.height='100px';" style="cursor:pointer"" onclick="modalshow();">Get Started</div>

<script>
function scroll1(){window.scrollTo(0,500);}
function scroll2(){window.scrollTo(0,1060);}
</script>
<script>
function out1(){ 
document.getElementById('ban1').style.height='70px';
}
function out2(){ 
document.getElementById('ban2').style.height='70px';
}
function out3(){ 
document.getElementById('ban3').style.height='70px';
}
function out4(){ 
document.getElementById('ban4').style.height='70px';
}
</script>
<div class="redbanner" id="ban1"></div>
<div class="redbanner" id="ban2"></div>
<div class="redbanner" id="ban3"></div>
<div class="redbanner" id="ban4"></div>

<div id="Bodycontainer">
<div id="directorybar"></div>
<div id="AbtBox">
<div class="titlefont" id="welcomebox">Welcome!</div>
<div class="contentfont" id="aboutcontent">St. Dominic College of Asia Student Portal offers convenience to students by providing a variety of features that can help them with any concerns regarding the campus and their studies.</div>
<div id="abtlogo"></div>
</div>
<div id="FeatBox">
<div class="titlefont" id="FeatureText">Features</div>
<div id="CScont">
<div id="ClassSchedlogo"></div>
<div id="CStitle">Class Schedule</div>
<div class="contentfont" id="SchedText">
  <p>This feature will allow students to view currently enrolled subjects, complete with their date, time and room.</p>
</div>
</div>
</div>
</div>

<div id="loginmodal" class="modal">
<div class="modalcont">
<span class="close">x</span>
<div id="loginlogo"><br /><br /><img src="<?php echo base_url();?>Assets/img/SoloLogo.png" align="left" /></div>
<div class="logintext">

<form action="<?php echo site_url();?>index.php/welcome/login" method="POST">
Student ID: <br /> <br /><input name="ID" value="<?php echo set_value('ID'); ?>" type="text" maxlength="8" class="formfontbox" /><br /><br />
Password: <br /><br /><input name="Password" value="<?php echo set_value('Password'); ?>" type="password" maxlength="50" class="formfontbox"/><br />
<script>
var modal = document.getElementById('loginmodal');
var span = document.getElementsByClassName("close")[0];
var pass = "<?php echo $pass ?>"
if(pass != 1)
{
	
	modal.style.display="block";
	
	span.onclick = function() {
modal.style.display = "none";	
}
}

</script>
<span style="color:#FFF; font-size:16px;"><?php echo $error ?></span><br/><br/>
<input " id="loginbtn" type="submit" style="cursor:pointer" name="loginBtn" value="Login"/>
</form>

</div>
</div>
</div>



</body>


</html>
