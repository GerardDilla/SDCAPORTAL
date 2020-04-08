<?php


class Admin_student_hr_model extends CI_Model{
	
	
	
             public function getstudentstatus(){  
	   
	     	$get_legend = "Select * FROM ie_legend";
	    	$legend_result = $this->db->query($get_legend);
		    $Output = '';
		    $count = 1;


		
	    //CHECK SY AND SEM
		if($legend_result->num_rows() > 0){
			
			//echo 'legend_result good <br>';
			$legend_row = $legend_result->row();
			$lg_sy = $legend_row->gradingschoolyear;
			$lg_sem = $legend_row->gradingsemester;	
		
		}//CHECK SY AND SEM
		

		    $get_allresult =
		     " SELECT A.id,A.Reference_Number,A.student_number,B.Student_Number,B.First_Name,B.Last_Name
		       FROM ie_evaluationresult 
		       AS A 
		       JOIN Student_Info 
		       AS B 
		       ON A. student_number = B.Student_Number  
		       WHERE A.Semester = '$lg_sem' 
		       GROUP BY A.student_number";
		     $resulttest = $this->db->query($get_allresult);
			 
			  $GetStudentsInfo =
		     " SELECT * FROM ie_evaluationresult WHERE Semester = '$lg_sem'  GROUP BY Reference_Number";
		     $resulttest1 = $this->db->query($GetStudentsInfo);
		

		 $Output.='
             <div class="row">
                 <div class="col-md-6">
		 	      <h4 class="acad_year">School Year: <span class="acad_label">'.$lg_sy.'</span></h4>
		       	  </div>    
		         <div class="col-md-6">  
		             <h4 class="sem">Semester: <span class="acad_label">'.$lg_sem.'</span> </h4>
			     </div>
			  </div>
	        <h4 id="no_evaluator"> Number of Evaluators:<span class="number"> '.$resulttest->num_rows().'</span> </h4>

		 ';

		     $ID = $this->input->post('studentnumber');
			 $ID1 = $this->input->post('name');
			 $ID2 = $this->input->post('course');

		 $get_allresult =
		 " SELECT * FROM ie_evaluationresult AS A JOIN Student_Info AS B ON A.student_number = B.Student_Number WHERE  A.Semester = '$lg_sem' AND  B.Student_Number LIKE '%$ID%' AND  B.Last_Name LIKE '%$ID1%' AND B.Course LIKE '%$ID2%' GROUP BY A.student_number ORDER BY B.Course DESC,B.Last_Name DESC";
		$result = $this->db->query($get_allresult);

	
		foreach($result->result_array() as $row){
		 $Output .= '<tr>';
		 $Output .= '<td>'.$count.'</td>';
		 $Output .= '<td>'.$row['Student_Number'].'</td>';
		 $Output .= '<td>'.$row['Last_Name'].' , '.$row['First_Name'].' &nbsp; '.$row['Middle_Name'].' </td>';
		 $Output .= '<td>'.$row['Course'].'</td>';
		 $Output .= '</tr>';
	     $count = $count + 1;
		}//	foreach($result->result_array() as $row){
		
		
			return $Output; 
		
	   }//public function getstudentstatus
	

}
  
?>
