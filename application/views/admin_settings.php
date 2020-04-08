
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-cog"></span> Settings</div>
          
</div><!--HEADER--!-->
        
<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
  		
        
		<h3 style="color::#666"><!--Message--!-->
        <?php 
		$msg = $this->session->userdata('a_pw_msg');
		echo $msg;
		$this->session->unset_userdata('a_pw_msg');
		?>
        </h3>
        
        
<div class="panel-group" id="accordion"><!--accordion1--!-->
<div class="panel panel-default" ><!--panel1--!-->
<div class="panel-heading" style="background-color:#666; color:#FFF;">
	<h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Change Password</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><!--CONTENT--!-->
        
        <form action="<?php echo base_url(); ?>index.php/administrator/change_PW" method="post" class="form-group">
        <label for="a_currentPW">Current Password: </label>
        <input name="a_currentPW" value="<?php echo set_value('a_currentPW'); ?>" type="password" id="a_currentPW" class="form-control" /></br>
       
        <label for="a_newPW">New Password: </label>
        <input name="a_newPW" value="<?php echo set_value('a_newPW'); ?>" type="password" id="a_newPW" class="form-control" /></br>
        
        <label for="a_checkPW">Retype New Password: </label>
        <input name="a_checkPW" value="<?php echo set_value('a_checkPW'); ?>" type="password" id="a_checkPW" class="form-control" /></br>

		<input " id="submitPW" type="submit" style="cursor:pointer" name="submitPW" class="btn btn-success center-block" />
        </form>
        
</div><!--CONTENT--!-->
</div>
</div><!--panel1--!-->
    
    
    
        
</div><!--CONTENT--!-->
</div>
</div><!--panel3--!-->
</div><!--accordion--!-->
            
            
</div>
         
</div><!--BODY--!-->
        
 