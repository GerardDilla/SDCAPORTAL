
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




html, 
body, 
.carousel, 
.carousel-inner, 
.carousel-inner .item {
    height: 100%;
}

.item:nth-child(1) {
    
	opacity 0.5;
}

.item:nth-child(2) {
   
	opacity 0.5;
}

.item:nth-child(3) {
    
	opacity 0.5;
}
.links a:hover{
	text-decoration:none;
	color:#999;
	}
.links a:focus{
	text-decoration:none;
	color:#9F3;
	}
.filter{
	width:100%;
	height:100%;
	background-color:#000;
	position: absolute;
	top:0;
	opacity: 0.1;
	z-index:1;
	}	
#middle{

}
</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='<?php echo base_url();?>Assets/CSS/bootstrap.min.css'>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Sidebar.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Styles.css">
    <script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>

</head>


<body>
<div class="center-block" style="">
<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="font-size:24px">Login</button>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
      <?php 
		$aydee = $this->input->post('ID');
	  echo $aydee;
	  
	  ?>
        <form method="post" action="<?php echo site_url();?>index.php/register">
  				<label for="ID">Account Number:</label>
 				<input type="text" class="form-control" id="ID" name="ID" value="<?php echo set_value('ID'); ?>">
                <label for="Password">Password:</label>
 				<input type="password" class="form-control" id="Password" name="Password" value="<?php echo set_value('Password'); ?>">            
                <span style="color:#F00; font-size:14px;"><?php echo $error ?></span>
              
         
      </div>
      
      
      <div class="modal-footer">
         <button type="submit" class="btn btn-Success center-block" style="width:50%;">Login</button>
         </form>
        
        
      </div>
      
      
    </div>

  </div>
</div>

 

</body>



</html>

