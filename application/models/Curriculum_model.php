<?php


class Curriculum_model extends CI_Model{
	
	
	public function getlist(){
		
		
		
		$sql = "SELECT * FROM Programs GROUP BY Program_Name ASC";
		$result = $this->db->query($sql);
		$Output = "";
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
	
				  $Output .= '<option>'.$row['Program_Name'].'</option>';
			
				 }
		}else{
			
			      $Output .= '<option>No Result</option>';
			
			}
			
		return  $Output;
		
	}
	
	public function getcur(){
		
		
		$q = $_REQUEST["q"];
			$sql = 
			"
			SELECT Programs.Program_Name, Curriculum_Info.Curriculum_Name, Curriculum_Info.Program_Major, Curriculum.Year_Level, Curriculum.Course_Code, Curriculum.Course_Title FROM Programs INNER JOIN Curriculum_Info ON Programs.Program_ID = Curriculum_Info.Program_ID INNER JOIN Curriculum ON Curriculum_Info.Curriculum_ID = Curriculum.Curriculum_ID WHERE Programs.Program_Name = '$q' AND Curriculum.Valid = '1' ORDER BY Curriculum.Year_Level ASC
			
			";
			
			$result = $this->db->query($sql);
			
	
			echo "<div class='divprint'>";
			echo "<table class='table table-striped' style='color:#666'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Course Code</th>";
			echo "<th>Course Title</th>";
			echo "<th>Year</th>";
			echo "<th>Program</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			
			foreach($result->result_array() as $row){
			echo "<tr>";
			echo "<td>".$row['Course_Code']."</td>";
			echo "<td>".$row['Course_Title']."</td>";
			echo "<td>".$row['Year_Level']."</td>";
			echo "<td>".$row['Program_Name']."</td>";
			echo "</tr>";
			}
			
			
			echo "</tbody>";
			echo "</table>";
			echo "</div>";
			echo '<button class="btn btn-success center-block" onclick="printpage()">Print</button>';
			
		
	}
		
}

?>