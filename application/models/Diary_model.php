<?php


class Diary_model extends CI_Model{
	

	public function  getlist(){
		
		$en_search = $this->input->post('en_search');
		$en_search = str_replace("'","\&#39;",$en_search);
		$en_search = stripslashes($en_search);
		$Output = "";
		
		if(isset($en_search)){
			
			$Stud = $this->session->userdata('Student_Number');
			$sql = "SELECT D_ID,Subject,Log_Date FROM student_diary WHERE Student_Number='$Stud' AND publish = '1' AND Subject LIKE '%$en_search%' ";
			$result = $this->db->query($sql);
			//echo "input";
		
		
		}else{
			
			$Stud = $this->session->userdata('Student_Number');
			$sql = "SELECT D_ID,Subject,Log_Date FROM student_diary WHERE Student_Number='$Stud' AND publish = '1'";
			$result = $this->db->query($sql);
			//echo "no input";
		
			
			}
				
				
				
				
				if($result->num_rows() > 0) {
				
					foreach($result->result_array() as $row){
								
							  $Output .= '
							  <li><p style="margin:0px; margin-left:50px; border-left: 2px solid #ffaa9f;" > '.$row['Subject'].'
							  <button type="button" value="'.$row['D_ID'].'" class="btn"style="float:right; margin:10px; "onClick="showCustomer(this.value)" >
							  <span class="glyphicon glyphicon-eye-open"></span></button>
							  </p>
							  </li>
							  
							  ';
					}
				
				}
				else
				{
					
					 $Output .= '
							  <li>
							  <h5>No Result</h5>
							  </li>
							  
							  ';
					
					
				}
				
		return $Output;
		
		}
		
		
	public function newEntry(){
		
		$subject = $this->input->post('subj');
		$en_date = $this->input->post('en_date');
		$en_cont = $this->input->post('en_cont');
		$Stud = $this->session->userdata('Student_Number');
		echo $subject;
		echo $en_date;
		echo $en_cont;
		$en_cont = str_replace("'","\&#39;",$en_cont);
		$subject = str_replace("'","\&#39;",$subject);
		$subject = stripslashes($subject);
		$en_cont = stripslashes($en_cont);
		
		
	
		
		if(!isset($subject)){
			
			$msg = "<span style='color:#f00'>Please input Entry Subject</span>";
			
			}
		else if(!isset($en_date)){
			
			$msg = "<span style='color:#f00'>Please input Date Content</span>";
			
			}
		else if(!isset($en_cont)){
			
			$msg = "<span style='color:#f00'>Please input Entry Content</span>";
			
			}
		else{
			
		$sql = "INSERT INTO student_diary (Student_Number,Subject,Log_Date,Content,publish) VALUES ('$Stud','$subject','$en_date','$en_cont','1')";
		$result = $this->db->query($sql);
			
			
			$msg = "<span style='color:#666'>Entry Saved!</span>";
		}
		
		$ses = array( 'en_msg' => $msg );
		$this->session->set_userdata($ses);
		
		}
	public function edit(){
		
		$subj_edit = $this->input->post('subj_edit');
		$en_date_edit = $this->input->post('en_date_edit');
		$id_edit = $this->input->post('id_edit');
		$entry_edit = $this->input->post('entry_edit');
		$Stud = $this->session->userdata('Student_Number');
		
		$entry_edit = str_replace("'","\&#39;",$entry_edit);
		$subj_edit = str_replace("'","\&#39;",$subj_edit);
		$entry_edit = stripslashes($entry_edit);
		$subj_edit = stripslashes($subj_edit);
		
		
		
		
		if($subj_edit == ""){
			
			$msg = "<span style='color:#f00'>Please input Entry Subject</span>";
			
			}
		else if($en_date_edit == ""){
			
			$msg = "<span style='color:#f00'>Please input Date Content</span>";
			
			}
		else if($entry_edit == ""){
			
			$msg = "<span style='color:#f00'>Please input Entry Content</span>";
			
			}
		else{
			
			$sql = "UPDATE student_diary SET Subject='{$subj_edit}',Log_Date='{$en_date_edit}', Content='{$entry_edit}' WHERE D_ID='$id_edit'";
		    $result = $this->db->query($sql);
			
			
			$msg = "<span style='color:#666'>Entry Updated!</span>";
			}
			$ses = array( 'en_msg' => $msg );
			$this->session->set_userdata($ses);
			
		
		
		}
		public function delete(){
			
			$id_del = $this->input->post('id_del');
			if($id_del == ""){
				$msg = "<span style='color:#666'>An Error occured</span>";
				}else{
		
			$sql = "UPDATE student_diary SET publish = '0' WHERE D_ID ='$id_del'";
			$result = $this->db->query($sql);
			
			$msg = "<span style='color:#666'>Entry Deleted</span>";
				}
			$ses = array( 'en_msg' => $msg );
			$this->session->set_userdata($ses);
			
			}
		public function load(){
			
			$SN = $this->session->userdata('Student_Number');
			$q = $_REQUEST["q"];
			$en_sql = "SELECT D_ID,Subject,Log_Date ,Content FROM student_diary WHERE Student_Number = '$SN' AND D_ID = '$q'";
			$en_result = $this->db->query($en_sql);
			if($en_result->num_rows() == 0)
			{
				echo "";
				}else{
			$en_row = $en_result->row();
			$sub_load = $en_row->Subject;
			$date_load = $en_row->Log_Date;
			$cont_load = $en_row->Content;
			$id_load = $en_row->D_ID;
	
			echo "<h3><strong><input type='text' id='subj_load' value='".$sub_load."' readonly style='border:none; width:100%;'></strong></h3>";
			echo "<h4><input type='text' id='date_load' value='".$date_load."' readonly style='border:none'></h4><hr/></br></br>";
			echo "<input type='hidden' id='cont_load' value='".$cont_load."' readonly>";
			echo "<input type='hidden' id='id_load' value='".$id_load."' readonly>";
			echo $cont_load;
			}
			
			
			}


}
?>