<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
table{
	font-family:"Times New Roman", Times, serif;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resume Builder</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='<?php echo base_url();?>Bootstrap/css/bootstrap.min.css'>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Sidebar.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/w3.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Styles.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/CSS/Modal.css">
    <script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>JS/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>JS/Pace.js"></script>
    <script src="<?php echo base_url();?>C_editor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>JS/additem.js"></script>
</head>

<body>
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


$addressNo = $this->input->post('blk');
$Street = $this->input->post('street');
$Subdivision = $this->input->post('subd');
$Barangay = $this->input->post('brng');
$City = $this->input->post('city');
$Province = $this->input->post('prov');
$CP = $this->input->post('cell');
$TP = $this->input->post('tel');
$Email = $this->input->post('email');

$Nickname = $this->input->post('nickname');
$birthdate = $this->input->post('birthdate');
$birthplace = $this->input->post('birthplace');
$age = $this->input->post('age');
$height = $this->input->post('height');
$weight = $this->input->post('Weight');
$nationality = $this->input->post('nationality');
$Religion = $this->input->post('Religion');
$civilstat = $this->input->post('civilstat');
$father = $this->input->post('father');
$occ1 = $this->input->post('occ1');
$mother = $this->input->post('mother');
$occ2 = $this->input->post('occ2');
$resume_pic = $this->input->post('resume_pic'); 

$T_school = $this->input->post('T_school');
$T_year = $this->input->post('T_year');
$T_address = $this->input->post('T_address');
$Course = $this->input->post('Course');

$S_school = $this->input->post('S_school');
$S_year = $this->input->post('S_year');
$S_Address = $this->input->post('S_Address');

$P_school = $this->input->post('P_school');
$P_year = $this->input->post('P_year');
$P_Address = $this->input->post('P_Address');



$objective = array(
				   
'obj1' => $this->input->post('obj1'),
'obj2' => $this->input->post('obj2'),
'obj3' => $this->input->post('obj3'),
'obj4' => $this->input->post('obj4'),
'obj5' => $this->input->post('obj5'),
'obj6' => $this->input->post('obj6'),
'obj7' => $this->input->post('obj7'),
'obj8' => $this->input->post('obj8'),
'obj9' => $this->input->post('obj9'),
'obj10' => $this->input->post('obj10')
				   
				   );

$Seminar = array(
				   
'Seminar1' => $this->input->post('Seminar1'),
'Seminar2' => $this->input->post('Seminar2'),
'Seminar3' => $this->input->post('Seminar3'),
'Seminar4' => $this->input->post('Seminar4'),
'Seminar5' => $this->input->post('Seminar5'),
'Seminar6' => $this->input->post('Seminar6'),
'Seminar7' => $this->input->post('Seminar7'),
'Seminar8' => $this->input->post('Seminar8'),
'Seminar9' => $this->input->post('Seminar9'),
'Seminar10' => $this->input->post('Seminar10')
				   
				   );

$Certificate = array(
				   
'Certificate1' => $this->input->post('Certificate1'),
'Certificate2' => $this->input->post('Certificate2'),
'Certificate3' => $this->input->post('Certificate3'),
'Certificate4' => $this->input->post('Certificate4'),
'Certificate5' => $this->input->post('Certificate5'),
'Certificate6' => $this->input->post('Certificate6'),
'Certificate7' => $this->input->post('Certificate7'),
'Certificate8' => $this->input->post('Certificate8'),
'Certificate9' => $this->input->post('Certificate9'),
'Certificate10' => $this->input->post('Certificate10')
				   
				   );

$Skill = array(
				   
'skill1' => $this->input->post('skill1'),
'skill2' => $this->input->post('skill2'),
'skill3' => $this->input->post('skill3'),
'skill4' => $this->input->post('skill4'),
'skill5' => $this->input->post('skill5'),
'skill6' => $this->input->post('skill6'),
'skill7' => $this->input->post('skill7'),
'skill8' => $this->input->post('skill8'),
'skill9' => $this->input->post('skill9'),
'skill10' => $this->input->post('skill10')
				   
				   );



?>
<h1 class="center-block">Edit Here</h1>
<textarea class="ckeditor" id="editor">



<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; border:none; border-style:hidden;"><!--BASIC INFO--1-->
	<tbody>
		<tr>
			<td>
            <h2><strong><?php echo $resume_pic."".$First_Name." ".$Middle_Name." ".$Last_Name; ?></strong></h2>
            <h3><?php echo $addressNo." ".$Street." ".$Subdivision.",".$Barangay.", ".$City.", ".$Province; ?></h3>
            <h3><?php echo "Cellphone number: ".$CP." </br></br>Telephone Number: ".$TP;?></h3>
            <h3><?php echo "Email: ".$Email;?></h3>
            
            </td>
			<td><img src="<?php echo base_url(); ?>Profile/<?php echo $picture; ?>" style="width: 192px; height: 192px; float:right;" /></td>
		</tr>
	</tbody>
</table><!--BASIC INFO--1-->

<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; border-style:hidden;"><!--PERSONAL INFO--1-->
	<tbody>
		<tr>
			<td>
            <h2><strong>Personal Info</strong></h2>
            
            <hr />
            <div style="padding:20px;">
            
             <table align="left"  cellpadding="1" cellspacing="1" style="width:40%; font-size:16px; width:500px;">
			<tbody>
				<tr>
				<td style="">
                	
                    <strong>Nickname:</strong> </br>
                    <strong>Birthday:</strong> </br>
                    <strong>Birthplace:</strong> </br>
                    <strong>Age:</strong> </br>
                    <strong>Height:</strong> </br>
                    <strong>Weight:</strong> </br>
                    <strong>Nationality:</strong> </br>
                    <strong>Religion:</strong> </br>
                    <strong>Civil Status:</strong> </br>
                    <strong>Father's Name:</strong> </br>
                    <strong>Occupation:</strong> </br>
                    <strong>Mother's Name:</strong> </br>
                    <strong>Occupation:</strong> </br>
                    
                    
                    
            	</td>
				<td>
            		<?php echo $Nickname; ?></br>
                    <?php echo $birthdate; ?></br>
                    <?php echo $birthplace; ?></br>
                    <?php echo $age; ?></br>
                    <?php echo $height; ?></br>
                    <?php echo $weight; ?></br>
                    <?php echo $nationality; ?></br>
                    <?php echo $Religion; ?></br>
                    <?php echo $civilstat; ?></br>
                    <?php echo $father; ?></br>
                    <?php echo $occ1; ?></br>
                    <?php echo $mother; ?></br>
                    <?php echo $occ2; ?></br>
 
            	</td>
				</tr>
			</tbody>
			 </table>
            
            </div>
            </td>

		</tr>
	</tbody>
</table><!--PERSONAL INFO--1-->

<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; font-size:14px;"><!--OBJECTIVES--1-->
	<tbody>
		<tr>
			<td>
            
            <h2><strong>Objective</strong></h2>
            <hr/>
            
            
            <div style="padding:20px; font-size:14px;">
            
            <?php
            
			echo "<ul>";
			foreach($objective as $obj_items){
				
				if($obj_items != ""){
					
				echo "<li>".$obj_items."</li>";
				}
				else{}
				
				}
			echo "</ul>";
			?>
            
            </div>
            
            </td>
		</tr>
	</tbody>
</table><!--OBJECTIVES--1-->

<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; font-size:14px;"><!--EDUC--1-->
	<tbody>
		<tr>
			<td>
            
            <h2><strong>Educational Background</strong></h2>
            <hr/>
            
            
            <div>
            
            
           <table style="padding: 0;">
           
           <tr><!--ter-1-->
           
           	<td style="width:200px;">
            <h3><strong>Tertiary:</strong></h3>
           		 <tr>
                 <td><span style="font-size:14px"><p><?php echo $T_year; ?></p></span></td>
                 <td><span style="font-size:14px"><strong><p><?php echo $T_school; ?></p></strong>
                 </span></td>
                 </tr>
                 <tr>
                 <td></td>
                 <td><span style="font-size:14px"><?php echo $Course; ?></span></td>
                 </tr>
                 <tr>
                 <td></td>
                 <td><span style="font-size:14px"><p><?php echo $T_address; ?></p></span></td>
                 </tr>
           	</td>
            
           </tr><!--ter-1-->
           
           <tr><!--sec-1-->
           
           	<td>
            <h3><strong>Secondary:</strong></h3>
           		<tr>
                 <td><span style="font-size:14px"><p><?php echo $S_year; ?></p></span></td>
                 <td><span style="font-size:14px"><strong><p><?php echo $S_school; ?></p></strong></span></td>
                 </tr>
                 <tr>
                 <td></td>
                 <td><span style="font-size:14px"><p><?php echo $S_Address; ?></p></span></td>
                 </tr>
           	</td>
            
           </tr><!--sec-1-->
          
           <tr><!--pri-1-->
           
           	<td>
             <h3><strong>Primary:</strong></h3>
           		<tr>
                 <td><span style="font-size:14px"><p><?php echo $P_year; ?></p></span></td>
                 <td><span style="font-size:14px"><strong><p><?php echo $P_school; ?></p></strong></span></td>
                 </tr>
                 <tr>
                 <td></td>
                 <td><span style="font-size:14px"><p><?php echo $P_Address; ?></p></span></td>
                 </tr>
           	</td>
            
           </tr><!--pri-1-->
           
           
           </table>
     
            </div>
            
            </td>
		</tr>
	</tbody>
</table><!--EDUC--1-->

<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; font-size:14px;"><!--Seminars--1-->
	<tbody>
		<tr>
			<td>
            
            <h2><strong>Seminars</strong></h2>
            <hr/>
               
            <div style="padding:20px;">
            <?php
            
			echo "<ul>";
			foreach($Seminar as $seminar_items){
				
				if($seminar_items != ""){
					
				echo "<li>".$seminar_items."</li>";
				}
				else{}
				
				}
			echo "</ul>";
			?>
            </div>
            
            </td>
		</tr>
	</tbody>
</table><!--Seminars--1-->

<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; font-size:14px;"><!--Certificates--1-->
	<tbody>
		<tr>
			<td>
            
            <h2><strong>Certificates</strong></h2>
            <hr/>
            
            
            <div style="padding:20px;">
            <?php
            
			echo "<ul>";
			foreach($Certificate as $cert_items){
				
				if($cert_items != ""){
					
				echo "<li>".$cert_items."</li>";
				}
				else{}
				
				}
			echo "</ul>";
			?>
            </div>
            
            </td>
		</tr>
	</tbody>
</table><!--Certificates--1-->

<table align="center"  cellpadding="1" cellspacing="1" style="width:100%; font-size:14px;"><!--Seminars--1-->
	<tbody>
		<tr>
			<td>
            
            <h2><strong>Skill</strong></h2>
            <hr/>
            
            
            <div style="padding:20px;">
            <?php
            
			echo "<ul>";
			foreach($Skill as $skill_items){
				
				if($skill_items != ""){
					
				echo "<li>".$skill_items."</li>";
				}
				else{}
				
				}
			echo "</ul>";
			?>
            </div>
            
            </td>
		</tr>
	</tbody>
</table><!--SKILLS--1-->











</textarea>

<script>
CKEDITOR.on('instanceReady',
      function( evt )
      {
         var editor = evt.editor;
         editor.execCommand('maximize');
      });

</script>
</body>
</html>