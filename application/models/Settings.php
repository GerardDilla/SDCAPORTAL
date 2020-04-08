<?php


class Settings extends CI_Model{
	
		public function change_password(){
			
			$Reference_Number = $this->session->userdata('Reference_Number');
			$currentPW = $this->input->post('currentPW');
			$currentPW = str_replace("'","\&#39;",$currentPW);
			$currentPW = stripslashes($currentPW);
		
			$NP = $this->input->post('newPW');
			$NP = str_replace("'","\&#39;",$NP);
			$NP = stripslashes($NP);
		
			$retypeP = $this->input->post('checkPW');
			$retypeP = str_replace("'","\&#39;",$retypeP);
			$retypeP = stripslashes($retypeP);
			
			
			$sql = "SELECT Password FROM highered_accounts WHERE Reference_Number='$Reference_Number' AND Password='$currentPW' LIMIT 1";
			
			$checkPW = $this->db->query($sql);
			if($currentPW == ""){
				$message = "";
				}
			else if($currentPW == "" && $retypeP == "")
			{
				$message = "No input detected";
			}
			else if($NP == "" && $retypeP == "")
			{
				$message = "No input detected";
			}
	else{
			if($checkPW->num_rows() == 1){
				
		
				if($NP == $retypeP){
					
				$sql2 = "UPDATE highered_accounts SET Password='$NP' WHERE Reference_Number='$Reference_Number'";
				$change = $this->db->query($sql2);
				
				
				$AN = $this->session->userdata('Account_Number');
				$logsql = "INSERT INTO highered_activity_log (HED_Account_ID,Portal_Activity_ID)VALUES ('$AN','2');";
				$log_result = $this->db->query($logsql);
				
				
				$message = "<span style='color:#666';>Succefully Changed!</br></span>";
				
				}
				else
				{
					$message = "Password did not match</br>";
				}
	
				
			}
			else{
					$message = "Wrong Password</br>";
					
				}
		}
				
				//Change Password Log
				
				
				return $message;
				
				
				
			}
			
			
			
			
		public function change_email(){
			 
			$Reference_Number = $this->session->userdata('Reference_Number');
			$currentPW = $this->input->post('PW');
			$currentPW = str_replace("'","\&#39;",$currentPW);
			$currentPW = stripslashes($currentPW);
			
			$NE = $this->input->post('newE');
			$NE = str_replace("'","\&#39;",$NE);
			$NE = stripslashes($NE);
			
			$retypeE = $this->input->post('checkE');
			$retypeE = str_replace("'","\&#39;",$retypeE);
			$retypeE = stripslashes($retypeE);
			
			$sql = "SELECT Password FROM highered_accounts WHERE Reference_Number='$Reference_Number' AND Password='$currentPW' LIMIT 1";
			
			$checkPW = $this->db->query($sql);
			if($currentPW == ""){
				$message = "";
				}
			else if($currentPW == "" && $retypeE == "")
			{
				$message = "No input detected";
			}
			else if($NE == "" && $retypeE == "")
			{
				$message = "No input detected";
			}
	else{
			if($checkPW->num_rows() == 1){
				
		
				if($NE == $retypeE){
					
				$sql2 = "UPDATE highered_accounts SET Email='$NE' WHERE Reference_Number='$Reference_Number'";
				$change = $this->db->query($sql2);
				$message = "<span style='color:#666';>Email Changed!</br></span>";
				
				}
				else
				{
					$message = "Email did not match</br>";
				}
	
				
			}
			else{
					$message = "Wrong Password</br>";
					
				}
		}
				
				return $message;
			}
			
	 public function emailshow(){
		 
			 $css = "panel-collapse collapse in";

		 return $css;
		 }
	 public function passwordshow(){
		 
		 
			 $css = "panel-collapse collapse in";

		 return $css;
		 }
	public function changepic(){
		
		
		$config['upload_path'] = "./Profile/";
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '10000';
		$config['file_name'] = $this->session->userdata('Student_Number');
		$ID = $this->session->userdata('Reference_Number');
		$this->load->library('upload',$config);
		$data['img'] = "";
		//echo $config['upload_path'];
	
		if(!$this->upload->do_upload()){
			
			
			$up = 0;
			$msg = array(
			
			'pic_msg' => 'Error uploading image. Please follow the proper format when uploading' 
			
			);
			
			
			
		}
		else{
			
			$file_data = $this->upload->data();
			$data['img'] = base_url(). "Profile/" .$file_data['file_name'];
			
			$sql = "UPDATE highered_accounts SET Account_picture='{$file_data['file_name']}' WHERE Reference_Number='$ID'";
			$result = $this->db->query($sql);

			$up = 1;
			
			$AN = $this->session->userdata('Account_Number');
			$logsql = "INSERT INTO highered_activity_log (HED_Account_ID,Portal_Activity_ID)VALUES ('$AN','3');";
			$log_result = $this->db->query($logsql);
			
			$msg = array(
			
			'pic_msg' => 'Picture saved! Login again to see changes.' 
			
			);
						
			}
		$this->session->set_userdata($msg);
		return $up;
		}
		
		
	public function admin_change_password(){
			
			$ID = $this->session->userdata('ID');
			$currentPW = $this->input->post('a_currentPW');
			$NP = $this->input->post('a_newPW');
			$retypeP = $this->input->post('a_checkPW');
			
			$sql = "SELECT Password FROM admin_accounts WHERE ID='$ID' AND Password='$currentPW' LIMIT 1";
			
			$checkPW = $this->db->query($sql);
			if($currentPW == ""){
				$message = "No input detected";
				}
			else if($currentPW == "" && $retypeP == "")
			{
				$message = "No input detected";
			}
			else if($NP == "" && $retypeP == "")
			{
				$message = "No input detected";
			}
	else{
			if($checkPW->num_rows() == 1){
				
		
				if($NP == $retypeP){
					
				$sql2 = "UPDATE admin_accounts SET Password='$NP' WHERE ID='$ID'";
				$change = $this->db->query($sql2);
				$message = "Password Changed";
				
				}
				else
				{
					$message = "Password did not match</br>";
				}
	
				
			}
			else{
					$message = "Wrong Password</br>";
					
				}
		}
				
				
				$ses = array('a_pw_msg' => $message);
				$this->session->set_userdata($ses);
			}
	
}

?>