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
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Clearance Information
        </div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
  		

          <!--Content--!-->

            
            <div>
              <h4 style="color:#cc0000">To get your clearance, bring your registration form and proceed to the Registrar's Office (Ground Floor).</h4>
            </div>

            <div class="notebook" style="max-height: 1000px; min-width:100px;">
            <ul class='list'>

                <li><strong>Requirements in Clearance:</strong></li>
              
                <li data-toggle="popover" title="Location: Office of respective Program Chair" data-content="Must have no Incomplete Grade" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > PROGRAM CHAIR
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>
                
                
                <li data-toggle="popover" title="Location: Office of respective Dean" data-content="Needs to have the signiture of both the Program Chair and Accounting" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > DEAN
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>
                
                
                <li style="cursor:pointer" data-toggle="popover" title="Location: Clinic, 2nd Floor" data-content="Must have completed and passed the medical check" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > CLINIC 
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>

                <li style="cursor:pointer" data-toggle="popover" title="Location: Office of respective Adviser" data-content="Must be cleared of all Organizational duties" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > ADVISER 
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>

                <li style="cursor:pointer" data-toggle="popover" title="Location: DLRC, 3rd Floor" data-content="Must have returned all borrowed books" data-placement="top" data-trigger="hover">
                <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > LIBRARY 
                <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                </p>
                </li>

                <li style="cursor:pointer" data-toggle="popover" title="Location: DES Office, 5th Floor" data-content="Must have no record of damaging equipments" data-placement="top" data-trigger="hover">
                <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > LABORATORY 
                <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                </p>
                </li>

                <li style="cursor:pointer" data-toggle="popover" title="Location: Accounting Office, Ground Floor" data-content="Must have no remaining Balance" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > ACCOUNTING 
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>

                <li style="cursor:pointer" data-toggle="popover" title="Location: Guidance Office, 3rd Floor" data-content="Must have finished the Instructor evaluation and has no active violations" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > DSAS 
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>

                <li style="cursor:pointer" data-toggle="popover" title="Location: Registrars Office, Ground Floor" data-content="Must have no Incomplete Grade" data-placement="top" data-trigger="hover">
                  <p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > REGISTRAR 
                  <span style="float:right; margin:10px" class="glyphicon glyphicon-info-sign"></span>
                  </p>
                </li>
                
            </ul>
            </div>

            <div>
              <h5 style="color:#cc0000">This feature is at it's development phase.</h5>
            </div>


            <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
            </script>



           
          <!--Content--!-->


        </div>
        </div><!--BODY--!-->