<?php


class Admin_student_hr_result_model extends CI_Model{
	
	public function getSY(){
		
	
		
		$SYsql = "SELECT * FROM ie_evaluationresult  GROUP BY School_Year DESC";
		
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
    

    public function get_Sem1(){
		
      $q = $_REQUEST["q"];
    // echo $q;
      $sql = "SELECT * FROM ie_evaluationresult WHERE School_Year = '$q' GROUP BY Semester DESC";
      $result = $this->db->query($sql);
      
      echo '<select class="form-control" name="getSEM" id="sel2">';
      foreach($result->result_array() as $row){
      echo "<option>".$row['Semester']."</option>";
      }
      echo "</select>";
      
      }
	
     public function getevaluators(){  
		$GetSEM = $this->input->post('getSEM');
		$GetSy = $this->input->post('getSY');
	          $ID = $this->input->post('insnamesearch');
	         $sql = "SELECT * FROM Instructor WHERE instructor_name LIKE'%$ID%' GROUP BY Instructor_Name ASC";
		     $result = $this->db->query($sql);
		     $Output = '';
		     $count = 1;
		  
		  
		
                 //OUTPUT OF SY AND SEM
        	         	$Output.='

		  
		   <h4>School Year: '.$GetSy.'</h4>
		    <h4>Semester: '.$GetSEM.'</h4>
		

	 	 ';
		      
			  
	  
		
                 //OUTPUT OF SY AND SEM

                   foreach($result->result_array() as $row){
                      $ins_name = $row['Instructor_Name'];
		              $get_allresult =
		                  " SELECT * FROM ie_evaluationresult WHERE instructor = '$ins_name' AND Semester = '$GetSEM' AND School_Year='$GetSy' GROUP BY Reference_Number";
		               $resulttest = $this->db->query($get_allresult);
		
		          //OUTPUT TABLE
		              $Output .='<form>';	
	   	 $Output .= '<tr>';
	   	 $Output .= '<td>'.$count.'</td> ';
         $Output .= '<td id="questionleft">'.$row['Instructor_Name'].'</td> ';
         $Output .= '<td>'.$resulttest->num_rows().'</td>';
		 $Output .= '<td><input type="hidden" id="Sy" value="'.$GetSy.'">
                         <input type="hidden" id="Sm" value='.$GetSEM.'>
		  <button type="button" value="'.$row['Instructor_Name'].'" class="btn btn-danger btn
		 " data-toggle="modal" data-target="#EvaluationResult" id="evaluationresult_edit_button" OnClick="EvaluationresultModal(this.value)">Result</button>  
		 <button type="button" value="'.$row['Instructor_Name'].'" class="btn btn-danger btn
		 " data-toggle="modal" data-target="#Evaluationcomment" id="evaluationcomment_edit_button" OnClick="EvaluationcommentModal(this.value)">Comments</button>
		 </td> ';
         $Output .= ' </tr> ';  
         $Output .='</form>';
		          //OUTPUT TABLE
		  
             $count = $count + 1;
                   }
	        return $Output;
      }
		
		
	  //OUTPUT Evaluation Results Modal
	
      public function GetevaluationresultModal(){ 
	  
		  $q = $_REQUEST["q"];
		  $SY = $_REQUEST["w"];
		  $SM  = $_REQUEST["e"];
 
	   
	      $getarea =
	      "
	      SELECT A.`id` AS 'AreaID',A.`orderr`,A.`category_name`FROM ie_area AS A JOIN ie_area_description AS B ON A.id = B.`area_id` JOIN ie_evaluation_type AS C ON B.`evaluation_type_id` = C.id WHERE C.`id`= '1'  GROUP BY B.`area_id`  ORDER BY A.`orderr`
          ";
	      $getarearesult = $this->db->query($getarea);
	
	      $getcriteria ="SELECT * FROM ie_criteria ORDER BY ratings DESC";
	      $getresultcriteria = $this->db->query($getcriteria);
	   
         $Output = '';
	     $Test = '0';
	     $Test1 = '0';
	     $count = 1;
	   		
	     
	       
				   echo  '
				   <div id="printThis">
	            <p> Name:  '.$q.' </p>
		        <p>School Year:  '.$SY.' </p>
		        <p>Semester: '.$SM.' </p>
			
			   '; 
			    
	
			   //ECHOO MODAL NAME , SY, SEM

               //ECHOO Category
     	           echo  '
               <table class="table table-striped table-bordered">
               <thead class="red lighten-1">
               <tr>
		       <th>Category</th>

		      ';
			   //ECHOO Category
 
               //Foreach of Criteria
	              foreach($getresultcriteria->result_array() as $rowcriteria){
		          $valueCriteria = $rowcriteria['ratings'];
	              echo ' <th>'.$valueCriteria.'</th> ';
		           }
			   //Foreach of Criteria
		 
        echo '<th>Average</th>';
	    echo '<th>Percentage</th>';
		echo '<tbody>';
		
	    foreach($getarearesult->result_array() as $rowArea){
		   $valueArea = $rowArea['orderr'];
		   $valueCatergory = $rowArea['category_name'];
		   $valueId = $rowArea['AreaID'];
		     echo  '
			    <tr>	
	            <td>'.$rowArea['orderr'].'. '.$valueCatergory .'  </td> 
			      ';
				  
		 $TotalRows1 = '0';
		 $TotalRows = '0';
		 $TotalQCrows = '0';
		 $TotalPecentage = '0';		  
  	    
		
	    foreach($getresultcriteria->result_array() as $rowcriteria){
	    $valueCriteria = $rowcriteria['ratings'];
		$sample = '5';
		
	    $getresult = "
				 SELECT * FROM ie_evaluationresult WHERE instructor ='$q' AND Semester ='$SM' AND School_Year='$SY' AND area_id='$valueId' AND eval_answers = '$valueCriteria'
				      ";
	   	$result = $this->db->query($getresult);
		$valueNumRows = $result->num_rows();
		
		$RowsXCrit = $valueCriteria * $valueNumRows;
		$TotalRows = $RowsXCrit + $TotalRows;
		$TotalRows1 = $valueNumRows + $TotalRows1;	
		//echo $TotalRows;
		//echo $TotalRows1;
		
		if($TotalRows != '0' || $TotalRows1 != '0'){
		$TotalQCrows = $TotalRows / $TotalRows1;
		$TotalPecentage = $TotalQCrows / 5 * 100;	
		}
		else{
		$TotalQCrows = '0';
		$TotalPecentage = '0';
		}
	   echo '<td>'.$valueNumRows.'</td> ';
	   		
	   //echo '<td>'.$valueCriteria.'</td> ';
	    }//foreach($getresultcriteria->result_array() as $rowcriteria)
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//echo '*'.$TotalQCrows.'*<br>';
		//echo '`'.$TotalPecentage.'`<br>';
		
	    $Test = $TotalQCrows + $Test;
		$Test1 = $TotalPecentage + $Test1;
	
		//echo 'Average: '.$Test.'  Percentage:'.$Test1.'<br>';
		//echo 'Percentage: '.$Test1.'<br>';
		
	
			echo '
				 <td style="color: Green;">'.round($TotalQCrows,2).'</td>
				 <td style="color: Green;">'.round($TotalPecentage,2).'% </td>
			  </tr>	  
				 ';
		
	   }//foreach($getresultcriteria->result_array() as $rowcriteria)
	   
         $Avg  =  $Test / $getarearesult->num_rows();
	    $Perce = $Test1 / $getarearesult->num_rows();
		//$try = $Test1 / $getarearesult->num_rows()*100.'<br>';
		
		// $getarearesult->num_rows();
	 
	   
   	 
	  echo '
	 
	 
		 <tr>
		   <td style="color:red; font-family: Gill Sans Extrabold, sans-serif;">TOTAL</td>
		   <td></td>
		   <td></td>
		   <td></td>
		   <td></td>
		   <td></td>
		   <td style="color: red;">'.round($Avg,2).'</td>
		   <td style="color: red;">'.round($Perce,2).'%</td>
		 </tr>

		   ';
		 
         echo ' 
	  	 </tr>	
           </thead>
           </tbody>
		   </table>
		   </div>
			  ';
       }
	   
	   //OUTPUT Evaluation Result Modal
	   
     public function GetevaluationcommentModal(){
		
	  
		$q = $_REQUEST["q"];
		$SY = $_REQUEST["w"];
		$SM  = $_REQUEST["e"];

	 
	         
		
               //ECHOO MODAL NAME , SY, SEM
	               echo  '
	            <p> Name:  '.$q.' </p>
		        <p>School Year:  '.$SY.' </p>
		        <p>Semester: '.$SM.' </p>
			
			   '; 
			  
			   $getcomments = 
				" SELECT * FROM ie_evaluationresult  WHERE instructor='$q' AND question_type ='2' AND Semester ='$SM' AND School_Year = '$SY'";
			     $resultcomment = $this->db->query($getcomments);
				 
	    foreach($resultcomment->result_array() as $RowComment){
	    $comment = $RowComment['eval_answers'];  
			 
	    if ($comment != " "){
		echo '
		<div class="alert alert-danger">
	         '.$comment.'
           </div>
		';
		}
		
		
      
		}
 
 
 
 
 
 
 
 
	 }
	 
}
  
?>
