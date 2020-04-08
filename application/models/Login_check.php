<?php


class Login_check extends CI_Model{
	

	
	public function check()
	{
		$id = $this->input->post('U_ID');
		$password = $this->input->post('U_Password');
		
		
		
		$sql = "SELECT * FROM highered_accounts WHERE Student_Number='{$id}' AND Password='{$password}' LIMIT 1";
		
		$sql2 = "SELECT * FROM admin_accounts WHERE ID='{$id}' AND Password='{$password}' LIMIT 1";
		
		
		$res = $this->db->query($sql);
		$res2 = $this->db->query($sql2);
		
	
		$row = $res->row();
		$row2 = $res2->row();
		
		
		//Student
		if($res->num_rows() == 1){
			
			$timesql = "UPDATE highered_accounts SET Time_IN=Now() WHERE Student_Number='{$id}'";
			$set_time_in = $this->db->query($timesql);
	
			$get = "SELECT * FROM student_info WHERE Student_Number='{$id}' LIMIT 1";
			$result = $this->db->query($get);
			
			
			
			
			if($result->num_rows() == 1){
				
			$info = $result->row();
			
			
			$pass = '1';
			
			$session_data = array(
				
		'First_Name' => $info->First_Name,
		'Middle_Name' => $info->Middle_Name,
		'Last_Name' => $info->Last_Name,
		'Course' => $info->Course,
		'YearLevel' => $info->YearLevel,
		'Address_No' => $info->Address_No,
		'Address_Street' => $info->Address_Street,
		'Address_Subdivision' => $info->Address_Subdivision,
		'Address_Barangay' => $info->Address_Barangay,
		'Address_City' => $info->Address_City,
		'Address_Province' => $info->Address_Province,
		'Email' => $info->Email,
		'Cp_No' => $info->CP_No,
		'Tel_No' => $info->Tel_No,
		'Student_Number' => $info->Student_Number,
		'Entrance_SchoolYear' => $info->Entrance_SchoolYear
				
				);

			$this->set_session($session_data);
			}else{
				//no data
				$pass = '1';
			
			$session_data = array(
				
		'First_Name' => ' ',
		'Middle_Name' => ' ',
		'Last_Name' => ' ',
		'Course' => ' ',
		'YearLevel' => ' ',
		'Address_No' => ' ',
		'Address_Street' => ' ',
		'Address_Subdivision' => ' ',
		'Address_Barangay' => ' ',
		'Address_City' => ' ',
		'Address_Province' => ' ',
		'Email' => ' ',
		'Cp_No' => ' ',
		'Tel_No' => ' ',
		'Student_Number' => ' ',
		'Entrance_SchoolYear' => ' '
				
				);

			$this->set_session($session_data);
			//no data
				
			}
			
			
			return $pass;
		
			}
			
			
			
			//Admin
			else if($res2->num_rows() == 1){
				
				$pass = '2';
				$timesql = "UPDATE admin_accounts SET Time_IN=Now() WHERE ID='{$id}'";
				$set_time_in = $this->db->query($timesql);
				$admin = array(
									  'Name' => $row2->Name,
									  'ID' => $row2->ID,
									  'Super_Admin' => $row2->Super_Admin,
									  'Professor' => $row2->Professor,
									  'Moderator' => $row2->Moderator
									  );
				
				$this->admin_session($admin);
				
				return $pass;
				}
				
			//Fail	
			else{
				
				$pass = '0';
				return $pass;
				}
				
			
	}
	
	private function set_session($session_data)
	{
		$sess_data = array(
		'First_Name' => $session_data['First_Name'],
		'Middle_Name' => $session_data['Middle_Name'],
		'Last_Name' => $session_data['Last_Name'],
		'Course' => $session_data['Course'],
		'YearLevel' => $session_data['YearLevel'],
		'Address_No' => $session_data['Address_No'],
		'Address_Street' => $session_data['Address_Street'],
		'Address_Subdivision' => $session_data['Address_Subdivision'],
		'Address_Barangay' => $session_data['Address_Barangay'],
		'Address_City' => $session_data['Address_City'],
		'Address_Province' => $session_data['Address_Province'],
		'Email' => $session_data['Email'],
		'Cp_No' => $session_data['Cp_No'],
		'Tel_No' => $session_data['Tel_No'],
		'Student_Number' => $session_data['Student_Number'],
		'Entrance_SchoolYear' => $session_data['Entrance_SchoolYear'],
		'logged_in' => "1"
						   );
		
		$this->session->set_userdata($sess_data);	
	}
	private function admin_session($session_data)
	{
		$sess_data = array(
		'Name' => $session_data['Name'],
		'ID' => $session_data['ID'],
		'Super_Admin' => $session_data['Super_Admin'],
		'Professor' => $session_data['Professor'],
		'Moderator' => $session_data['Moderator'],
		'admin_logged_in' => "1"
						   );
		$this->session->set_userdata($sess_data);	
	}
	public function jumpcheck(){
		
		$get = $this->session->userdata('logged_in');
		$adminget = $this->session->userdata('admin_logged_in');
		if($get == 1){
			$check = "1";
			}
		else if($adminget == 1){
			$check = "1";
			}
		else{ $check = "0"; }
			
			return $check;
		}
	public function TimeOut(){
		
		
		$get = $this->session->userdata('logged_in');
		$adminget = $this->session->userdata('admin_logged_in');
		$Student_Number = $this->session->userdata('Student_Number');
		$ID = $this->session->userdata('ID');
		
		if($get == 1){
			$timesql = "UPDATE highered_accounts SET Time_Out=Now() WHERE Student_Number='$Student_Number'";
			}
		else if($adminget == 1){
			$timesql = "UPDATE admin_accounts SET Time_Out=Now() WHERE ID='$ID'";
			}
		
		
		
		
		$set_time_in = $this->db->query($timesql);
		
		}
}

?>