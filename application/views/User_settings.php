<?php
$picmsg = $this->session->userdata('pic_msg');
if($show == 1)
{
	$modal = "show";
}
else{
	$modal = "hide";
	}


?>
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
        <div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-cog"></span> Settings</div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
  		

   <span style="color:#F00"> <?php echo $picmsg; ?></span></br>
   <?php $this->session->unset_userdata('pic_msg'); ?>
     
   <div class="panel-group" id="accordion" style="min-width:250px;"><!--accordion1--!-->
    <div class="panel panel-default" ><!--panel1--!-->
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
      <div class="panel-heading" style="background-color:#666; color:#FFF;">
        <h4 class="panel-title">
          Change Password
        </h4>
      </div>
      </a>
      <div id="collapse1" class="<?php echo $P_on; ?>">
        <div class="panel-body"><!--CONTENT--!-->
        
        <form action="User_settings" method="post" class="form-group" id="reset_pass_form">
        <label for="currentPW">Current Password: </label>
        <input name="currentPW" value="<?php echo set_value('currentPW'); ?>" type="password" id="currentPW" class="form-control" /></br>
        
       <label for="newPW">New Password: </label>
        <input name="newPW" value="<?php echo set_value('newPW'); ?>" type="password" id="newPW" class="form-control" /></br>
        
        <label for="checkPW">Retype New Password: </label>
        <input name="checkPW" value="<?php echo set_value('checkPW'); ?>" type="password" id="checkPW" class="form-control" /></br>
<span style="color:#F00"> <?php echo $PW; ?></span>
		<input id="submitPW" type="submit" style="cursor:pointer" name="submitPW" class="btn btn-success center-block" />
        </form>
        
        </div><!--CONTENT--!-->
      </div>
    </div><!--panel1--!-->
    
    
    
    
    <div class="panel panel-default" style="display:none"><!--panel2--!-->
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
      <div class="panel-heading" style="background-color:#666; color:#FFF;">
        <h4 class="panel-title">
          Change Email
        </h4>
      </div>
      </a>
      <div id="collapse2" class="<?php echo $E_on; ?>">
        <div class="panel-body"><!--CONTENT--!-->
        
       <form action="email_change" method="post" class="form-group">
        <label for="currentPW">Password: </label>
        <input name="PW" value="<?php echo set_value('PW'); ?>" type="password" id="currentPW" class="form-control" /></br>
       
       <label for="newE">New Email: </label>
        <input name="newE" value="<?php echo set_value('newE'); ?>" type="text" id="newE" class="form-control" /></br>
        
        <label for="checkE">Retype New Email: </label>
        <input name="checkE" value="<?php echo set_value('checkE'); ?>" type="text" id="checkE" class="form-control" /></br>
<span style="color:#F00"> <?php echo $E; ?></span>
		<input id="submitPW" type="submit" style="cursor:pointer" name="submitPW" class="btn btn-success center-block" />
        
        </form>
        </div><!--CONTENT--!-->
      </div>
    </div><!--panel2--!-->
    
    
    
<div class="panel panel-default"><!--panel3--!-->
	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
      <div class="panel-heading" style="background-color:#666; color:#FFF;">
        <h4 class="panel-title">
          Change Picture
        </h4>
      </div>
      </a>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><!--CONTENT--!-->
        
<div style="top:0 ;width:100%; height:150px; color:#FFF; background-color:#000; padding:7px; border-radius:1%;">
Profile picture:
<ul>
<li>Supported formats: jpg,png</li>
<li>File size should be no more than 10mb</li>
</ul>

</div> 
</br>   
<?php echo form_open_multipart('index.php/Student/changepic');?>

<label class="btn btn-success" for="my-file-selector">
    <input id="my-file-selector" name="userfile" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
   Browse
</label>
<span class='label label-info' id="upload-file-info"></span>
</br>
</br>

<input class="btn btn-success" type="submit" name="submit" value="upload image"  />
</form>

 
   
        </div><!--CONTENT--!-->
      </div>
    </div><!--panel3--!-->
    
    
  </div><!--accordion--!-->
 

 
          </div>
         
        </div><!--BODY--!-->
        
 
 
<script>
    $(document).ready(function(){
        $("#myModal").modal('<?php echo $modal; ?>');
    });
</script>

<script>
$(document).ready(function () {

    $('#reset_pass_form').validate({ // initialize the plugin
        rules: {
            currentPW: {
                required: true
            },
			newPW: {
                required: true,
				minlength:8
            },
			checkPW: {
                required: true,
				minlength:8,
				equalTo: "#newPW"
				
            }
        },
       
    });

});
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="margin-top:50px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="login" style="display:block">

      
      <div class="modal-body">
         
                <span style="color:#F00; font-size:14px;"><?php echo $error ?></span>
             
         
      </div>
      
  
    </div>

</div> 
 </div>

 <!-- Modal -->  