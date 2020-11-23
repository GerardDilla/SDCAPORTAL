<?php


class User_faculty_evaluation extends CI_Model{
	
      

	   public function getinstructors (){
		  
		  
		$Reference_Number = $this->session->userdata('Reference_Number');
			$get_legend = "Select * FROM ie_legend";
		$legend_result = $this->db->query($get_legend);
	    $count = 0;
		$Output = '';
		
		//CHECK SY AND SEM
		if($legend_result->num_rows() > 0){
			
			//echo 'legend_result good <br>';
			$legend_row = $legend_result->row();
			$lg_sy = $legend_row->gradingschoolyear;
			$lg_sem = $legend_row->gradingsemester;
			
			
				
	                             	//MAIN PANEL//
		                                                   	$Output .= 
			
			'
			
				
				<div class="panel-group" id="accordion">
				<div class="panel panel-default  style="backgound-color: #666;"">
				
				<div class="panel-heading clearfix"  style="background-color:#D3D3D3; font-family: Verdana,Geneva,sans-serif;  color:#FFF;" role="tab" id="headingOne">
				
				<h1 class="panel-title text-center" style="font-size: 30px; font-weight: bold; color: #FF0000; ">INSTRUCTORS </h1>
				</div>
				
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
				
			
                <div class="col-md-6" id="facEvalSem"> Semester:<span class="evalSem">'.$lg_sem.'</span></div>
		       <div class="col-md-6" id="facEvalSY">AY:<span class="evalSy">'.$lg_sy.'</span></div>
		        <br>

			';	
								   //MAIN PANEL//
								   
								   $get_subjects = "

								   SELECT 
									   D.`Course_Code` AS subjectcode,
									   D.`Sched_Code` AS schedcode,
									   D.`SchoolYear` AS schoolyear,
									   D.`Semester` AS semester,
									   C.`Instructor_Name` AS instructor,
									   E.Course_Title
									   FROM
									   EnrolledStudent_Subjects AS A 
									   JOIN  Sched_Display AS B
									   ON B.`Sched_Code` = A.`Sched_Code`
									   JOIN Instructor AS C
									   ON C.ID = B.`Instructor_ID`
									   JOIN  Sched AS D 
									   ON D.`Sched_Code` = B.`Sched_Code`
									   JOIN Subject AS E 
									   ON E.`Course_Code` = D.`Course_Code`
									   WHERE A.Reference_Number='$Reference_Number' 
									   AND A.Semester = '$lg_sem' 
									   AND A.School_Year = '$lg_sy'
									   AND A.Dropped != '1'
									   AND A.Cancelled != '1'
									   AND A.Charged != '1'
									   GROUP BY D.`Sched_Code`
																						   
											   ";

								 $subject_result = $this->db->query($get_subjects);
								 

						



				//Subjects Checker
				if($subject_result->num_rows() > 0){
					
					//echo 'subject_result good <br>';

						//Subjects FOREACH
						foreach($subject_result->result_array() as $subject_row)
						{
							$instructor_name = $subject_row['instructor'];
							$sched_code = $subject_row['schedcode'];


		
							
	   						       //ACCORDION//
		                              $Output .= '	
				
									</br>
									<div class="panel panel-default"> <a href="#collapse'.$count.'" data-toggle="collapse" data-parent="accordion">
									
									<div class="panel-heading" style="background-color:#D3D3D3; color:#FF0000;" >
									'.$instructor_name.'
									<i class="glyphicon glyphicon-chevron-down pull-right"></i>
									</div>
									</a>		  
									 <div id="collapse'.$count.'" class="panel-collapse collapse in">
										<div class="panel-body">
										 <div class="">
											<h3> SUBJECT ENROLLED</h3>
							';
								  //ACCORDION END//

			
					  if($instructor_name !=  $sched_code){

									   $course = $subject_row['Course_Title'];


							

				
		             			//SUBJECTS	LIST					
		                            //SUBJECT ENROLLED//
									$Output .= '<ul>';
		                           //SUBJECT ENROLLED//
		
		                             //SUBJECT IETMS//
								     $Output .= '<li>'.$course.'</li>';
		                           //SUBJECT IETMS//							
	
		                            //SUBJECT ENROLLED end//
									$Output .= '</ul>';
		                            //SUBJECT ENROLLED end//
										
								//SUBJECTS LIST END

						
							
		     	$check_evaluation = "
			 	SELECT * FROM ie_evaluationresult WHERE Reference_Number ='$Reference_Number' AND instructor ='$instructor_name' AND Semester='$lg_sem' AND School_Year='$lg_sy'
										 
										 ";
				$check_result = $this->db->query($check_evaluation);
												
			}//  if($instructor_name !=  $sched_code){

							   
							   
							   	  $count = $count + 1;
										//EVALUATION CHECKER/BUTTON//
											//EVALUATION CHECKER
											if($check_result->num_rows() > 0){
										
												//echo 'evaluated<br>';
												//BUTTON//
												$Output .= '
													<form class="pull-right" style="">
													<span style="color:green; font-size: 18px;  color: #008000;"> 
													<i class="glyphicon glyphicon-ok"></i> EVALUATED 
													</span>
													</form>
												';	
												//BUTTON//
											
											}
											else
											{
												
												if($instructor_name != 'TBA'){

													//echo 'not yet<br>';
													//BUTTON//
													$Output.='
													<form method="post"action="User_Sate_Form" class="pull-right">
													<input name="pogi" type="hidden" value="'.$instructor_name.'">
													<button type="submit"  class="btn btn-danger" >EVALUATE NOW
													<i class="fa fa-angle-double-right"></i> </button>
													</form>										
													';
													//BUTTON//	

												}else{

													//echo 'not yet<br>';
													//BUTTON//
													$Output.='
													<form method="post"action="User_Sate_Form" class="pull-right">
													<button type="button"  class="btn btn-default" >Unavailable: Instructor Not Set
													<i class="fa fa-angle-double-right"></i> </button>
													</form>										
													';
													//BUTTON//	

												}


											}
											//EVALUATION CHECKER
							           //EVALUATION CHECKER/BUTTON//
									
							
							//} //HANDLED SUBJECT CHECKER
						

		                     //ACCORDION END//
                              				
							$Output .=
							'
											</div>
										</div>
									 </div>
									 
								 </div>
							';
	                        //ACCORDION END//
							
							
							
							
		 
			          	}//Subjects FOREACH
						
			
				} //Subjects Checker
				else{
					$Output .= '<br><br><br><br>NO Result';
				}
	
				
	
	                        //MAIN PANEL END
	                          $Output .=
			'	
				</div>
				</div>
				</div>
			
			
			';
	                       //MAIN PANEL END//
			
						
			
	 	
			
		}//CHECK SY AND SEM
		
			
			return $Output;	
		

	
	   } 
	   
	
	
}
	   
?>