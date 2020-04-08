<?php


class Reset_password_model extends CI_Model{
	

	
			public function Form()
			{
				
					$Output ="";
					$Output .= $this->Send_email();
					$ip = $this->input->ip_address();
					
				
					return $Output;
				
			}
			public function Confirmation()
			{
				
				$input = $this->input->post('reset_student_no');
				$input = str_replace("'","\&#39;",$input);
				$input = stripslashes($input);
				$captcha = $this->input->post('g-recaptcha-response');
				$Output = "";
				if(empty($captcha)){
					
					$Output .= "<h4 style='color:#cc0000'>Invalid captcha, please try again</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Student/Reset_password' style='font-size:15px; color:#00F;'>Back</a>";
					
					}
				else if(!empty($input)){
					
					
					$sql = "SELECT * FROM Student_Info WHERE Student_Number='$input' LIMIT 1";
					$result = $this->db->query($sql);
					
					if($result->num_rows() > 0){
							
							$row = $result->row();
							$email = $row->Email;
							$RN = $row->Reference_Number;
							
							$RN_sess = array(
							
								"reset_rn" => $RN
							
							);
							
							$this->session->set_userdata($RN_sess);
							$reset_rn = $this->session->userdata('reset_rn');
							
							$sql2 = "SELECT * FROM highered_accounts WHERE Reference_Number='$RN' LIMIT 1";
							$result2 = $this->db->query($sql2);
							 
							if($result2->num_rows() > 0){  
							 	
								if(empty($email)){
									
									$Output .= "<h4>This student number does not seem to have an email yet.</h4>";
									$Output .= "<br><br>To address this issue, please proceed to the MIS Office <br><br>";
									
									
								}
								else
								{
									$code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
									
									$sql3 = "UPDATE highered_accounts SET Restore_Code='$code' WHERE Reference_Number='$RN'";
									$result3 = $this->db->query($sql3);
									
									//MAIL
									//$config['protocol'] = 'smtp';
									//$config['smtp_host'] = 'smtp.googlemail.com';
									//$config['smtp_port'] = '587';
									//$config['smtp_crypto'] = 'tls';
									//$config['smtp_user'] = 'no-reply@sdca.edu.ph';
									//$config['smtp_pass'] = 'sdca1234';
									$config['smtp_user'] = 'gerarddilla@gmail.com';
									$config['smtp_pass'] = 'owlman20';
									
									$this->load->library('email', $config);
									$this->email->set_newline("\r\n");
									
									$this->email->from('gerarddilla@gmail.com', 'SDCA Portal');
									
									if(filter_var($email, FILTER_VALIDATE_EMAIL)){
									
										$this->email->to('gerarddilla@gmail.com');
										$this->email->subject('SDCA Portal Support');
										$this->email->message('Your reset code is: '.$code.'');
										
										if($this->email->send()){
				
											$Output .= 'The Confirmation code is sent to: '.$email.'';
											$Output .= '<br><br>';
											$Output .= $this->confirmation_form();
										
										
										}
										else
										{
											
											$Output .= "<h4>There was a problem with sending an email.</h4>";
											$Output .= "<br><br>For any concerns, proceed to our <a href='#' style='font-size:15px; color:#00F;'>Helpdesk</a> or the MIS Office.";
											
										}
											
										
									
									}
									else{
										
										$Output .= "<h4>This student number does not seem to have an email yet.</h4>";
										$Output .= "<br><br>To address this issue, please proceed to the MIS Office <br><br>";
										
										}
									

									//MAIL
									
									
								}
								
								
							}else{
								
								$Output .= "<h4>This student number does not have a account yet.</h4>";
								$Output .= "<br><br>Please read our guide on how to register your student number <a href='".base_url()."' style='font-size:15px; color:#00F;'>here</a>";
								
								}
						
						}else{
							
								$Output .= "<h4>Student number not found</h4>";
								$Output .= "<br><br><a href='".base_url()."index.php/Student/Reset_password' style='font-size:15px; color:#00F;'>Back</a>";
							
							}
					
					
				}else{
					
					$Output .= "<h4 style='color:#cc0000'>No student number input</h4>";
					$Output .= "<br><br><a href='".base_url()."index.php/Student/Reset_password' style='font-size:15px; color:#00F;'>Back</a>";
					
					}
				return $Output;
				
			}
			
			public function Change_Password(){
				
				$code = $this->input->post('confirm_code');
				$code = str_replace("'","\&#39;",$code);
				$code = stripslashes($code);
				
				$reset_rn = $this->session->userdata('reset_rn');
				
				$Output = "";
				if(!empty($code)){
						
						$sql = "SELECT * FROM highered_accounts WHERE Restore_Code = '$code' AND Reference_Number = '$reset_rn' LIMIT 1";
						$result = $this->db->query($sql);
						
						if($result->num_rows() > 0){
							
								
								$Output .= $this->reset_form();
							
						}
						else
						{
							
								$Output .= "<h3>The confirmation code was incorrect.</h3>"; 
							
						}
					
					
					}
					else
					{
						
						$Output .= "<h3>You didn't put a confirmation code.</h3>"; 
						
					}
					return $Output;
				
			}
			public function Reset(){
				
				
					$first_pass = $this->input->post('first_pass');
					$first_pass = str_replace("'","\&#39;",$first_pass);
					$first_pass = stripslashes($first_pass);
					
					$second_pass = $this->input->post('second_pass');
					$second_pass = str_replace("'","\&#39;",$second_pass);
					$second_pass = stripslashes($second_pass);
					
					$reset_rn = $this->session->userdata('reset_rn');
					
					$Output = "";
					if(empty($first_pass)){
						
						$Output .= $this->reset_form();
						
						$Output .= "<h3>No password input.</h3>";
						
						}
					else if(empty($second_pass)){
						
						$Output .= $this->reset_form();
						
						$Output .= "<h3>No password input.</h3>";
						
						}
					else if($first_pass == $second_pass && $second_pass == $first_pass){
						
						$sql = "UPDATE highered_accounts SET Password = '$second_pass' WHERE Reference_Number = '$reset_rn'";						
						$result = $this->db->query($sql);
						
						$Output .= "<h3>Reset successful!</h3><br>";
						$Output .= '<a href="'.base_url().'index.php/Student" style="color:blue; font-size:15px;">Home</a>';
						$this->session->unset_userdata('reset_rn'); 
						
						}
					else{
						
						$Output .= $this->reset_form();
						
						$Output .= "<h3>Password did not match.</h3>";
						
						}
					
					return $Output;
				
				}
			
			
			private function Send_email(){
					
					$sendmail = '
					
						<form action="'.base_url().'index.php/Student/Confirm_code" method="post">
						  <div class="form-group">
							<label for="reset_student_no">Student Number:</label>
							<input id="passcheck" type="text" name="reset_student_no" class="form-control" id="email" >
						  </div>
						
						
						<p style="color:#cc0000">A reset code will be sent to the email of the student number. For any concers, proceed to our <a href="#" style="font-size:15px; color:#00F;">Helpdesk</a> or the MIS Office.</p>
						<br>
						<div class="g-recaptcha" data-sitekey="6LeWcSQUAAAAAN0dGTGNeBZkICUKTIrPUDfTA1Gt" style="text-align:center"></div>
						<br>
						<button id="form_valid_button" type="submit" class="btn btn-success center-block">Submit</button>
						</form>
				
					';
					
					//If down for maintenance
					$unavailable = '
					
						<h3 style="color:#cc000">This feature is not temporarily not available.</h3>
				
					';
					
					
					return $sendmail;
				
					
				}
				
				
				
				
				
				
			private function confirmation_form(){
				
					$confirm = '
							
									<form action="'.base_url().'index.php/Student/Reset_Form" method="post">
									  <div class="form-group">
										<label for="reset_student_no">Confirm Code:</label>
										<input type="text" name="confirm_code" class="form-control" id="email">
									  </div>
									
									
									<p style="color:#cc0000">A reset code will be sent to the email of the student number. For any concers, proceed to our <a href="#" style="font-size:15px; color:#00F;">Helpdesk</a> or the MIS Office.</p>
									<br><br>
									
									
									
									
									<button type="submit" class="btn btn-success center-block">Submit</button>
									</form>
									
								';
				
					return $confirm;
				
			}
			
			
			
			private function reset_form(){
				
					$reset = '
							
									<form id="resetform" action="'.base_url().'index.php/Student/Reset" method="post">
									  <div class="form-group">
										<label for="reset_student_no">Password:</label>
										<input type="password" name="first_pass" id="first_pass" class="form-control" id="email">
									  </div>
									  <div class="form-group">
										<label for="reset_student_no">Retype Password:</label>
										<input type="password" name="second_pass" id="second_pass" class="form-control" id="email">
									  </div>
									
									<button type="submit" class="btn btn-success center-block">Submit</button>
									</form>
									
								';
				
					return $reset;
				
			}
				
			
}
?>