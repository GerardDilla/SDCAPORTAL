<?php 

$First_Name = $this->session->userdata('First_Name');
$Middle_Name = $this->session->userdata('Middle_Name');
$Last_Name = $this->session->userdata('Last_Name');
$Course = $this->session->userdata('Course');
$YearLevel = $this->session->userdata('YearLevel');
$Address_No = $this->session->userdata('Address_No');
$Address_Street = $this->session->userdata('Address_Street');
$Address_Subdivision = $this->session->userdata('Address_Subdivision');
$Address_Barangay = $this->session->userdata('Address_Barangay');
$Address_City = $this->session->userdata('Address_City');
$Address_Province = $this->session->userdata('Address_Province');
$Email = $this->session->userdata('Email');
$Cp_No = $this->session->userdata('Cp_No');
$Tel_No = $this->session->userdata('Tel_No');
$Student_Number = $this->session->userdata('Student_Number');
$Reference_Number = $this->session->userdata('Reference_Number');
$logged_in = $this->session->userdata('logged_in');
$picture = $this->session->userdata('picture');


$sql2 = "SELECT * FROM Student_Info WHERE Student_Number = '$Student_Number' LIMIT 1";
$result2 = $this->db->query($sql2);
if($result2->num_rows() == 1){
	
$row2 = $result2->row();

$BD = $row2->Birth_Date;
$BP = $row2->Birth_Place;
$nat = $row2->Nationality;

}else{
	
$BD = " ";
$BP = " ";
$nat = " ";
	
	}
		
?>
<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
  <div class="row" style="margin-top:auto; margin-bottom:auto;">
    <div class="col-md-12"><!--HEADER--!-->
      
      <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Resume Builder</div>
    </div>
    <!--HEADER--!-->
    
    <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
      
      <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; max-height:auto; overflow-y:scroll;">
        <h5 style="color:#666"> Fill up the form first: </h5>
        </br>
        <div class="row">
        <form action="resume_display" method="post" target="_blank">
          </br>
          <div class="col-md-12" style="border-style:solid; border-width:thin; padding:15px; border-color:#CCC;"><!--Basic info--!-->
            <h3 style="color:#666">Basic Information</h3>
            </br>
            <h4 style="color:#666">Picture</h4>
            <img style="width:192px; height:192px; border-radius:4px;" id="img_resume" src="<?php echo base_url()."Profile/".$picture; ?>" alt="your image" />
            <label class="label label-info" style="font-size:14px">Go to <a style="color:#FF0" href="user_settings">account settings</a> to change picture</label>
            </br>
            </br>
            <h4 style="color:#666">Address:</h4>
            <!--Address--!-->
            <input style="padding-left:10px;" type="text" name="blk" placeholder="Address Number" value="<?php echo $Address_No; ?>">
            <input style="padding-left:10px;" type="text" name="street" placeholder="Street" value="<?php echo $Address_Street; ?>">
            <input style="padding-left:10px;" type="text" name="subd" placeholder="Subdivision" value="<?php echo $Address_Subdivision; ?>">
            </br>
            </br>
            <input style="padding-left:10px;" type="text" name="brng" placeholder="Barangay" value="<?php echo $Address_Barangay; ?>">
            <input style="padding-left:10px;" type="text" name="city" placeholder="City" value="<?php echo $Address_City; ?>">
            <input style="padding-left:10px;" type="text" name="prov" placeholder="Province" value="<?php echo $Address_Province; ?>">
            </br>
            <!--Address--!-->
            
            <h4 style="color:#666">Contact:</h4>
            <!--contact--!-->
            <input style="padding-left:10px;" type="text" name="cell" placeholder="Cellphone number" value="<?php echo $Cp_No; ?>">
            <input style="padding-left:10px;" type="text" name="tel" placeholder="Telephone number" value="<?php echo $Tel_No; ?>">
            <input style="padding-left:10px;" type="text" name="email" placeholder="Email" value="<?php echo $Email; ?>">
            </br>
            <!--contact--!--> 
            
          </div>
          <!--Basic info--!--> 
          
          </br>
          </br>
          <div class="col-md-12" style="border-style:solid; border-width:thin; padding:15px; border-color:#CCC;"><!--Personal info--!-->
            <h3 style="color:#666">Personal Information</h3>
            </br>
            <input style="padding-left:10px;" type="text" name="nickname" placeholder="Nickname" value="">
            <input style="padding-left:10px;" type="date" name="birthdate" placeholder="Birth date y:m:d" value="<?php echo $BD; ?>">
            <input style="padding-left:10px;" type="text" name="birthplace" placeholder="Birth place" value="<?php echo $BP; ?>">
            </br>
            </br>
            <input style="padding-left:10px;" type="text" name="age" placeholder="Age" value="">
            <input style="padding-left:10px;" type="text" name="height" placeholder="Height" value="">
            <input style="padding-left:10px;" type="text" name="Weight" placeholder="Weight" value="">
            </br>
            </br>
            <input style="padding-left:10px;" type="text" name="nationality" placeholder="nationality" value="<?php echo $nat; ?>">
            <input style="padding-left:10px;" type="text" name="Religion" placeholder="Religion" value="">
            <input style="padding-left:10px;" type="text" name="civilstat" placeholder="Civil Status" value="">
            </br>
            </br>
            <input style="padding-left:10px;" type="text" name="father" placeholder="Father’s Name" value="">
            <input style="padding-left:10px;" type="text" name="occ1" placeholder="Occupation" value="">
            </br>
            </br>
            <input style="padding-left:10px;" type="text" name="mother" placeholder="Mother’s Name" value="">
            <input style="padding-left:10px;" type="text" name="occ2" placeholder="Occupation" value="">
            </br>
            </br>
          </div>
          <!--Personal info--!--> 
          
          </br>
          </br>
          <div class="col-md-12" style="border-style:solid; border-width:thin; padding:15px; border-color:#CCC;"><!--Objectives--!-->
            <h3 style="color:#666">Objectives</h3>
            </br>
            <span class="btn btn-info glyphicon glyphicon-plus" onclick="addRow()"></span>
            <div id="content" style="padding:20px;"> </div>
            <?php 
				
				$try = $this->input->post('obj1');
				
				echo $try;
				
				?>
            <script>
				
				var obj = document.getElementsByClassName('obj');
					
                </script> 
          </div>
          <!--Objectives--!--> 
          
          </br>
          </br>
          <div class="col-md-12" style="border-style:solid; border-width:thin; padding:15px; border-color:#CCC;"><!--Educ--!-->
            <h3 style="color:#666">Educational Background</h3>
            </br>
            <h4 style="color:#666">Tertiary:</h4>
            <input style="padding-left:10px;" type="text" name="T_school" placeholder="School name" value="">
            <input style="padding-left:10px;" type="text" name="T_year" placeholder="Year" value="">
            </br>
            </br>
            <input style="padding-left:10px;" type="text" name="T_address" placeholder="Address" value="">
            <input style="padding-left:10px;" type="text" name="Course" placeholder="Course" value="">
            </br>
            </br>
            <h4 style="color:#666">Secondary:</h4>
            <input style="padding-left:10px;" type="text" name="S_school" placeholder="School name" value="">
            <input style="padding-left:10px;" type="text" name="S_year" placeholder="Year" value="">
            <input style="padding-left:10px;" type="text" name="S_Address" placeholder="Address" value="">
            </br>
            </br>
            <h4 style="color:#666">Primary:</h4>
            <input style="padding-left:10px;" type="text" name="P_school" placeholder="School name" value="">
            <input style="padding-left:10px;" type="text" name="P_year" placeholder="Year" value="">
            <input style="padding-left:10px;" type="text" name="P_Address" placeholder="Address" value="">
            </br>
            </br>
          </div>
          <!--Educ--!--> 
          
          </br>
          </br>
          <div class="col-md-12" style="border-style:solid; border-width:thin; padding:15px; border-color:#CCC;"><!--Achievements--!-->
            
            <h3 style="color:#666">Achievements</h3>
            <span class="btn btn-info" style="float:right" onclick="award()">Awards list</span> </br>
            <h4 style="color:#666">Seminars:</h4>
            <span class="btn btn-info glyphicon glyphicon-plus" onclick="S_addRow()"></span>
            <div id="Seminars" style="padding:20px;"> </div>
            <h4 style="color:#666">Certificates:</h4>
            <span class="btn btn-info glyphicon glyphicon-plus" onclick="C_addRow()"></span>
            <div id="Certificates" style="padding:20px;"> </div>
          </div>
          <!--Achievements--!--> 
          
          </br>
          </br>
          <div class="col-md-12" style="border-style:solid; border-width:thin; padding:15px; border-color:#CCC;"><!--Skills--!-->
            <h3 style="color:#666">Skills</h3>
            </br>
            <span class="btn btn-info glyphicon glyphicon-plus" onclick="addSkill()"></span>
            <div id="skill" style="padding:20px;"> </div>
          </div>
          </div>
          <!--Skills--!--> 
          
          </br>
          </br>
          </br>
          <button class="btn btn-success center-block" style="margin-top:10px" type="submit">Result</button>
        </form>
      </div>
      <?php 
		  $skill2 = $this->input->post('skill2');
		  echo $skill2;
		  //$tel = $this->input->post('tel');
		  //echo $tel;
		  //$email = $this->input->post('email');
		  //echo $email;
		  //$blk = $this->input->post('blk');
		  //echo $blk;
		  ?>
    </div>
  </div>
  <!--BODY--!--> 
</div>

<!-- Modal -->
<div id="Award" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-header">
      <h2 style="color:#FFF">Awards</h2>
      <button type="button" class="close" data-dismiss="modal" style="color:#FFF; opacity:1;">&times;</button>
      </br>
    </div>
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="display:block">
      <div class="modal-body form-group" style="overflow-y:auto; max-height:500px;">
        <hr/>
        <?php
	  
	 	 echo $awards;
	  
      ?>
        </br>
      </div>
    </div>
    <div class="modal-footer"> </div>
  </div>
</div>

<!-- Modal --> 
<script>

function award(){
	
	 
        $("#Award").modal('show');
}
</script> 
