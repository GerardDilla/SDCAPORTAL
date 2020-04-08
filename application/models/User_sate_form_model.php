<?php


class User_sate_form_model extends CI_Model{
	
       public function getareas(){  
		$variable = $this->input->post('pogi');
	
		$asql = "SELECT * FROM ie_area WHERE active = '1' ORDER BY orderr ASC ";
		$result = $this->db->query($asql);
		$output = "";
		$count = 0;
		
	      //**************************OUTPUT NAME OF INSTRUCTOR****************************///
		  
		  
        		  if($result->num_rows() > 0 ){
		// echo "success";
	                	$output .= '
			 <form method="post" action="'.site_url().'index.php/Student/Fac_Eval_Insert">
			<p class="instructor" style="text-align: center; font-size: 30px;">'.$variable.'</p>
			   <hr />
             <p class="justify" style="font-size: 17px;" >One of the major responsibilities of SDCA is to promote high teaching standards among its faculty. Please take time to evaluate your professor and his/her teaching competencies.</p>
              <HR>
              <p class="justify" style="font-size: 17px;"><b>Direction:</b> Read the statement carefully. Choose the number per item that corresponds to your assessment.</p>
               <hr>
                <h3 class="panel-title text-center" style="font-size: 25px;">(5 - ALWAYS; 4 - OFTEN; 3 - SOMETIMES; RARELY - 2; NEVER - 1)</h3>
              </div>
		  
				  ';
		}else{
		//echo "fail";	
		
	            	$output .= '
			 <form method="post" action="'.site_url().'index.php/Student/Fac_Eval_Insert">
			<p class="instructor" style="text-align: center; font-size: 30px;"></p>
			   <hr />
             <p class="justify" style="font-size: 17px;" >One of the major responsibilities of SDCA is to promote high teaching standards among its faculty. Please take time to evaluate your professor and his/her teaching competencies.</p>
              <HR>
              <p class="justify" style="font-size: 17px;"><b>Direction:</b> Read the statement carefully. Choose the number per item that corresponds to your assessment.</p>
               <hr>
                <h3 class="panel-title text-center" style="font-size: 25px;">(5 - ALWAYS; 4 - OFTEN; 3 - SOMETIMES; RARELY - 2; NEVER - 1)</h3>
              </div>
		  
				  ';
		}
	      
          //**************************OUTPUT NAME OF INSTRUCTOR****************************///
				  		  
				  
		foreach($result->result_array() as $row){
		$value = $row['id'];		
		$bsql ="SELECT * FROM ie_area_description AS A JOIN ie_evaluation_type AS B ON A.evaluation_type_id = B.id WHERE A.area_id = '$value' ";	
	    $result1 = $this->db->query($bsql);
	    
	    $csql ="SELECT ratings FROM ie_criteria ORDER BY ratings DESC";	
	    $result2 = $this->db->query($csql);
		
		$dsql ="SELECT * FROM  ie_area_description  AS A JOIN ie_eval_scale AS B ON A.eval_id = B.id WHERE B.active = '1'";	
	    $result3 = $this->db->query($dsql);
		
		$esql =" SELECT * FROM ie_area_description AS A JOIN ie_evaluation_type AS B ON A.evaluation_type_id = B.id WHERE B.eval_type = 'Essay'";	
	    $result4 = $this->db->query($esql);
		
		$fsql =" SELECT * FROM ie_area_description AS A JOIN ie_evaluation_type AS B ON A.evaluation_type_id = B.id WHERE B.eval_type = 'YesNo' ";	
	    $result5 = $this->db->query($fsql);
		
	   $gsql =" SELECT * FROM ie_area_description AS A JOIN ie_evaluation_type AS B ON A.evaluation_type_id = B.id WHERE B.eval_type = 'Overall Rating' ";	
	    $result6 = $this->db->query($gsql);
		
		 $sql = "SELECT * FROM ie_legend"; 
		 $result7 = $this->db->query($sql);
		 $getter = $result7->row();
		 $sy = $getter->gradingschoolyear;	
		 $sem = $getter->gradingsemester;	
		 $term = $getter->term;	
		 
		//**************************GETTER RESULT***************************/// 
	    	$output .='
		<input name="sy" type="hidden" value="'.$sy.'">
		<input name="sem" type="hidden" value="'.$sem.'">
		<input name="term" type="hidden" value="'.$term.'">
		<input name="instructor" type="hidden" value="'.$variable.'">
		<input name="area_id" type="hidden" value="'.$row['id'].'">
		';
        //**************************GETTER RESULT***************************/// 
		
		
		
	     //**************************PANNEL ROW NAME***************************/// 
	      	$output .= '
		
	    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" arialabelledby="headingOne">
        <div class="panel-body">
        <div class="panel panel-default"> <a href="#collapse'.$count.'" data-toggle="collapse" data-parent="accordion">
        <div class="panel-heading" style="background-color:#D3D3D3; color:#cc0000 ;" >'.$row['orderr'].'. '.$row['category_name'].' <i class="glyphicon glyphicon-chevron-down pull-right"></i></div>
              </a>
              <div id="collapse'.$count.'" class="panel-collapse collapse in">
                <div class="panel-body">   
				  ';
         //**************************PANNEL ROW NAME***************************/// 
		
	 $getter = $result1->row();
	 $ideval = $getter->eval_type;	
			
	 if ($ideval=='Rating'){	
	 
	       
	 	           
	                $output .= '  
                  <table class="table table-striped table-bordered table-hover">
                    <thead style=" color: #fff; background: #cc0000 ; ">
                       <tr >
					   <th>AREA/S</th>
					   
		                   ';
	   
	           foreach($result2->result_array() as $row2){
	          
			          $output .= '   
                        <th>'.$row2['ratings'].'</th>
		                 ';
              	
	           }  
         
	               $output .= '  	 
					
					 </tr>
                    </thead>
                    <tbody >
		';
		
		
		       foreach($result1->result_array() as $row1){
	           $ideval = $row1['eval_type'];	
		       $idd = $row1['eval_id'];
		
		
	if ($ideval=='Rating'){
			
			
	                $output .= '
					 	
                      <tr >
                        <td>'.$row1['question_name'].'</td>
                        <td class="center score"><input type="radio"  name="eval_'.$idd.'" value="5" ></td>
                        <td class="center score"><input type="radio" name="eval_'.$idd.'" value="4" required ></td>
                        <td class="center score"><input type="radio" name="eval_'.$idd.'" value="3" required ></td>
                        <td class="center score"><input type="radio" name="eval_'.$idd.'" value="2" required ></td>
                        <td class="center score"><input type="radio" name="eval_'.$idd.'" value="1" required ></td>
                      </tr>
					  
		';
		 
		       }
	}
			  
	               	$output .= '			  
                    </tbody>
                  </table>
				  
				  ';		  
	}
	 
	 

	 else if($ideval=='Essay'){
		 
  
	          foreach($result4->result_array() as $row2){
	          $val_essay = $row2 ['eval_id'];
            	
		                $output .= '		  
             <tr>
              <p> '.$row2['question_name'].' </p>
              <textarea id="6" class="form-control" required name="eval_'.$val_essay.'" cols="50" rows="10" value="6"></textarea>
              </p>
				  
			';
	          }
	          foreach($result6->result_array() as $row3){	
			   
	                $output .= '	 
                  <p>'.$row3['question_name'].' </p>
				  
				';
			  }	
		
    foreach($result6->result_array() as $row3){	 
	$val_idd = $row3 ['eval_id']; 
	
	          foreach($result3->result_array() as $row3){	  
	          $val_escale = $row3 ['id'];	
	          $val_escalename = $row3 ['ecale'];
			  	
                     $output .= '	
	               <label>
                   <input type="radio"  name="eval_'.$val_idd.'" value="'.$val_escalename.'">
                     '.$row3['ecale'].'
					</label>
					 '; 
	}	
			 }
		
			foreach($result5->result_array() as $row4){	
			$val_YesNo = $row4 ['eval_id'];
							  
	                           $output .= '		  
					  
                  <p> '.$row4['question_name'].' 
					<label>
                    <input type="radio" required name="eval_'.$val_YesNo.'" value="Yes">
                    YES
					</label>
					
			
                    <label>
                      <input type="radio" required  name="eval_'.$val_YesNo.'" value="No">
                      NO 
					 </label>
                   
                  </p>
				  
				';
	
	         }
	                         $output .= '		  
			  <div class="btn-group btn-group-justified">
              <div class="btn-group">
               <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">SUBMIT EVALUATION </button>
			   </div>
			    </form>	  
		        </div>
				 ';
				 
		
				  
	 }
	                       $output .= '	  
             </div>
             </div>
			 </div>
			 </div>
		
		 ';
		
		
	  	
	  $count = $count + 1;
		
		}
		return $output;

		}	   
	   
	 
	  //************************** INSERTING TO DATABASE ***************************///    
	 public function Inserting(){  
	 
        $Reference_Number = $this->session->userdata('Reference_Number');
        $Student_Number = $this->session->userdata('Student_Number');
	    $hsql = "SELECT * FROM ie_area WHERE active = '1' ORDER BY orderr ASC ";
		$result = $this->db->query($hsql);


		
		foreach($result->result_array() as $row){
		$value = $row['id'];	


		$isql ="SELECT * FROM ie_area_description AS A JOIN ie_evaluation_type AS B ON A.evaluation_type_id = B.id WHERE A.area_id = '$value' ";	
	    $result1 =  $this->db->query($isql);
		
		// echo '<br>Area<br>';
		foreach($result1->result_array() as $row){
	
			 $increment = "eval_".$row['eval_id'];
			
			 $val = $this->input->post($increment);
			  $val = str_replace("'","\&#39;", $val);
		      $val = stripslashes($val);


			 $val_sy = $this->input->post('sy');
			 $val_sem = $this->input->post('sem');
			 $val_term = $this->input->post('term');
			 $val_instructor = $this->input->post('instructor');
			 $val_question_id  = $row['eval_id'];
			 $val_question_type = $row['id'];




			 $sql = "
			 
			 INSERT INTO ie_evaluationresult          
	 (instructor,student_number,Reference_Number,Term,Semester,School_Year,area_id,question_id,question_type,eval_answers,datetime)
			 VALUES      ('$val_instructor','$Student_Number','$Reference_Number','$val_term','$val_sem','$val_sy','$value','$val_question_id','$val_question_type','$val',NOW());

             ";
			 $result = $this->db->query($sql);
			 
		}
	 
		  
		}
		
		 //************************** EVALUATION MESSAGE MODAL ***************************///    
		$Modaleval_data = array(
		
		               'evalmodal'=>'
		       <!-- Modal -->
                   <div class="modal fade in" id="Eval_modal" role="dialog">
                     <div class="modal-dialog">
               <!-- Modal content-->
                    <div class="modal-content">
                       <div class="modal-header" style="background-color:cc0000; color:#FFFFFF;">
                          <h4 class="modal-title" style="font-color:#FFFFFF;">Evaluation Submitted</h4>
                        </div>
                    <div class="modal-body">
                 <p>Congratulations! You have already submitted your Evaluation.</p>
                    </div>
             		
		'
		                         );
		$this->session->set_userdata($Modaleval_data);	

		//************************** EVALUATION MESSAGE MODAL ***************************///    
	
}				
}
 //************************** INSERTING TO DATABASE ***************************///    
?>
