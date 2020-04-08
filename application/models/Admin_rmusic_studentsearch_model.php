<?php


class Admin_rmusic_studentsearch_model extends CI_Model{
	

	// STUDENT
	public function searchstudent()
	{
		  	$Eval_assign_id = $_POST['get_eval_assign_id'];
			$get_legend = "SELECT * FROM `iee_evaluation_legend`";
	    	$legend_result = $this->db->query($get_legend);
		    $Output = '';
		    $count = 1;

         // echo $Eval_assign_id;
		
	    //CHECK SY AND SEM
		if($legend_result->num_rows() > 0){
			
			//echo 'legend_result good <br>';
			$legend_row = $legend_result->row();
			$lg_sy = $legend_row->gradingschoolyear;
			$lg_sem = $legend_row->gradingsemester;	
		
		}//CHECK SY AND SEM

          
            $sql = "SELECT * FROM `iee_evaluation_assign_table` AS A 
                   INNER JOIN (SELECT * FROM `iee_evaluation_table`)
                   AS B ON `B`.`Evaluation_id` = `A`.`Evaluation_id`
                   WHERE `A`.`eval_assign` = '$Eval_assign_id'";
	       $result = $this->db->query($sql);


	         foreach($result->result_array() as $row){  
	                      $getEvalid = $row['evaluation_id']; 

         
	
		$get_allresult =
		 " SELECT * FROM `iee_evaluation_result`
		       WHERE `acad_year` = '$lg_sy'
		       AND `sem` = '$lg_sem'
		       AND `Evaluation_id`='$getEvalid'
		       AND `student_number`!= '-1'
		       AND `student_number`!= '0'
		       GROUP BY student_number
	
		   ";
		$result = $this->db->query($get_allresult);



		 $Output.='
            <div class="row">
              <div class="col-md-6">
              <h4 class="acad_year">Academic Year: <span class="acad_label"> '.$lg_sy.'</span></h4>
              </div>
              <div class="col-md-6">
                <h4 class="sem">Semester: <span class="acad_label">'.$lg_sem.'</span> </h4>	
              </div>
            </div>
            <br>
		 	
		         
		  
	        <h4 class="pull-right" id="no_evaluator"> Number of Evaluators:<span class="result_label"> '.$result->num_rows().'</span> </h4>

		 ';

		foreach($result->result_array() as $row){
		 $Output .= '<tr>';
		 $Output .= '<td class="number">'.$count.'</td>';
		 $Output .= '<td >'.$row['student_number'].'</td>';
	     $count = $count + 1;
		}//	foreach($result->result_array() as $row){
		
		}
			return $Output; 
	
	}


}
?>