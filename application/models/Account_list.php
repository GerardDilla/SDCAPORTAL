<?php


class Account_list extends CI_Model{
	

	
	public function P_reset()
	{
		$ID = $this->input->post('R_PASS');
		//$findStudentNo = "SELECT * FROM Student_Info WHERE Reference_Number='$ID'";
		//$getSN = $this->db->query($findStudentNo);
		//$row = $getSN->row();
		//$SN = $row->Student_Number;
		$sql = "UPDATE highered_accounts SET Password='{$ID}' WHERE Student_Number='{$ID}'";
		$result = $this->db->query($sql);
		$Msg = array(
						 'msg' => 'Password reset successful!'
					);
		$this->session->set_userdata($Msg);
		
	}
	public function profile_modal()
	{
		
		//AJAX 
		$q = $_REQUEST["q"];
		
		$sql = "SELECT Account_picture FROM highered_accounts WHERE Reference_Number='$q'";
		$result = $this->db->query($sql);
		
		if($result->num_rows() != 0){
			
			$row = $result->row();
			
			$picture = $row->Account_picture;
			
			echo '<img src="'.base_url().'Profile/'.$picture.'" width="100%"/>';
			
			
			}else{
				
				echo '<img src="'.base_url().'Profile/default.png" width="100%"/>';
				
				}
	}
	public function E_reset()
	{
		
		$ID = $this->input->post('R_EML_ID');
		$EM = $this->input->post('R_EML');
		$sql = "UPDATE highered_accounts SET Email='$EM' WHERE Student_Number='{$ID}'";
		$result = $this->db->query($sql);
		$Msg = array(
						 'msg' => 'Email reset successful!'
					);
		$this->session->set_userdata($Msg);
		
	}
	public function pic_reset()
	{
		$ID = $this->input->post('R_PIC');
		$sql = "UPDATE highered_accounts SET Account_picture='default.png' WHERE Student_Number='{$ID}'";
		$result = $this->db->query($sql);
		$Msg = array(
						 'msg' => 'Picture reset successful!'
						 );
		
		$this->session->set_userdata($Msg);
		
	}
	public function admin_P_reset()
	{
	
		$ID = $this->input->post('A_P_reset');
		
		$sql = "UPDATE admin_accounts SET Password = '$ID' WHERE ID = '$ID'";
		$result = $this->db->query($sql);
		
		
		$Msg = array(
						 'a_p_msg' => "Done! Password will now be identical to the Account's Number"
						 );
		
		$this->session->set_userdata($Msg);
	
	}
	public function admin_deactivate()
	{
	
		$ID = $this->input->post('deactivate');
		
		$sql = "UPDATE admin_accounts SET active = '0' WHERE ID = '$ID'";
		$result = $this->db->query($sql);
		
		
		$Msg = array(
						 'a_p_msg' => "Account Deactivated"
						 );
		
		$this->session->set_userdata($Msg);
	
	}
	public function admin_account_search()
	{
	
			$this->load->library('pagination');
			$Output = "";
			$P_Active  = "";
			
			$id = $this->input->get('query');
			//echo $id;
			$this->db->like('First_Name', $id);
            $this->db->or_like('Student_Number', $id);
			$this->db->or_like('Last_Name', $id);
			$search = $this->db->get('Student_Info', 5, $this->uri->segment(3));
			
			$config['base_url'] = base_url()."index.php/administrator/account_search";
			$config['per_page'] = 5;
			$config['num_links'] = $search->num_rows()/5;
			$config['total_rows'] = $this->db->get('Student_Info')->num_rows();
			//$config['use_page_numbers'] = TRUE;
			//$config['page_query_string'] = TRUE;
			//$config['query_string_segment'] = 'offset';
			$config['reuse_query_string'] = TRUE;
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			
			if($search->num_rows() > 0){
				
					foreach($search->result_array() as $row){

					$this->db->where('Student_Number', $row['Student_Number']);
					$this->db->where('Active', '1');
					$query2 = $this->db->get('highered_accounts');
					if($query2->num_rows() >= 1){
						foreach($query2->result_array() as $row2){
							$P_Email = $row2['Email'];
						}
						$P_Active = "With Portal";
					}
					else{
						$P_Active = "
						
						<input type='hidden' name='activation_sn' value='".$row['Student_Number']."'>
						<input type='hidden' name='activation_rn' value='".$row['Reference_Number']."'>
						<button class='btn btn-success' type='submit'>Activate</button>

						";

						$P_Email = "
					
						<input type='email' required name='activation_em' placeholder='SDCA Email'>

						";

					}
					
					$Output .= "<tr>";
					$Output .= "<td>".$row['Student_Number']."</td>";
					$Output .= "<td>".$row['First_Name']."</td>";
					$Output .= "<td>".$row['Last_Name']."</td>";
					$Output .= "<input type='hidden' class='fname' value='".$row['First_Name']."' readonly>";
					
					$SN = $row['Student_Number'];
					$RF = $row['Reference_Number'];
					
					/*
					$sql = "
					
					SELECT * FROM highered_accounts AS A INNER JOIN highered_activity_log AS B ON A.HED_Account_ID = B.HED_Account_ID WHERE A.Reference_Number = '$RF' LIMIT 1
					
					";
					
					$result = $this->db->query($sql); */
					
					
					
					$Output	.= "<form action='".base_url()."index.php/Administrator/activate_portal' method='post'>";
					$Output .= "<td>".$P_Email."</td>";	
					$Output .= "<td>".$P_Active."</td>";
					$Output .= "<td><button type='button' class='btn btn-info' id='idholder' name='idholder' value='".$SN."' onclick='showpic(this.value)'><span class='glyphicon glyphicon-cog' /></button></td>";
					$Output .= "</form>";
					
					
					
					
					$Output .= "</tr>";
				
				
				}
				
			}
			else{
					
					$Output .= "<tr>";
					$Output .= "<td></td>";
					$Output .= "</tr>";
					
				
			}
			return $Output;
	}

	public function admin_moderator_list()
	{
		
		
			$this->load->library('pagination');
			$Output = "";
			$id = $this->input->get('admin_query');
			if(isset($id)){
				$this->db->where('active', '1');
				$this->db->like('First_Name', $id);
				$this->db->or_like('ID', $id);
				$this->db->or_like('Middle_Name', $id);
				$this->db->or_like('Last_Name', $id);
				
			}
			else
			{
				$this->db->where('active','1');
			}
			
			$search = $this->db->get('admin_accounts', 5, $this->uri->segment(3));
			
			$config['base_url'] = base_url()."index.php/administrator/admin_search";
			$config['per_page'] = 5;
			$config['num_links'] = $search->num_rows()/5;
			$config['total_rows'] = $this->db->get('admin_accounts')->num_rows();
			//$config['use_page_numbers'] = TRUE;
			//$config['page_query_string'] = TRUE;
			//$config['query_string_segment'] = 'offset';
			$config['reuse_query_string'] = TRUE;
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			
			if($search->num_rows() > 0){
				
				$Output .= 
						
						'
						 <table class="table table-striped" style="color:#666; font-size:16px; max-height:400px; overflow-y:auto;">
							<thead>
							  <tr>
							   <th>ID</th>
							   <th>Admin Type</th>
							   <th>Firstname</th>
							   <th>Lastname</th>
							   <th>Last Time-In</th>
							   <th>Last Time-out</th>
							   <th>Reset Password</th>
							   <th>Deactivate</th>
							 </tr>
							</thead>
							<tbody>
						
						';
						
				foreach($search->result_array() as $row){
				if($row['active'] == 1)
				{
					
					
				
						
	 			$Output .= '<tr>';
	  			
	  			$Output .= '<td>'.$row['ID'].'</td>';
				
				if($row['Super_Admin'] == 1){
					$Output .= '<td>Administrator</td>';
					}
				else if($row['Moderator'] == 1){
					$Output .= '<td>Moderator</td>';
					}
				else{
					$Output .= '<td>Undefined</td>';
					}
						
						
						$Output .= '<td>'.$row['First_Name'].'</td>';
						$Output .= '<td>'.$row['Last_Name'].'</td>';
						$Output .= '<td>'.$row['time_in'].'</td>';
						$Output .= '<td>'.$row['time_out'].'</td>';
						//echo '<td>'.$row['Active'].'</td>';
						//echo '<td><img id="pic" src='.base_url().'Profile/'.$row['Account_picture'].'></td>';
			  
						$Output .= '<form method="Post" action="'.site_url().'index.php/administrator/admin_p_reset">';
						$Output .= '<td><button class="btn btn-info glyphicon glyphicon-check" type="submit" style="width:50px" name="A_P_reset" value="'.$row['ID'].'"></button></td>';
						$Output .= '</form>';
						
						$Output .= '<form method="Post" action="'.site_url().'index.php/administrator/deactivate_admin">';
						$Output .= '<td><button class="btn btn-danger glyphicon glyphicon-remove" type="submit" style="width:50px" name="deactivate" value="'.$row['ID'].'"></button></td>';
						$Output .= '</form>';
						
						$Output .= '</tr>';
						
						
						
				
				
				   }
				}
				
				$Output .= 
						
						'
						 </tbody>
    					 </table>
						 <div class="pagination" id="pagination">'.$this->pagination->create_links().'</div>
						';
		
			}else{
				
					$Output .= '<h3>No Result</h3>';
				
				}
			return $Output;
			
		}
	
	public function registered_accounts_all()
	{	
		$this->db->select('SUBSTRING(A.Student_Number,1,4) AS AdmittedDate', false);
		$this->db->select('
		A.Student_Number,
		B.First_Name,
		B.Middle_Name,
		B.Last_Name
		');
		$this->db->join('Student_Info AS B','A.Student_Number = B.Student_Number');
		$this->db->where('A.Student_Number <>','0');
		//$this->db->where('A.Active', '1');
		$this->db->group_by('A.Student_Number');
		$this->db->order_by('A.Student_Number','DESC');
		$query = $this->db->get('highered_accounts AS A');
		return $query;
	}
	public function registered_accounts_range($range1,$range2)
	{	
		$this->db->select('SUBSTRING(A.Student_Number,1,4) AS AdmittedDate', false);
		$this->db->select('
		A.Student_Number,
		B.First_Name,
		B.Middle_Name,
		B.Last_Name
		');
		$this->db->join('Student_Info AS B','A.Student_Number = B.Student_Number');
		$this->db->where('A.Student_Number <>','0');
		$this->db->where('SUBSTRING(A.Student_Number,1,4) BETWEEN '.$range1.' AND '.$range2.'','', false);
		$this->db->group_by('A.Student_Number');
		$this->db->order_by('A.Student_Number','DESC');
		$query = $this->db->get('highered_accounts AS A');
		return $query;
	}
	public function registered_accounts_specific($specific)
	{	
		$this->db->select('SUBSTRING(A.Student_Number,1,4) AS AdmittedDate', false);
		$this->db->select('
		A.Student_Number,
		B.First_Name,
		B.Middle_Name,
		B.Last_Name
		');
		$this->db->join('Student_Info AS B','A.Student_Number = B.Student_Number');
		$this->db->where('A.Student_Number <>','0');
		$this->db->where('SUBSTRING(A.Student_Number,1,4)',$specific, false);
		$this->db->group_by('A.Student_Number');
		$this->db->order_by('A.Student_Number','DESC');
		$query = $this->db->get('highered_accounts AS A');
		return $query;
	}
	
}

?>