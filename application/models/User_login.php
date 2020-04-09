<?php


class User_login extends CI_Model{
	

	
public function U_Log()
{
	
		//Get input
		$id = $this->input->post('U_ID');
		$password = $this->input->post('U_Password');
		$password = str_replace("'","\&#39;",$password);
		$password = stripslashes($password);
		$id = str_replace("'","\&#39;",$id);
		$id = stripslashes($id);
		//Get input//
		
		
		//Check if Student number is existing in student_info
		$sql = "SELECT * FROM Student_Info Where Student_Number = '$id'";
		$query = $this->db->query($sql);
		//first condition
		if($query->num_rows() != 0){
			
			//echo "TESTING";
			$query_content = $query->row();
			$RN = $query_content->Reference_Number;
			
			//Check if account is existing in highered_accounts
			$sql2 = "
			SELECT * FROM highered_accounts WHERE Student_Number = '$id' AND password = '$password' AND Active = '1'
			";
			$query2 = $this->db->query($sql2);
			//second condition
			if($query2->num_rows() != 0){
						
						//Get highered_account contents
						$query2cont = $query2->row();
						
						
						//Time log
						$AN = $query2cont->HED_Account_ID;
						$timesql = "INSERT INTO highered_activity_log (HED_Account_ID,Portal_Activity_ID)VALUES ('$AN','1');";
						$set_time_in = $this->db->query($timesql);
						//$get_time_sql = "SELECT * FROM HigherED_Timelog Where Time_In=NOW()";
						//$timesql2 = $this->db->query($get_time_sql);
						//$row = $timesql2->row();
						//$Timelog_ID = $row->HED_timelog_ID;
						//echo $Timelog_ID;
						//Time log
						
						
						//echo "success";
		
						$pass = '1';
						
						//Prepare Global Variables
						$session_data = array(
						
						'First_Name' => $query_content->First_Name,
						'AdmittedSY' => $query_content->AdmittedSY,
						'Middle_Name' => $query_content->Middle_Name,
						'Last_Name' => $query_content->Last_Name,
						'Course' => $query_content->Course,
						'YearLevel' => $query_content->YearLevel,
						'Address_No' => $query_content->Address_No,
						'Address_Street' => $query_content->Address_Street,
						'Address_Subdivision' => $query_content->Address_Subdivision,
						'Address_Barangay' => $query_content->Address_Barangay,
						'Address_City' => $query_content->Address_City,
						'Address_Province' => $query_content->Address_Province,
						'Email' => $query_content->Email,
						'Cp_No' => $query_content->CP_No,
						'Tel_No' => $query_content->Tel_No,
						'Student_Number' => $query_content->Student_Number,
						'Reference_Number' => $query_content->Reference_Number,
						'picture' => $query2cont->Account_picture,
						'Account_Number' => $AN,
						'Entrance_SchoolYear' => $query_content->Entrance_SchoolYear
						
						);
		
						$this->set_session($session_data);
				
				}
				//second condition (else)
				else{
					
					//echo "failed";
					$pass = 0;
					
					}
				
				
			}
		//first condition (ELSE
		else{
				
				//echo "failed";
				$pass = 0;
				
			}
			return $pass;
		
}
			
			
			
private function set_session($session_data)
	{
		
		
		
		$sess_data = array(
		'First_Name' => $session_data['First_Name'],
		'Middle_Name' => $session_data['Middle_Name'],
		'AdmittedSY' => $session_data['AdmittedSY'],
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
		'Reference_Number' => $session_data['Reference_Number'],
		'ENCRYPT_Reference_Number' => MD5($session_data['Reference_Number']),
		'picture' => $session_data['picture'],
		'Account_Number' => $session_data['Account_Number'],
		'logged_in' => "1"
						   );
		
		$this->session->set_userdata($sess_data);	
	}
	
	
public function jumpcheck(){
		
		$get = $this->session->userdata('logged_in');
		if($get == 1){
			$check = "1";
			}
		else{ $check = "0"; }
			
			return $check;
}
		
		
public function TimeOut(){
		
		
		$get = $this->session->userdata('logged_in');
		$Account_Number = $this->session->userdata('Account_Number');
		
		
}
		
		
public function Profile(){
	
	
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
	$AdmittedSY = $this->session->userdata('AdmittedSY');
	$logged_in = $this->session->userdata('logged_in');
	
	

	$Output = '<table class="table table-user-information" style="color:#666">';
	$Output .= " <tbody>";
	$Output .= "<tr>";
	$Output .= "<td>Firstname:</td>";
	$Output .= "<td>".$First_Name."</td>";
	$Output .= "</tr>";
	$Output .= "<tr>";
	$Output .= "<td>Initial:</td>";
	$Output .= "<td>".$Middle_Name."</td>";
	$Output .= "</tr>";
	$Output .= "<tr>";
	$Output .= "<td>Lastname:</td>";
	$Output .= "<td>".$Last_Name."</td>";
	$Output .= "</tr>";
	$Output .= "<tr>";
	$Output .= "<td>Course:</td>";
	$Output .= "<td>".$Course."</td>";
	$Output .= "</tr>";
	$Output .= "<tr>";
	$Output .= "<td>Year Level:</td>";
	$Output .= "<td>".$YearLevel."</td>";
	$Output .= "</tr>";
	$Output .= "<tr>";
	$Output .= "<tr>";
	$Output .= "<td>Home Address:</td>";
	$Output .= "
	
	<td>".$Address_No.", ".$Address_Street.", ".$Address_Subdivision.", ".$Address_Barangay.", ".$Address_City."</td>
	
	";
	$Output .= "</tr>";
	$Output .= "<tr>";
	$Output .= " <td>Contact Number</td>";
	$Output .= " <td>Cellphone number:</br></br>Telephone number: </td>";
	$Output .= "</tr>";
	$Output .= "</tbody>";
	$Output .= "</table>";
	
	return $Output;
	}
		

}
?>