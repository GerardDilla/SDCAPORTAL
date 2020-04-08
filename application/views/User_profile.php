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
$logged_in = $this->session->userdata('logged_in');


		
?>
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; max-height:1px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
        <div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Profile</div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
  		
          <!--Content--!-->
          <?php echo $Output; ?>
          <!--Content--!-->
          </div>
         
        </div><!--BODY--!-->