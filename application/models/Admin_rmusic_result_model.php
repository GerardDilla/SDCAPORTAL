<?php


class Admin_rmusic_result_model extends CI_Model{
	

  // STUDENT
  
  public function getSY(){
		
	
		
		$SYsql = "SELECT * FROM iee_evaluation_result  GROUP BY acad_year DESC";
		
		$result = $this->db->query($SYsql);
		
		
		if($result->num_rows() != 0){
			
		$Output = '<option style="color:#CCC">Select Academic Year:</option>';
		
		foreach($result->result_array() as $row){

		$Output .= '<option>'.$row['acad_year'].'</option>';
		
		}
		}else{
			
			$Output = '<option style="color:#CCC">You have no data yet. Proceed to Helpdesk if there are concerns</option>';
			
			}
		
		return $Output;
		
    }
    

    public function get_Sem(){
		
      $q = $_REQUEST["q"];
     echo $q;
      $sql = "SELECT * FROM iee_evaluation_result WHERE acad_year = '$q' GROUP BY sem DESC";
      $result = $this->db->query($sql);
      
      echo '<select class="form-control" name="getSEM" id="sel2">';
      foreach($result->result_array() as $row){
      echo "<option>".$row['sem']."</option>";
      }
      echo "</select>";
      
      }

      public function geteval(){
		
	   	$Output='';
        $evalsql = "SELECT * FROM `iee_evaluation_assign_table` AS A 
                   INNER JOIN (SELECT * FROM `iee_evaluation_table`)
                   AS B ON `B`.`Evaluation_id` = `A`.`Evaluation_id`
                   WHERE evaluation_assign_active = '1'";
        
        $result = $this->db->query($evalsql);
        
        
        if($result->num_rows() != 0){
          
      $Output .= '<option style="color:#CCC">Select Evalation Result:</option>';
        
        foreach($result->result_array() as $row){
    
        $Output .= '<option value="'.$row['eval_assign'].'">'.$row['Evaluation'].'</option>';
        
        }
        }else{
          
          $Output = '<option style="color:#CCC">You have no data yet. Proceed to Helpdesk if there are concerns</option>';
          
          }
        
        return $Output;
        
        }



	public function results()
	{


  //  $Eval_assign_id = $_POST['get_eval_assign_id'];
       $Eval_assign_id = $this->input->post('getEval');
       $GetSEM = $this->input->post('getSEM');
       $GetSy = $this->input->post('getSY');
	$Output = '';
  $count = 0; 





               $Output.='
                  
          <div style="text-align:center; id="test" margin-bottom:40px; min-width:250px; overflow:auto;">
             <h4 style="color:#000;font-weight:500; font-size: 24px;"> Academic Year: <span class="label-data">'.$GetSy.'</span></br><br> Semester:<span class="label-data">'.$GetSEM.'</span></h4>
            </div>

            <br>
	        ';	


               



           $sql = "SELECT * FROM `iee_evaluation_assign_table` AS A 
                   INNER JOIN (SELECT * FROM `iee_evaluation_table`)
                   AS B ON `B`.`Evaluation_id` = `A`.`Evaluation_id`
                   WHERE `A`.`eval_assign` = '$Eval_assign_id'";
	       $result = $this->db->query($sql);
	 
	       // $getevaluation   = $result->row();
           // $Geteval_id     = $getevaluation ->evaluation_id;
           // $GetEval_assign = $getevaluation ->eval_assign;
            

                   foreach($result->result_array() as $row){  
	                      $getEvalid = $row['evaluation_id']; 

             $Output.='<h4 style="font-weight: bold; text-align: center;">
                        '.$row['Evaluation'].' Results
                        </h4> <br>';
                  

		    $Asql = "
               SELECT * FROM `iee_question_assign_area_table` AS A INNER JOIN (SELECT * FROM `iee_question_area_table`)
                AS B ON `B`.`area_id` = `A`.`area_id`
                WHERE `A`.`evaluation_id` = '$getEvalid' 
                              ";
             $Aresult = $this->db->query($Asql);


    $Output.='<div class="result-border">';



    $get_allresult =

		     " SELECT *
		       FROM `iee_evaluation_result` 
		       WHERE `acad_year` = '$GetSy'
		       AND `sem` = '$GetSEM '
           AND `student_number`!= '-1'
           AND `student_number`!= '0'
		       AND evaluation_id='$getEvalid'   
		       GROUP BY `student_number`
		     ";

      $resulttest = $this->db->query($get_allresult);
      
      
      $Output.='<h3 style="font-weight: 500;">Total Evaluators: 
      <span style="color: #800;">'.$resulttest->num_rows().'</span>
      </h3>';
   
        

     foreach($Aresult->result_array() as $Arow){
                    $getAreaId = $Arow['area_id'];




 
     $Output.='
               <div class="border-label">
            <h4>'.$Arow['order'].' '.$Arow['category_name'].'</h4><br>
          </div>
             ';

             $Output.='    <hr style="border-top: 3px solid #800">  ';

           $Bsql = "SELECT * FROM `iee_question_assign_table`
                    AS A 
                    INNER JOIN (SELECT * FROM `iee_question_table`) 
                    AS B ON `A`.`qid` = `B`.`qid` 
                    INNER JOIN (SELECT * FROM `iee_question_evaluation_type`) 
                    AS C ON `A`.`evaluation_type_id` = `C`.`evaluation_type_id` 
                     WHERE `A`.`area_id` = '$getAreaId'
                    ORDER BY area_id ASC
                                                  ";
           $Bresult = $this->db->query($Bsql);


     foreach($Bresult->result_array() as $Brow){
            $getQid = $Brow['qid'];
   $Output.='

            <div class="row">
              <div class="col-md-5"> 
                <div class="question-border">
                <h5></h5>
               <p>'.$Brow['eq'].'</p>
             </div>
           </div>

          ';


     $Csql = "SELECT * FROM iee_question_criteria_table WHERE Evaluation_id = '$getEvalid' AND area_id ='$getAreaId' ORDER BY ratings DESC  ";
         $Cresult = $this->db->query($Csql);
   
            

              $Output.='  <div class="col-md-7">';  
              $Output.='<h5></h5>';



   $Output.='<table style="width: 100%; font-size: 14px;">';
  
    $Output.='<tr>';
    $Output.='<th class="text-center">Criteria</th>';
    $Output.='<th class="text-center">Respondents</th>';
    $Output.='<th class="text-center">Average</th>';
    $Output.=' </tr>';


              foreach($Cresult->result_array() as $Crow){   
                  $getRatings = $Crow['ratings'];

        
    $Dsql ="SELECT COUNT(eval_answers) 
           FROM `iee_evaluation_result` 
           WHERE `acad_year` = '$GetSy'
           AND `sem` = '$GetSEM'
           AND `area_id`= ' $getAreaId'
           AND `eval_answers`='$getRatings'
           AND `question_id`='$getQid'
           AND `evaluation_id`='$getEvalid'
           AND `student_number`!= '-1'
           GROUP BY `student_number`";
    $Dresult = $this->db->query($Dsql);

    
    $Output.='<tr>';

    $Output.='
    <td class="">
    <span style="font-weight: 400;">
          '.$Crow['criteria'].'
          </span> 
    </td>
             ';


    $Output.='
    <td class="text-center">
       <span style="color: #800; font-weight:600;">
           '.$Dresult->num_rows().'
           </span>   
    </td>
             ';

 

    $Percent = $Dresult->num_rows() / $resulttest->num_rows() * 100;

    $Output.=' 

     <td class="text-center">
     <span style="color: green; font-weight:600;">
        '.round($Percent,2).'%
        </span>
    </td>';              

         }
  
    $Output.='</tr>';
    $Output.='</table>'; 

           
                                               

         $Output.='   
           </div>
           </div>	

      ';

$Output.='    <hr style="border-top: 3px solid #800">  ';
              


                                                        }

                                                        }
$Esql="SELECT * FROM iee_evaluation_result  
WHERE  q_evaluationtype_id ='2'
AND `evaluation_id`='$getEvalid'
 AND sem ='$GetSEM' 
 AND acad_year = '$GetSy'";
$Eresult = $this->db->query($Esql);

$Output.='  <h1 style="color: red;">Comments</h1> ';
foreach($Eresult->result_array() as $Erow){   
$getComment = $Erow['eval_answers'];

$Output.=' <span style="color: red; font-weight: bold;">"</span> '.$Erow['eval_answers'].' <span style="color: red;  font-weight: bold;">"</span><br>' ;

}
                                                        }

	  $count = $count + 1; 
	  return $Output; 
	}


}
?>