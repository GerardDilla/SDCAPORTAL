<?php


class Grades_model extends CI_Model{
	
	public function getSY(){
		
		$Student_Number = $this->session->userdata('Student_Number');
		
		$SYsql = "SELECT * FROM Grading WHERE Student_Number='$Student_Number' GROUP BY School_Year DESC";
		
		$result = $this->db->query($SYsql);
		
		
		if($result->num_rows() != 0){
			
		$Output = '<option style="color:#CCC">Select Academic Year:</option>';
		
		foreach($result->result_array() as $row){

		$Output .= '<option>'.$row['School_Year'].'</option>';
		
		}
		}else{
			
			$Output = '<option style="color:#CCC">You have no data yet. Proceed to Helpdesk if there are concerns</option>';
			
			}
		
		return $Output;
		
		}
		
	public function getSem(){
		
		$q = $_REQUEST["q"];
		$SN = $this->session->userdata('Student_Number');
		$sql = "SELECT Semester FROM Grading WHERE Student_Number='$SN' AND School_Year = '$q' GROUP BY Semester DESC";
		$result = $this->db->query($sql);
		
		echo '<select class="form-control" name="getSEM" id="sel2">';
		foreach($result->result_array() as $row){
		echo "<option>".$row['Semester']."</option>";
		}
		echo "</select>";
		
    }
	public function getGrades(){
		
		$Student_Number = $this->session->userdata('Student_Number');
		$Sem = $this->input->post('getSEM');
		$SY = $this->input->post('getSY');
		$Output = '';
		
		if(isset($Sem) && isset($SY)){
		
				$sql = 
				"
				
				SELECT A.Subject_Code,A.Final_Grade,A.Semester,A.School_Year,B.Course_Code,B.Course_Title,B.Course_Lab_Unit,B.Course_Lec_Unit,C.Remarks
							FROM Grading AS A
							JOIN `Subject` AS B
							ON A.Subject_Code=B.Course_Code
							JOIN Remarks AS C
							ON A.Remarks_ID=C.Remarks_ID
							WHERE A.Student_Number = '$Student_Number'
							AND A.School_Year = '$SY'
							AND A.Semester = '$Sem'
				
				";
				
				
				$result = $this->db->query($sql);
				
				if($result->num_rows() > 0){
						
						
						 $Output .= 
						 '
						 
						 <div style="text-align:center; margin-bottom:40px; min-width:250px; overflow:auto;">
						 <h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;"> School year:'.$SY.'                         </br></br> Semester:'.$Sem.'</h4>
						 </div>
						 
						 ';
						 
						 $Output .= 
						 '
						 
						  <table class="table table-striped" style="color:#666">
							 <thead>
							  <tr>
								<th>Subject Code</th>
								<th>Description</th>
								<th>Lecture Unit</th>
								<th>Lab Unit</th>
								<th>Final Grade</th>
								<th>Remark</th>
							  </tr>
							</thead>
						 
							<tbody>
						 
						 ';
						
						
						foreach($result->result_array() as $row){
				
						 $RC = $row['Final_Grade'];
						 $SC = $row['Subject_Code'];
						 $Remarks = $row['Remarks'];
					 
						 $Output .= '<tr>';
						 $Output .= '<td>'.$row['Subject_Code'].'</td>';
						 $Output .= '<td>'.$row['Course_Title'].'</td>';
						 $Output .= '<td>'.$row['Course_Lec_Unit'].'</td>';
						 $Output .= '<td>'.$row['Course_Lab_Unit'].'</td>';
						 $Output .= '<td>'.$row['Final_Grade'].'</td>';
						 $Output .= '<td>'.$Remarks.'</td>';
						 $Output .= '</tr>';
						 
				
						 }
						 
						 $Output .= 
						 '
						 
							 </tbody>
						  </table>
						 
						 ';
				}else{
					
					
					$Output .= "<h3>No records yet.</h3></br>";
					
					
					}
		}
		return $Output;
		
		}
		
		
	public function AllGrades(){
		
		
		$SN = $this->session->userdata('Student_Number');
		$Output = '';
				$syQ = "SELECT School_Year FROM Grading WHERE Student_Number = '$SN' GROUP BY School_Year DESC";
				$sySql = $this->db->query($syQ);
				
				if($sySql->num_rows() != 0){
					
					foreach($sySql->result_array() as $row){
						
						$SY = $row['School_Year'];
						$semQ = "SELECT * FROM Grading WHERE Student_Number = '$SN' AND School_Year = '$SY' GROUP BY Semester DESC";
						$semSql = $this->db->query($semQ);
						
						foreach($semSql->result_array() as $row2){
						
						$SEM = $row2['Semester'];
						$grdQ = "SELECT * FROM Grading WHERE Student_Number = '$SN' AND School_Year = '$SY' AND Semester ='$SEM'";
						$grdSql = $this->db->query($grdQ);
						
						$Output .= "<hr/>";
						$Output .= "<h5 style='font-family:Verdana, Geneva, sans-serif; color:#666;'>School year: ".$SY." </br></br>Semester: ".$SEM." </h5></br>";
						$Output .= "<table style='color:#666' class='table table-striped'>";
						$Output .= "<thead>";
						$Output .= "<tr>";
						$Output .= "<th>Subject Code</th>";
						$Output .= "<th>Description</th>";
						$Output .= "<th>Final Grade</th>";
						$Output .= "<th>Remark</th>";
						$Output .= "</tr>";
						$Output .= "</thead>";
						
						$Output .= "<tbody>";
						
						foreach($grdSql->result_array() as $row3){
							
							$SC = $row3['Subject_Code'];
							$descQ = "SELECT * FROM Subject WHERE Course_Code = '$SC'";
							$descSql = $this->db->query($descQ);
							
							if($descSql->num_rows() > 0){
							
							$descRow = $descSql->row();
							$desc = $descRow->Course_Title;
							
							}else{
								
								$desc = "";
								
								}
							
						if($row3['Final_Grade'] >= 75){$Rmrks = "Passed";}else{$Rmrks = "Failed";}
							
						$Output .= "<tr>";
						$Output .= "<td>".$row3['Subject_Code']."</td>";
						$Output .= "<td>".$desc."</td>";
						$Output .= "<td>".$row3['Final_Grade']."</td>";
						$Output .= "<td>".$Rmrks."</td>";
						$Output .= "</tr>";
						
						
						}
						
						$Output .= "</tbody>";
						
						$Output .= "</table>";
						$Output .= "</br><hr/></br>";
						
						}
						
						}
					
					}else{
						
						$Output .= "<h4 style='color:#666'>No Data</h4>";
						
						}
				
						return $Output;
		}
	

}

?>