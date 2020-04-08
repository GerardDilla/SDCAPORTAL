<?php


class Admin_login extends CI_Model{
	

	
	public function A_Log()
	{
		$id = $this->input->post('A_ID');
		$password = $this->input->post('A_Password');
		
		$sql = "SELECT * FROM admin_accounts WHERE ID='{$id}' AND Password='{$password}' AND active = '1' LIMIT 1";
		$result = $this->db->query($sql);
		
		$row2 = $result->row();
		
		if($result->num_rows() == 1){
			
			$timesql = "UPDATE admin_accounts SET time_in=Now() WHERE ID='{$id}'";
			$pass = '1';
			$set_time_in = $this->db->query($timesql);
			
				$admin = array(
									  
									  'ID' => $row2->ID,
									  'Super_Admin' => $row2->Super_Admin,
									  'Moderator' => $row2->Moderator,
									  'DES' => $row2->DES,
									  'DSAS' => $row2->DSAS,
									  'HR' => $row2->HR,
									  'A_First_Name' => $row2->First_Name,
									  'A_Middle_Name' => $row2->Middle_Name,
									  'A_Last_Name' => $row2->Last_Name,
									  
									  );
				
				$this->admin_session($admin);
				
				
			}
		else{
			
			$pass = '0';
			
			}
			return $pass;
	}
	public function admin_menu(){
		
			
			$Moderator = $this->session->userdata('Moderator');
			$Super_Admin = $this->session->userdata('Super_Admin');
			$DES = $this->session->userdata('DES');
			$DSAS = $this->session->userdata('DSAS');
			$HR = $this->session->userdata('HR');
			$Output = "";
			if($Super_Admin == 1){
				
					$Output .= 
					'
					
					
						<li id="account" style=""><a href="'.site_url().'index.php/administrator/account_search" class="active">Student Accounts<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-user pull-right"></span></a></li>
        
        <li id="admin" style=""><a href="'.site_url().'index.php/administrator/admin_list" class="active">Admin Accounts<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-user pull-right"></span></a></li>
        
		<li id="registration" style=""><a href="'.site_url().'index.php/administrator/admin_registration_form">Admin registration<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-plus pull-right"></span></a></li>
        
        <li id="S_award" style=""><a href="'.site_url().'index.php/administrator/award_form">Manage Award<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-star-empty pull-right"></span></a></li>
        
        <li id="award" style=""><a href="'.site_url().'index.php/administrator/awards">Awards list<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-star pull-right"></span></a></li>
        
        <li id="calendar" style=""><a href="'.site_url().'index.php/administrator/event_form">Add Event<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-list-alt pull-right"></span></a></li>
		
        <li id="S_calendar" style=""><a href="'.site_url().'index.php/administrator/event">Event list<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-calendar pull-right"></span></a></li>
        
        <li id="logs" style="display:none"><a href="#">Activity Log<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-dashboard pull-right"></span></a></li>
					
					
					
					';
				
				}
			else if($Moderator == 1){
				
					$Output .= 
					'
        
        <li id="S_award" style=""><a href="'.site_url().'index.php/administrator/award_form">Manage Award<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-star-empty pull-right"></span></a></li>
        
        <li id="award" style=""><a href="'.site_url().'index.php/administrator/awards">Awards list<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-star pull-right"></span></a></li>
        
        <li id="calendar" style=""><a href="'.site_url().'index.php/administrator/event_form">Add Event<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-list-alt pull-right"></span></a></li>
		
        <li id="S_calendar" style=""><a href="'.site_url().'index.php/administrator/event">Event list<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-calendar pull-right"></span></a></li>
        
        <li id="logs" style="display:none"><a href="#">Activity Log<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-dashboard pull-right"></span></a></li>
					
					
					
					';
				
			}

			else if($DES == 1){

             $Output .= 
					'
					<li id="account" style=""><a href="'.site_url().'index.php/administrator/account_search" class="active">Student Accounts<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-user pull-right"></span></a></li>

					
					<div class="student_search">			
						<form method="post" action="'.base_url().'index.php/Administrator/eval_searchstudent">
						<input name="get_eval_assign_id" type="hidden" value="8">
						<input name="instructor" type="hidden" value="">
						<input type="submit" value="Student Monitoring">
						<span style="font-size:24px; margin-right:20px; margin-top:6px; color: #fff;" class="glyphicon glyphicon-star pull-right"></span>
						</form>
					</div>
					


					
					<div class="student_search">			
						<form method="post" action="'.base_url().'index.php/Administrator/eval_results">
						<input name="get_eval_assign_id" type="hidden" value="8">
						<input name="instructor" type="hidden" value="">
						<input type="submit" value="Rmusic Result">
						<span style="font-size:24px; margin-right:20px; margin-top:6px; color: #fff;" class="glyphicon glyphicon-star pull-right"></span>
						</form>
					</div>
                  
                 ';

             }
     		else if($DSAS == 1){

             $Output .= 
					'
						<div class="student_search">			
							<form method="post" action="'.base_url().'index.php/Administrator/eval_searchstudent">
							<input name="get_eval_assign_id" type="hidden" value="7">
								<input name="instructor" type="hidden" value="">
								<input type="submit" value="Student Monitoring">
									<span style="font-size:24px; margin-right:20px; margin-top:6px; color: #fff;" class="glyphicon glyphicon-star pull-right"></span>
							</form>
							</div>



							<div class="student_search">			
							<form method="post" action="'.base_url().'index.php/Administrator/eval_results">
							<input name="get_eval_assign_id" type="hidden" value="7">
								<input name="instructor" type="hidden" value="">
								<input type="submit" value="Result">
									<span style="font-size:24px; margin-right:20px; margin-top:6px; color: #fff;" class="glyphicon glyphicon-star pull-right"></span>
							</form>
							</div>
                  
                 ';


             }else if($HR == 1){

             $Output .= 
				 '
							<li id="S_award" style=""><a href="'.site_url().'index.php/administrator/hr_student">Student<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-star-empty pull-right"></span></a></li>
							<li id="award" style=""><a href="'.site_url().'index.php/administrator/hr_student_results">Evaluation Results<span style="font-size:24px; margin-right:20px; margin-top:6px;" class="glyphicon glyphicon-star pull-right"></span></a></li>
									
						
                 ';

			}else{
					$Output .= " ";
				}
				
				$sidenav = array(
				
				"admin_sidenav" => $Output
				
				);
				$this->session->set_userdata($sidenav);
				
			return $Output;
		
		}



	private function admin_session($session_data)
	{
		$sess_data = array(

		'ID' => $session_data['ID'],
		'Super_Admin' => $session_data['Super_Admin'],
		'Moderator' => $session_data['Moderator'],
		'DES' => $session_data['DES'],
		'DSAS' => $session_data['DSAS'],
		'HR' => $session_data['HR'],
		'A_First_Name' => $session_data['A_First_Name'],
		'A_Middle_Name' => $session_data['A_Middle_Name'],
		'A_Last_Name' => $session_data['A_Last_Name'],
		'admin_logged_in' => "1"
						   );
		$this->session->set_userdata($sess_data);	
	}
	public function jumpcheck(){
		
		
		$adminget = $this->session->userdata('admin_logged_in');
		if($adminget == 1){
			$check = "1";
			}
		else{ $check = "0"; }
			
			return $check;
		}
		
		
	public function TimeOut(){
		
		
		
		$adminget = $this->session->userdata('admin_logged_in');
		$ID = $this->session->userdata('ID');
		$timesql = "UPDATE admin_accounts SET Time_Out=Now() WHERE ID='$ID'";	
		$set_time_in = $this->db->query($timesql);
	}
	
	public function register(){
		
		$power = $this->session->userdata('Super_Admin');
		$fname_A = $this->input->post('fname_A');
		$mname_A = $this->input->post('mname_A');
		$lname_A = $this->input->post('lname_A');
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		$type = $this->input->post('type');
		
		if($power == 1){
			
		if($fname_A == ""){
			$msg = "<h3 style='color:#f00;'>No Firstname input</h3>";
			echo $msg;
			}
		else if($mname_A == ""){
			$msg = "<h3 style='color:#f00;'>No Middlename input</h3>";
			echo $msg;
			}
		else if($lname_A == ""){
			$msg = "<h3 style='color:#f00;'>No Lastname input</h3>";
			echo $msg;
			}
		else if($pass1 == ""){
			$msg = "<h3 style='color:#f00;'>No Password input</h3>";
			echo $msg;
			}
		else if($pass2 == ""){
			$msg = "<h3 style='color:#f00;'>Retype password</h3>";
			echo $msg;
			}
		else if($pass2 != $pass1){
			$msg = "<h3 style='color:#f00;'>Password did not match</h3>";
			echo $msg;
			}
		else if($type == ""){
			$msg = "<h3 style='color:#f00;'>Choose Admin type</h3>";
			echo $msg;
			}
		else{
			
			if($type == "sup"){
				$sup = 1;
				$mod = "";
			}
			else if($type == "mod")
			{
				$sup = "";
				$mod = 1;
			}
			else{
				$sup = "";
				$mod = "";
				}
		
			$sql = "INSERT INTO admin_accounts (First_Name,Middle_Name,Last_Name,Password,Super_Admin,Moderator)
VALUES ('$fname_A','$mname_A','$lname_A','$pass1','$sup','$mod');";
			$register = $this->db->query($sql);

			$msg = "<h3 style='color:#666;'>Registered! See the admin account list to identify the ID</h3>";
			echo $msg;
			}
			
		}else{
			$msg = "You are not authorized to access this feature.";
			echo $msg;
			}
		$session = array( 'reg_msg' => $msg);
		$this->session->set_userdata($session);
	}
	
}

?>