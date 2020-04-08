
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Admin Registration</div>
          
</div><!--HEADER--!-->
        
<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:300px; overflow-y:auto;">
			
            
			<?php
			
			$msg = $this->session->userdata('reg_msg');
			echo $msg;
			$this->session->unset_userdata('reg_msg');
			?>
           
            
            <div class="form-group" style="margin-top:30px;">
            <form method="post" action="admin_register">
  				<label for="fname_A">Name:</label></br>
 				<input class="inline" type="text" class="form-control" id="fname_A" name="fname_A" placeholder=" First Name">
             
 				<input class="inline" type="text" class="form-control" name="mname_A"  placeholder=" Middle Name">
               
 				<input class="inline" type="text" class="form-control" name="lname_A"  placeholder=" Middle Name">
				</br></br>
                
                <label for="course">Password:</label></br>
 				<input class="inline" type="password" class="form-control" id="course" name="pass1" placeholder=" Password">
                <input class="inline" type="password" class="form-control" id="course" name="pass2" placeholder=" Retype Password">
                 </br></br>
                 
                <label for="course">Admin Type:</label></br>
                <div class="radio">
    			  <label><input type="radio" name="type" value="sup">Super Admin</label>
   			    </div>
 			    <div class="radio">
     				 <label><input type="radio" name="type" value="mod">Moderator</label>
   			    </div>
                
                 
                 
          <button class="btn btn-info" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Submit</button>
        
            </form>
            <?php 
			
			$fname_A = $this->input->post('fname_A');
			$mname_A = $this->input->post('mname_A');
			$lname_A = $this->input->post('lname_A');
			$pass1 = $this->input->post('pass1');
			$pass2 = $this->input->post('pass2');
			$type = $this->input->post('type');
	
			
			echo $fname_A." ".$mname_A." ".$lname_A." ".$pass1." ".$pass2." ".$type;
			
			?>
			</div>
            
         
</div>
</div><!--BODY--!-->
