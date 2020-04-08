<?php


class Awards_model extends CI_Model{
	

	// STUDENT
	public function getlist()
	{
		$ID = $this->session->userdata('Student_Number');
		//echo $ID;
		$sql = "
		
			SELECT A.Award_ID,A.Student_Number, A.Date_Given, B.Title,B.Location,B.Role,B.Certificate
			FROM student_awards AS A
			INNER JOIN awards AS B
			ON A.Award_ID = B.Award_ID
			WHERE A.Student_Number = '$ID'
			AND A.active = '1'
			AND B.Valid = '1'
			ORDER BY A.Date_Given DESC
			
			";
		
		$result = $this->db->query($sql);
		$Output = "";
		
		if($result->num_rows() <= 0){
			
			$Output .= "<h3>You have no records yet.</h3></br>";
			$Output .= "Please visit the SDCA <a style='color:#00F' href='#'> Helpdesk </a> if there are any concerns, Thank you!";
			   
			   
		}
		else{
			
			$Output .= '
			
			
				<table class="table table-striped" style="color:#666">
				<thead>
				  <tr>
					<th>Title</th>
					<th>Location</th>
					<th>Date Given</th>
					<th>Role</th>
					<th>View</th>
					<th></th>
				  </tr>
				</thead>
				<tbody>
			
			
			';
			
					
			 foreach($result->result_array() as $row){
			 
				   $Output .= "<tr>";
				   $Output .= "<td>".$row['Title']."</td>";
				   $Output .= "<td>".$row['Location']."</td>";
				   $Output .= "<td>".$row['Date_Given']."</td>";//date given
				   $Output .= "<td>".$row['Role']."</td>";
				   $Output .= "<td><a href='".base_url()."Certificate/".$row['Certificate']."' target='_blank'><img style='max-width:50px; cursor:pointer;' id='".$row['Award_ID']."' src='".base_url()."Certificate/".$row['Certificate']."' /></a></td>";   
				   $Output .= "<td><button class='btn btn-success'><a href='".base_url()."Certificate/".$row['Certificate']."' download> Download certificate</a></button></td>";
				   $Output .= "</tr>";
		   
		   
			 }
			
			
			$Output .= '
			
			
				</tbody>
      			</table>
			
			
			';
		 
		}
		 
		 
		return $Output;
	}
	
	// ADMIN
	public function award_modal()
	{
		$q = $_REQUEST["q"];
		
		$sql = "SELECT * FROM awards WHERE Award_ID='$q' LIMIT 1";
            $result = $this->db->query($sql);
            if($result->num_rows() == 1){
				
				$row = $result->row();
			 	$Award_ID = $row->Award_ID;
				$Award_Title = $row->Title;
				$Award_Location = $row->Location;
				$Award_Role = $row->Role;
				$Award_Certificate = $row->Certificate;
				
            }
            else{
				
				$Award_ID = "";
				$Award_Title = "";
				$Award_Location = "";
				$Award_Role = "";
				$Award_Certificate = "";
				
                }
				
		
		if($result->num_rows() > 0){
			
		
			
			echo "<h3>Award ID: ".$Award_ID."</h3><br />";
			
			echo '
				
			 	'.form_open_multipart('index.php/administrator/update_award').'
				<label for="event">Award Title*:</label>
				<input type="text" class="form-control" id="event" name="u_aw_title" value="'.$Award_Title.'">
				<label for="date">Location*:</label>
				<input type="text" class="form-control" id="event" name="u_aw_location" value="'.$Award_Location.'">
				<label for="loc">Role*:</label>
				<input type="text" class="form-control" id="loc" name="u_aw_role" value="'.$Award_Role.'">
				<label class="btn btn-info" for="my-file-selector" style="margin-top:10px;">
				<input id="my-file-selector" name="userfile" type="file" style="display:none;" onchange="">
				  Change Image <img src="'.base_url().'Certificate/'.$Award_Certificate.' ?>" style="max-width:100px" /> 		</label>
				<span class="label label-info" id="upload-file-info"></span> </br>
				<button style="margin-top:10px; width:150px;" class="btn btn-success center-block" name="submit" value="upload image" type="submit">Submit</button>
				</form>
				<form action="'.site_url().'index.php/administrator/award_delete" method="post">
				<button class="btn btn-danger center-block" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="A_DEL" value="'.$Award_ID.'" type="submit">Unpublish</button>
				</form>
        
        
          ';
			
			
			}
		else{
				
			echo '';
				
				}
	}
	public function upload()
	{
		$ID = $this->session->userdata('Student_Number');
		//echo $ID;
		$sql = "SELECT * FROM student_awards WHERE Student_Number = '$ID'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getall()
	{
		
		//echo $ID;
		$sql = "SELECT * FROM awards WHERE Valid = '1'";
		$Output = "";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0){
			
			foreach($result->result_array() as $res){
				
				$Output .= '<option value="'.$res['Award_ID'].'">'.$res['Title'].'</option>';
				
				}
			
		}else{
			
				$Output .= "<h3>No Awards Available</h3>";
			
			}
			
		return $Output;
		
	}
	public function getall_list()
	{
		
		//echo $ID;
		$awd_src = $this->input->post('awd_src');
		if(isset($awd_src)){
			
				$sql = "SELECT * FROM awards WHERE Valid = '1' AND Title LIKE '%$awd_src%' OR Location LIKE '%$awd_src%' OR Role LIKE '%$awd_src%' ";
			
			}else{
				
				$sql = "SELECT * FROM awards WHERE Valid = '1'";
		
			}
		$Output = "";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0){
			
			foreach($result->result_array() as $row1){
				
				  	 $ID3 = $this->session->userdata('ID');
					 $author = $row1['ID'];
					 $Output .=  "<tr>";
					 
					 $Output .= "<td>".$row1['Award_ID']."</td>";
					 $Output .= "<td>".$row1['Title']."</td>";
					 $Output .= "<td>".$row1['Location']."</td>";
					 $Output .= "<td>".$row1['Date']."</td>";
					 $Output .= "<td>".$row1['Role']."</td>";
					 $Output .= "<td><a href='".base_url()."Certificate/".$row1['Certificate']."' target='_blank'><img style='max-width:50px; cursor:pointer;' id='".$row1['Award_ID']."' src='".base_url()."Certificate/".$row1['Certificate']."' /></a></td>";
					 $Output .= "<td>".$row1['ID']."</td>";
					  
					  if($ID3 != $author){
						  $filter = "disabled";
						  }else{
							  $filter = "";
							  }
					 
					  $Output .= '<td><button class="btn btn-info glyphicon glyphicon-pencil" type="submit" '.$filter.' style="width:50px" name="A_ID" value="'.$row1['Award_ID'].'" id="award_edit_button" onclick="awardmodal(this.value)"></button></td>';
					
					  
					 $Output .= "</tr>";
				  
				
				}
			
			
		}else{
			
			$Output .= "<h3>No Awards Available</h3>";
			
			}
			
		return $Output;
		
	}
	public function delete()
	{
		$aw_ID = $this->input->post('A_DEL');
		$sql = "UPDATE awards SET Valid = '0' WHERE Award_ID = '$aw_ID'";
		$result = $this->db->query($sql);
		
		$msg = "Award Unpublished";
				
		$aw_msg_session = array( 'u_aw_msg' => $msg );
		$this->session->set_userdata($aw_msg_session);
		
		
	}
	public function submit()
	{
		
		$title = $this->input->post('aw_title');
		$location = $this->input->post('aw_location');
		$role = $this->input->post('aw_role');
		$ID = $this->session->userdata('ID');
		
	
		
		
		$config['upload_path'] = "./Certificate/";
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '5000';
		//$config['file_name'] = $ID;
		
		$this->load->library('upload',$config);
		$data['img'] = "";
		
		
		$data = $this->upload->data();
		echo $data['raw_name'];

		if($title == ""){
			$msg = "No title input";
			$aw_msg_session = array( 'aw_msg' => $msg );
			$this->session->set_userdata($aw_msg_session);
			}
		else if($location == ""){
			$msg = "No Location input";
			$aw_msg_session = array( 'aw_msg' => $msg );
			$this->session->set_userdata($aw_msg_session);
			}
		else if($role == ""){
			$msg = "No Role input";
			$aw_msg_session = array( 'aw_msg' => $msg );
			$this->session->set_userdata($aw_msg_session);
			}
		else{
			if(!$this->upload->do_upload()){
				
				
				$msg = "No Image selected or invalid format.";
				$aw_msg_session = array( 'aw_msg' => $msg );
				$this->session->set_userdata($aw_msg_session);
				redirect('index.php/administrator/submit_award');
			}
			
			else{
				
				$file_data = $this->upload->data();
				$data['img'] = base_url(). "Certificate/" .$file_data['file_name'];
				
				$sql = "INSERT INTO awards (Title,Location,Role,Certificate,ID,Valid)
	VALUES ('{$title}','$location','$role','{$file_data['file_name']}','$ID','1');";
				
				$result = $this->db->query($sql);
	
				$msg = "Award registered!";
		
							}
				$aw_msg_session = array( 'aw_msg' => $msg );
				$this->session->set_userdata($aw_msg_session);
				
			 }
			
					
			
	
	}
	public function update()
	{
		$title = $this->input->post('u_aw_title');
		$location = $this->input->post('u_aw_location');
		$role = $this->input->post('u_aw_role');
		$ID = $this->session->userdata('ID');
		$A_ID = $this->session->userdata('A_ID');
		
		$config['upload_path'] = "./Certificate/";
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '5000';
		$config['file_name'] = $ID;

		$this->load->library('upload',$config);
		$data['img'] = "";
		

	if($title == ""){
		$msg = "No title input";
		$aw_msg_session = array( 'u_aw_msg' => $msg );
		$this->session->set_userdata($aw_msg_session);
		}
	else if($location == ""){
		$msg = "No Location input";
		$aw_msg_session = array( 'u_aw_msg' => $msg );
		$this->session->set_userdata($aw_msg_session);
		}
	else if($role == ""){
		$msg = "No Role input";
		$aw_msg_session = array( 'u_aw_msg' => $msg );
		$this->session->set_userdata($aw_msg_session);
		}
	else{
		if(!$this->upload->do_upload()){
			
			
			$sql = "UPDATE awards SET Title = '$title',Location = '$location',Role = '$role' WHERE Award_ID = '$A_ID'";
			
			$result = $this->db->query($sql);

			$msg = "Award updated!";
		}
		
		else{
			
			$file_data = $this->upload->data();
			$data['img'] = base_url(). "Certificate/" .$file_data['file_name'];
			
			$sql = "UPDATE awards SET Title = '$title',Location = '$location',Role = '$role',Certificate = '{$file_data['file_name']}' WHERE Award_ID = '$A_ID'";
			
			$result = $this->db->query($sql);

			$msg = "Award updated!";
	
						}
			$aw_msg_session = array( 'u_aw_msg' => $msg );
			$this->session->set_userdata($aw_msg_session);
			
		}
	
	}
	public function getval()
	{
		
		$A_ID = $this->input->post('A_ID');
		$sql = "SELECT * FROM awards WHERE Award_ID = '$A_ID' LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		
		$A_values = array(
						  
						 
						  
						  );
		$this->session->set_userdata($A_values);
		
		}
	public function student_list()
	{
		
		$q = $_REQUEST["q"];
		$sql = "SELECT * FROM Student_Info WHERE Student_Number LIKE '%$q%' OR First_Name LIKE '%$q%' OR Last_Name LIKE '%$q%' OR Course LIKE '%$q%' ORDER BY Reference_Number";
		$list = $this->db->query($sql);
		
			$count = 0;
			
			echo "<table class='table table-striped' style='color:#666; font-size:16px;'>";
         	echo "<thead>";
  			echo "<tr>";
     		echo "<th>Student Number</th>";
     		echo "<th>Name</th>";
     		echo "<th>Lastname</th>";
      		echo "<th>Course</th>";
      		echo "</tr>";
    		echo "</thead>";
            echo "<tbody>";
			foreach($list->result_array() as $row){
			
			//echo $getval[$count].", ";
			$count++;
			$getval[$count] = $row['Student_Number'];
			echo "<tr>";
			echo "<td>".$row['Student_Number']."</td>";
			echo "<td>".$row['First_Name']."</td>";
			echo "<td>".$row['Last_Name']."</td>";
			echo "<td>".$row['Course']."</td>";
			echo "<td>";
   			echo "<div class='checkbox'>";
   		    echo "<label><input class='chk' type='checkbox' name='getval[]' value='".$getval[$count]."'></label>";
  		    echo "</div>";
			echo "</td>";
			echo "</tr>";
			
			}
			
			echo "</tbody>";
            echo "</table>";
		
		}	
	public function give()
	{
			
			
		$val = $this->input->post('getval');
		$awd = $this->input->post('awd_give');
		
		if($val != ""){
		
			foreach($val as $value){
			
			
			$sql = "SELECT * FROM student_awards WHERE Student_Number='$value' AND Award_ID='$awd'  AND active = '1'";
			$result = $this->db->query($sql);
			
			if($result->num_rows() == 1){
				
				
				
				}else{
					
					$sql2 = "INSERT INTO student_awards (Award_ID,Student_Number,active)VALUES ('$awd','$value','1')";
					$result2 = $this->db->query($sql2);
					$msg = "Award Sent";
					
					}
			
			}
			
		}
		else{
				
				$msg = "No Student Selected";
				
			 }
			 
			$ses = array(
						 'aw_msg' => $msg
						 );
			$this->session->set_userdata($ses);
	
		}


}
?>