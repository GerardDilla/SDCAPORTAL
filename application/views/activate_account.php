<html>
<head>
<title>SDCAPortal</title>
<style type="text/css">
meter {
	/* Reset the default appearance */
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	margin: 0 auto 1em;
	width: 100%;
	height: 0.5em;
	/* Applicable only to Firefox */
	background: none;
	background-color: rgba(0, 0, 0, 0.1);
}
 meter::-webkit-meter-bar {
 background: none;
 background-color: rgba(0, 0, 0, 0.1);
}
.error {
    color:red;
}
/* Webkit based browsers */
meter[value="1"]::-webkit-meter-optimum-value {
background: red;
}
meter[value="2"]::-webkit-meter-optimum-value {
background: yellow;
}
meter[value="3"]::-webkit-meter-optimum-value {
background: orange;
}
meter[value="4"]::-webkit-meter-optimum-value {
background: green;
}

/* Gecko based browsers */
meter[value="1"]::-moz-meter-bar {
background: red;
}
meter[value="2"]::-moz-meter-bar {
background: yellow;
}
meter[value="3"]::-moz-meter-bar {
background: orange;
}
meter[value="4"]::-moz-meter-bar {
background: green;
}
#proceed:hover {
	text-decoration: none;
	color: #FFF;
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
 background: #408080;
 border: 0px none #ffffff;
 border-radius: 50px;
}
::-webkit-scrollbar-thumb:hover {
 background: #408080;
}
::-webkit-scrollbar-thumb:active {
 background: #408080;
}
::-webkit-scrollbar-track {
 background: #80ffff;
 border: 0px none #ffffff;
 border-radius: 0px;
}
::-webkit-scrollbar-track:hover {
 background: #80ffff;
}
::-webkit-scrollbar-track:active {
 background: #80ffff;
}
::-webkit-scrollbar-corner {
 background: transparent;
}
#resetcont {
	-webkit-box-shadow: 0px 3px 42px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 3px 42px 0px rgba(0,0,0,0.75);
	box-shadow: 0px 3px 42px 0px rgba(0,0,0,0.75);
}
a {
	color: #666;
	font-size: 36px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
body {
 background-image: url(<?php echo base_url();
?>Assets/img/altbg.jpg);
	background-position: center;
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-size: cover;
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
<link rel="icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png" type="image/gif">
<script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
<script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>JS/Pace.js"></script>
<script src="<?php echo base_url();?>JS/additem.js"></script>
<script src="<?php echo base_url();?>C_editor/ckeditor.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js'></script>
</head>
<script>

function scaleCaptcha(elementWidth) {
  // Width of the reCAPTCHA element, in pixels
  var reCaptchaWidth = 304;
  // Get the containing element's width
	var containerWidth = $('.container').width();
  
  // Only scale the reCAPTCHA if it won't fit
  // inside the container
  if(reCaptchaWidth > containerWidth) {
    // Calculate the scale
    var captchaScale = containerWidth / reCaptchaWidth;
    // Apply the transformation
    $('.g-recaptcha').css({
      'transform':'scale('+captchaScale+')'
    });
  }
}

$(function() { 
 
  // Initialize scaling
  scaleCaptcha();
  
  // Update scaling on window resize
  // Uses jQuery throttle plugin to limit strain on the browser
  $(window).resize( $.throttle( 100, scaleCaptcha ) );
  
});

</script>

<body>
<a href="<?php echo base_url(); ?>index.php/Student"><span style="font-size:50%; color:#fff; position:absolute; top:2%; right:2%;" class="glyphicon glyphicon-home"></span></a>
<div class="container" >
  <div class="row">
    <div class="col-md-12" style="padding:50px;">
      <h1 style="color:#fff; font-size:200%;"><span style="font-size:100%; margin-right:10px; margin-top:9px;;" class="glyphicon glyphicon-user"></span>Activate Account</h1>
    </div>
    <div id="resetcont" class="col-md-12" style="background-color:#fff; border-radius:4px; padding:50px; padding-top:70px; "> 
        
      <?php
			
			 echo $Form;
			
			
			?>
    </div>
  </div>
</div>
</body>
<script>
$(document).ready(function () {

    $('#regform').validate({ // initialize the plugin
        rules: {
            act_sn: {
                required: true
            },
			Or_number: {
                required: true
            },
			act_pass1: {
                required: true,
				minlength:8
            },
			act_pass2: {
                required: true,
				minlength:8,
				equalTo: "#act_pass1"
				
            }
        },
       
    });

});
</script>
</html>
