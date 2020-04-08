<?php


class User_cus_sat_model extends CI_Model{
	
   public function getform(){  
		$var_value = $_POST['get_eval_assign_id'];
    $var_instructor = $_POST['instructor'];
    $Reference_Number = $this->session->userdata('Reference_Number');
    $Student_Number = $this->session->userdata('Student_Number');


$Output = '';
$count = 0; 
            
            $sql1= "SELECT * FROM iee_evaluation_legend ";     
            $result1 = $this->db->query($sql1);

            $getlegend   = $result1->row();
            $GetSy   = $getlegend ->schoolyear;
            $GetSem   = $getlegend ->semester;
            $GetTerm   = $getlegend ->term;


	                $sql = "SELECT * FROM `iee_evaluation_assign_table` AS A 
                            INNER JOIN (SELECT * FROM `iee_evaluation_table`)
                            AS B ON `B`.`Evaluation_id` = `A`.`Evaluation_id`
                            WHERE `A`.`eval_assign` = '$var_value'";
	                $result = $this->db->query($sql);
	 
	          $getevaluation   = $result->row();
            $Geteval_id     = $getevaluation ->evaluation_id;
            $GetEval_assign = $getevaluation ->eval_assign;


	                      foreach($result->result_array() as $row){  
	                      $getEvalid = $row['evaluation_id']; 




    $check_evaluation = 
      "  
      SELECT * FROM iee_evaluation_result
      WHERE eval_assign_id='$var_value' 
      AND evaluation_id= '$getEvalid'
      AND student_number='$Student_Number'
      AND acad_year='$GetSy'
      AND sem='$GetSem'
      ";
      $check_result = $this->db->query($check_evaluation);    

			  
   if($check_result->num_rows() > 0){

    $Output.='<h2 style="font-weight: 600;">Dominicans,</h2> <h3>Thank you very much for your participation!</h3>';
   }else{




		$Asql = "
               SELECT * FROM `iee_question_assign_area_table` AS A INNER JOIN (SELECT * FROM `iee_question_area_table`)
                AS B ON `B`.`area_id` = `A`.`area_id`
                WHERE `A`.`evaluation_id` = '$getEvalid' 
                              ";
             $Aresult = $this->db->query($Asql);
   
                    
   
                      $Csql = " SELECT * FROM iee_question_escale_table WHERE Evaluation_id = '$getEvalid'";
                      $Cresult = $this->db->query($Csql);
   
                      $Dsql = "SELECT * FROM `iee_question_direction_table` WHERE `evaluation_id` = '$getEvalid' ";
                      $Dresult = $this->db->query($Dsql);



$Output.='<div class="panel-group" id="accordion">';
$Output.='<div class="panel panel-default  style="backgound-color: #666;"">';
$Output.='<div class="panel-heading clearfix"  style="background-color:#D3D3D3; font-family: Verdana,Geneva,sans-serif;  color:#FFF;" role="tab" id="headingOne" >';

$Output.='<h1 class="panel-title text-center"  style="font-size: 30px; font-weight: bold; color: #FF0000;">'.$row['Evaluation'].' </h1>';
$Output.='</div>';
$Output.='<br>';




$Output.='<div class="row">';

$Output.='<div class="col-md-4">';
$Output.='<p style="margin-left: 50px;  font-weight: 700; font-size: 16px;">Term: <span style="color: green;">'.$GetTerm.'</span></p>';
$Output.='</div>';

$Output.='<div class="col-md-4">';
$Output.='<p style=" font-weight: 700; font-size: 16px;">Semester:<span style="color: green;"> '.$GetSem.'</span</p>';
$Output.='</div>';

$Output.='<div class="col-md-4">';
$Output.='<p style=" font-weight: 700; font-size: 16px;">AY:<span style="color: green;"> '.$GetSy.'</span</p>';
$Output.='</div>';

$Output.='</div>';


  $Output .= '    
                <form method="post" action="Insert_Answer"> 
                  <input name="get_ins" type="hidden" value="">
                  <input name="get_sy" type="hidden" value="'.$GetSy.'">
                  <input name="get_term" type="hidden" value="'.$GetTerm.'">
                  <input name="get_sem" type="hidden" value="'.$GetSem.'">
                  <input name="get_evalid" type="hidden" value="'.$Geteval_id.'">            
                  <input name="get_evalassign" type="hidden" value="'.$GetEval_assign.'">   
              ';  



$Output.='<div class="container-fluid"  style=" margin-top: 30px;">';
$Output.=' <hr style="color: #800; background: #800; width: 100%;  height: 1px; opacity: 0.1;">';
$Output.='<h2 style="text-align:center">'.$var_instructor.'</h2>';
$Output.='<hr style="color: #800; background: #800; width: 100%;  height: 1px; opacity: 0.1; ">';
                            foreach($Dresult->result_array() as $Drow){  
$Output.='<p style="margin-left:20px; margin-right: 20px; margin-top: 20px; font-size: 16px; text-align: justify;"> '.$Drow['direction'].'</p>';
                                                                      }
$Output.='<hr style="color: #800; background: #800; width: 100%;  height: 1px; opacity: 0.1;  "> ';
$Output.='<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" arialabelledby="headingOne"> ';
         $Output.='<div class="panel-body">'; 
                                      foreach($Aresult->result_array() as $Arow){
                                       $getAreaId = $Arow['area_id'];
           $Esql = "SELECT * FROM `iee_question_assign_table`
                    AS A 
                    INNER JOIN (SELECT * FROM `iee_question_table`) 
                    AS B ON `A`.`qid` = `B`.`qid` 
                    INNER JOIN (SELECT * FROM `iee_question_evaluation_type`) 
                    AS C ON `A`.`evaluation_type_id` = `C`.`evaluation_type_id` 
                     WHERE `A`.`area_id` = '$getAreaId' ORDER BY area_id ASC
                                                  ";
           $Eresult = $this->db->query($Esql);


         $Fsql = "SELECT * FROM iee_question_criteria_table WHERE Evaluation_id = '$getEvalid' AND area_id ='$getAreaId' ORDER BY ratings DESC  ";
         $Fresult = $this->db->query($Fsql);
   

                      $getter = $Eresult->row();
                      $ideval = $getter->evaluation_type; 

        
       
                  if ($ideval=='Rating'){ 



$Output.='<div class="panel panel-default"> <a href="#collapse'.$count.'" data-toggle="collapse'.$count.'" data-parent="accordion"> ';  

$Output.='<div class="panel-heading" style="background-color:#D3D3D3; color:#cc0000 ;" >'.$Arow['order'].' '.$Arow['category_name'].'<i class="glyphicon glyphicon-chevron-down pull-right"></i></a></div> 


  <div id="collapse'.$count.'" class="panel-collapse collapse in">
  <div class="panel-body"> 
           
          
  ';  
   $Output.='  <div class="table-responsive">  ';  
   $Output.='  <table class="table table-striped table-bordered table-hover" style="">';  
   $Output.=' <thead style=" color: #fff; font-size:12px; background: #cc0000 ;"> '; 
   $Output.=' <tr>'; 
   $Output.='<th></th>  '; 
    
foreach($Fresult->result_array() as $Frow){  

   $Output .= ' 
    <th>
    <div class="text-center">
    ('.$Frow['ratings'].' )<br>
    '.$Frow['criteria'].'
    </div>
     </th> 
     ';
                                              }// foreach($Bresult->result_array() as $Brow){ 
                                              }   //    if ($ideval=='Rating'){  
   $Output.='</tr> '; 
   $Output.='</thead> '; 
   $Output.='<tbody> '; 
   $Output.='<tr> '; 
   $Output.='</tr> '; 


      foreach($Eresult->result_array() as $Erow){
        $ideval = $Erow['evaluation_type']; 
        $idd = $Erow['qid'];
     
         if ($ideval=='Rating'){
   $Output.='<tr> '; 
   $Output.='<td width="70%">'; 
   $Output.='<p>'.$Erow['eq'].'</p> '; 
   $Output.='<p>'.$Erow['tq'].'</p> '; 
   $Output.=' </td> '; 
                                
   $Output.='<td class="text-center"><input type="radio" name="eval_'.$idd.'" value="5" required ></td>  '; 
   $Output.='<td class="text-center"><input type="radio" name="eval_'.$idd.'" value="4" required ></td>  '; 
   $Output.='<td class="text-center"><input type="radio" name="eval_'.$idd.'" value="3" required ></td>  '; 
   $Output.='<td class="text-center"><input type="radio" name="eval_'.$idd.'" value="2" required ></td>  '; 
   $Output.='<td class="text-center"><input type="radio" name="eval_'.$idd.'" value="1" required ></td>  '; 
                                
                               }
                           

          else if($ideval=='Essay'){
  $Output .='
         <p>'.$Erow['eq'].'</p> 
       <textarea id="6" class="form-control" required name="eval_'.$idd.'" cols="50" rows="10" value="6" style="background-color: #E8E8E8"></textarea>
               
       ';                                                                                                                              }

             else if($ideval=='Overall Rating'){      
 $Output .=' <p> '.$Erow['eq'].'';
 $Output .=' <label> ';
  
              foreach($Cresult->result_array() as $Crow){  
 $Output .=' <input type="radio"  name="" value=""> ';
 $Output .=' '.$Crow['escale'].'  ';                       
                                                              } 
    
$Output .=' </label> ';
$Output .=' </p>  ';  
  
                                         }

             else if($ideval=='YesNo'){
$Output .='
       <p>'.$Erow['eq'].'
        <label>
                    <input type="radio" required name="" value="Yes">
                    YES
        </label>
                 <label>
                     <input type="radio" required  name="" value="No">
                      NO 
         </label>
            
          </p> 
            ';                                                                                                                                }


           //////////////////////////////////////////Recommendation//////////////////////////////////
               
   else if($ideval=='Recommendation'){
   $Output .='<p style="font-size: 18px;  font-weight: 900;"> Recommendation: </p> ';  
    foreach($Cresult->result_array() as $Crow){                
    $Output .='    
              <div class="checkbox">
        <label>
              <input type="checkbox" name="eval_'.$idd.'" value="'.$Crow['escale'].'">
                 '.$Crow['escale'].'
               </label>
               
           ';    
      $Output .=' </div>   ';    
                                            }
                               }



 else if($ideval=='Improvement'){  
 $Output .='<br>';    
 $Output .=' <p> '.$Erow['eq'].'';
 $Output .=' <label> ';
  
              foreach($Cresult->result_array() as $Crow){  
 $Output .=' <input type="radio"  name="eval_'.$idd.'" value="'.$Crow['escale'].'"> ';
 $Output .=' '.$Crow['escale'].'  ';                       
                                 } 
    
$Output .=' </label> ';
$Output .=' </p>  ';  

                          }
       




                          }
       
 
   
  

   $Output.='</tbody>';
   $Output.='</table>';




$Output.='    </div>';
$Output.='    </div>';
$Output.='    </div>';
$Output.='    </div>';
 } 

$Output.=' <br> ';
$Output.='        
              <div class="text-center">   
                <button type="submit" class="btn btn-danger" style="font-weight: 700;color: #fff; background-color: #800; font-size: 16px; padding: 15px 60px;">Submit Evaluation</button>  
                 </div>   
                                              
              ';
$Output .='   </form> '; 
$Output.='    </div>';
$Output.='    </div>';
$Output.='    </div>';
                    }            

$Output.='    </div>';
$Output.='    </div>';



       

      
    
                                              }//result
                                                

	  $count = $count + 1; 
		  return $Output;  
		   }		





public function Evaluation_Insert(){
 
 $GetEvalid = $this->input->post('get_evalassign'); 
 //echo 'Evaluation Id: '.$GetEvalid.'<br><br><br>';

$sql = "SELECT * FROM `iee_evaluation_assign_table` AS A 
        INNER JOIN (SELECT * FROM `iee_evaluation_table`)
         AS B ON `B`.`Evaluation_id` = `A`.`Evaluation_id`
        WHERE `A`.`eval_assign` = '$GetEvalid'";
 
$result = $this->db->query($sql);

                      foreach($result->result_array() as $row){

                         $Evalid = $row['evaluation_id'];
                      //  echo 'Evaluation Id: '.$Evalid.'<br><br>'; 

  $Asql = "
               SELECT * FROM `iee_question_assign_area_table` AS A INNER JOIN (SELECT * FROM `iee_question_area_table`)
                AS B ON `B`.`area_id` = `A`.`area_id`
                WHERE `A`.`evaluation_id` = ' $Evalid' 
                              ";
 $Aresult = $this->db->query($Asql);
                      
                       foreach($Aresult->result_array() as $Arow){

                         $getAreaId = $Arow['area_id'];
                      //  echo 'Area ID: '.$getAreaId;
$Bsql = "
         SELECT * FROM `iee_question_assign_table`
                    AS A 
                    INNER JOIN (SELECT * FROM `iee_question_table`) 
                    AS B ON `A`.`qid` = `B`.`qid` 
                    INNER JOIN (SELECT * FROM `iee_question_evaluation_type`) 
                    AS C ON `A`.`evaluation_type_id` = `C`.`evaluation_type_id` 
            WHERE `A`.`area_id` = '$getAreaId' ORDER BY area_id ASC
      ";
$Bresult = $this->db->query($Bsql);

                  foreach($Bresult->result_array() as $Brow){

                                   $idd = $Brow['qid'];
                                   $val = $this->input->post('eval_'.$idd.'');
                                   $Reference_Number = $this->session->userdata('Reference_Number');
                                   $Student_Number = $this->session->userdata('Student_Number');
                                  // $Getevaluatee = $this->input->post('get_evaluatee');  
                                   $GetEval_assign_id = $this->input->post('get_evalassign');
                                   $GetTerm = $this->input->post('get_term');   
                                   $Getsy = $this->input->post('get_sy');
                                   $Getsem = $this->input->post('get_sem'); 
                                   $val_question_id  = $Brow['qid'];
                                   $val_question_type = $Brow['evaluation_type_id'];


$Csql = "
       
 INSERT INTO iee_evaluation_result          
(eval_assign_id,evaluation_id,Sched_Code,reference_no,student_number,instructor,term,sem,acad_year,area_id,q_evaluationtype_id,question_id,eval_answers,date)
VALUES ('$GetEval_assign_id','$Evalid','0','$Reference_Number','$Student_Number','test','$GetTerm','$Getsem','$Getsy','$getAreaId','$val_question_type','$val_question_id','$val',NOW());

            ";
$Cresult = $this->db->query($Csql);


//echo  '--------------------------------------------------------------------------------<br>';
//echo  'Eval Assign: '.$GetEval_assign_id.'<br>';  
//echo  'Question ID: '.$idd.'<br>';  
//echo  'Eval_answer: '.$val.'<br>';
//echo  'Area: '.$getAreaId.'<br>'; 
//echo  'evaluation_type:'.$val_question_type.'<br>';                          
//echo 'Question: '.$val_question_id.' <br>';        
//echo 'Evaluator_no:'.$Reference_Number.' <br>';
//echo 'Evaluatee_no:'.$Getevaluatee.'<br>';
//echo 'School_Year:'.$Getsy.'<br>';
//echo 'SEM:'.$Getsem.'<br>';
//echo 'TERM:'.$GetTerm.'<br>';
//echo $Evalid .'Evaluation_id<br><br>';
//Echo "submitted".'<br>'.'<br>';
//echo  '--------------------------------------------------------------------------------<br>';



                                                               }
                                                               }
                                                               }



 
   
}




}
 //************************** INSERTING TO DATABASE ***************************///    
?>
