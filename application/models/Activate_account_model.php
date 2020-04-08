<?php


class Activate_account_model extends CI_Model{
	

	public function activate_portal($sn,$rn,$em){

		$data = array(
			'Student_Number' => $sn,
			'Reference_Number' => $rn,
			'Email' => $em,
			'Password' => $sn,

		);
		
		if($this->db->insert('highered_accounts', $data)){
			return true;
		}
		else{
			return false;
		}

	}
			public function Form()
			{
				
					$Output ="";
					$Output .= $this->Reg_form();
					return $Output;
				
			}
			public function Confirmation()
			{
				
				$act_sn = $this->input->post('act_sn');
				$act_sn = str_replace("'","\&#39;",$act_sn);
				$act_sn = stripslashes($act_sn);
				
				$Or_number = $this->input->post('Or_number');
				$Or_number = str_replace("'","\&#39;",$Or_number);
				$Or_number = stripslashes($Or_number);
				
				$act_pass1 = $this->input->post('act_pass1');
				$act_pass1 = str_replace("'","\&#39;",$act_pass1);
				$act_pass1 = stripslashes($act_pass1);
				
				$act_pass2 = $this->input->post('act_pass2');
				$act_pass2 = str_replace("'","\&#39;",$act_pass2);
				$act_pass2 = stripslashes($act_pass2);
				
				$captcha = $this->input->post('g-recaptcha-response');
				
				$Output = "";
				
				if(empty($captcha)){
					
					$Output .= "<h4 style='color:#cc0000'>Invalid captcha, please try again</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Activate_Account' style='font-size:15px; color:#00F;'>Back</a>";
					
					}
				else if(empty($act_sn)){
					
					$Output .= "<h4 style='color:#cc0000'>You didn't put a student number</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Activate_Account' style='font-size:15px; color:#00F;'>Back</a>";
					
				}
				else if(empty($Or_number)){
					
					$Output .= "<h4 style='color:#cc0000'>You didn't put an OR number</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Activate_Account' style='font-size:15px; color:#00F;'>Back</a>";
				}
				else if(empty($act_pass1)){
					
					$Output .= "<h4 style='color:#cc0000'>You didn't put a Password</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Activate_Account' style='font-size:15px; color:#00F;'>Back</a>";
				}
				else if(empty($act_pass2)){
					
					$Output .= "<h4 style='color:#cc0000'>You didn't put a Password</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Activate_Account' style='font-size:15px; color:#00F;'>Back</a>";
				}
				else if($act_pass1 != $act_pass2 && $act_pass2 != $act_pass1){
					
					$Output .= "<h4 style='color:#cc0000'>You didn't put a Password</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Activate_Account' style='font-size:15px; color:#00F;'>Back</a>";
				}
				else{
						
						$sql = "
						
						SELECT Student_Info.Reference_Number, Student_Info.Student_Number, get_Enrolled_Payments.OR_Number FROM Student_Info INNER JOIN get_Enrolled_Payments ON Student_Info.Reference_Number = get_Enrolled_Payments.Reference_Number WHERE Student_Info.Student_Number = '$act_sn' AND OR_Number LIKE '%$Or_number%' LIMIT 1
						
						";
						
						
						$result = $this->db->query($sql);
						
						if($result->num_rows() > 0){
							
							//Enrolled
							$row = $result->row();
							$RN = $row->Reference_Number;
							echo $RN;
							
							$sql = "SELECT * FROM highered_accounts WHERE Reference_Number = '$RN' AND Active='1' LIMIT 1";
							$result = $this->db->query($sql);
							
							if($result->num_rows() > 0){
								
								
								//account available, end process
								$Output .= "<h3>There's already a account that has this student number.</h3><br>";
								$Output .= "Proceed to our <a href='#' style='font-size:10px;'>Helpdesk</a> if there are any concerns";
								
								
								}
							else{
								
								//no account, create account
								$Output .= "<h3>You have activated your account!</h3><br>";
								$sql2 = "
								
								INSERT INTO highered_accounts (Reference_Number, Password)VALUES ('$RN','$act_pass1')
								
								";
								$result = $this->db->query($sql2);
								}
							
							}
						else{
							
							
							
							//Not enrolled
							$Output .= "<h3>The data you entered was unrecognized, the following are the possible reasons:</h3><br>";
							$Output .= "<ul>";
							$Output .= "<li>Typographical error</li>";
							$Output .= "<li>Not Enrolled yet</li>";
							$Output .= "</ul>";
							$Output .= "Proceed to our <a href='#'>Helpdesk</a> if there are any concerns<br>";
							
							
							}
					
					
					}
				return $Output;
				
			}
			
			
			
			
			
			private function Reg_form(){
					
					$sendmail = '
					
						<form id="regform" action="'.base_url().'index.php/Activate_Account/confirm" method="post">
						  <div class="form-group">
							<label for="reset_student_no">Student Number:</label>
							<input id="act_sn" type="text" class="form-control" name="act_sn" data-validation="length alphanumeric" data-validation-length="min8">
						  </div>
						  <div class="form-group">
							<label for="reset_student_no">OR Number:</label>
							<input type="text" name="Or_number" id="Or_number"  class="form-control">
						  </div>
						  <div class="form-group">
							<label for="reset_student_no">Password:</label>
							<input type="password" name="act_pass1" id="act_pass1" class="form-control">
						  </div>
						  <div class="form-group">
							<label for="reset_student_no">Retype Password:</label>
							<input type="password" name="act_pass2"  id="act_pass2" class="form-control">
						  </div>
						
						<br>
						<div class="g-recaptcha" data-sitekey="6LeWcSQUAAAAAN0dGTGNeBZkICUKTIrPUDfTA1Gt" style="text-align:center"></div>
						<br>
						<button type="submit" class="btn btn-success center-block">Submit</button>
						</form>

				
					';
					
					
					return $sendmail;
				
					
				}
}
?>