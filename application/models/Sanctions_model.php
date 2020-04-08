<?php


class Sanctions_model extends CI_Model{
	
	public function getlist(){
		
		$Student_Number = $this->session->userdata('Student_Number');
		$sql = "SELECT * FROM violations_table WHERE violations_student_number='$Student_Number' ORDER BY violations_date DESC";
		$result = $this->db->query($sql);
		
		$Output = "";
		if($result->num_rows() == 0){
			
			$Output .= "<h2>You have no records yet.</h2><br/>";
			$Output .= "Please visit the SDCA <a style='color:#00F' href='#'> Helpdesk </a> if there are any concerns, Thank you!";
			}
		else{
				
			  $Output .= '<table class="table table-striped" style="color:#666">';
			  $Output .= '<thead>';
			  $Output .= '<tr>';
			  $Output .= '<th>Violation</th>';
			  $Output .= '<th>Date Given</th>';
			  $Output .= '<th>Time Given</th>';
			  $Output .= '<th>Status</th>';
			  $Output .= '<th></th>';
			  $Output .= '</tr>';
			  $Output .= '</thead>';
			  $Output .= '<tbody>';
				
			  foreach($result->result_array() as $row){
				
				$Output .= "<tr>";
				$Output .= "<td>".$row['violations_violation']."</td>";
				$Output .= "<td>".$row['violations_date']."</td>";
				$Output .= "<td>".$row['violations_time']."</td>";
				$Output .= "<td>".$row['violations_status']."</td>";
				$Output .= "</tr>";
				
			  }
			  
			  $Output .= '</tbody>';
			  $Output .= '</table>';
			
				
				
				
				
			}
				
				return $Output;
				}
	
}

?>