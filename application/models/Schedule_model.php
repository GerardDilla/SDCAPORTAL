<?php


class Schedule_model extends CI_Model{
	
	public function getsched(){
		
		
		$Student_Number = $this->session->userdata('Student_Number');
		$Reference_Number = $this->session->userdata('Reference_Number');
		$Output= "";
		
		$sy = $this->input->post('schedSY');
		$sem = $this->input->post('schedSEM');
		
		
		if(isset($sy) && isset($sem)){
				
			$sql = "
			
			SELECT * FROM EnrolledStudent_Subjects 
			WHERE Reference_Number = '$Reference_Number' 
			AND Semester = '$sem' 
			AND School_Year = '$sy'
			
			";
			$result = $this->db->query($sql);
			
			$Output .= '
			
					  <div style="text-align:center; margin-bottom:40px;">
						<h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;">
						  School year:
						  '.$sy.'
						  </br>
						  </br>
						  Semester:
						  '.$sem.'
						</h4>
					  </div>
				  	  <div id="list_table" style="max-height:400px; overflow-y:auto; margin-top:20px; border-top:solid thin #ccc; border-bottom:solid thin #ccc;">
				  ';	
		
			//Checker
			if($result->num_rows() > 0){
				
				//Table Head
				$Output .= '
				  <table class="table table-striped" style="color:#666">
					<thead>
					  <tr>
						<th>Title</th>
						<th>Day</th>
						<th>Start</th>
						<th>End</th>
						<th>Room</th>
					  </tr>
					</thead>
					<tbody>	
				';
				//Table Boddy
				foreach($result->result_array() as $row1){
					
					$sc = $row1['Sched_Code'];
					
					$sql2 = "
					
					SELECT A.schedcode,A.subjectcode,A.day1,A.day2,A.day3,A.day4,A.day5,A.day6,
A.from1,A.from2,A.from3,A.from4,A.from5,A.from6,A.to1,A.to2,A.to3,A.to4,A.to5,A.to6,
A.room1,A.room2,A.room3,A.room4,A.room5,A.room6,B.Course_Title 
					FROM SchedOld AS A 
					JOIN `Subject` AS B 
					ON A.subjectcode = B.Course_Code
					WHERE A.schedcode = '$sc'
					
					";
					
					$result2 = $this->db->query($sql2);
					
						if($result2->num_rows() > 0){
							
							foreach($result2->result_array() as $row2){
								
								$days = array(
								
								'day1' => $row2['day1'],
								'day2' => $row2['day2'],
								'day3' => $row2['day3'],
								'day4' => $row2['day4'],
								'day5' => $row2['day5'],
								'day6' => $row2['day6'],
								
								);
								
								$start_time = array(
								
								'from1' => $row2['from1'],
								'from2' => $row2['from2'],
								'from3' => $row2['from3'],
								'from4' => $row2['from4'],
								'from5' => $row2['from5'],
								'from6' => $row2['from6'],
								
								);
								
								$end_time = array(
								
								'to1' => $row2['to1'],
								'to2' => $row2['to2'],
								'to3' => $row2['to3'],
								'to4' => $row2['to4'],
								'to5' => $row2['to5'],
								'to6' => $row2['to6'],
								
								);
								
								$room = array(
								
								'room1' => $row2['room1'],
								'room2' => $row2['room2'],
								'room3' => $row2['room3'],
								'room4' => $row2['room4'],
								'room5' => $row2['room5'],
								'room6' => $row2['room6'],
								
								);
								
								$Output .= "<tr>";
								$Output .= "<td>".$row2['Course_Title']."</td>";
								
								//DAY
								$Output .= "<td>";
								foreach($days as $dayrow){
									
									$day_code = $dayrow;
									$day_code = str_replace("N/A","",$day_code);
									//$Output .= $day_code."</br>";
									
									    $Output .= 
										'
										<div class="container-fluid">
										<div class="row">
										
										
										';
										
										
										$Output .= 
										'
										<div class="col-sm-12">
										'.$day_code.'
										</div>
										
										';
										$Output .= 
										'
										</div>
										</div>
										
										';
										
									}
								$Output .= "</td>";	
								
								//Start
								$Output .= "<td>";
								foreach($start_time as $s_time){
									
									$start_code = $s_time;
									$start_code = str_replace("N/A","",$start_code);
									
										$Output .= 
										'
										<div class="container-fluid">
										<div class="row">
										
										
										';
										
										
										$Output .= 
										'
										<div class="col-sm-12">
										'.$start_code.'
										</div>
										
										';
										$Output .= 
										'
										</div>
										</div>
										
										';
										
									}
								$Output .= "</td>";
								
								//END
								$Output .= "<td>";
								foreach($end_time as $e_time){
									
									$end_code = $e_time;
									$end_code = str_replace("N/A","",$end_code);
									//$Output .= $end_code."</br>";
									
										$Output .= 
										'
										<div class="container-fluid">
										<div class="row">
										
										
										';
										
										
										$Output .= 
										'
										<div class="col-sm-12">
										'.$end_code.'
										</div>
										
										';
										$Output .= 
										'
										</div>
										</div>
										
										';
									
									}
								$Output .= "</td>";
								
								//Room
								$Output .= "<td>";
								foreach($room as $rooms){
									
									$room_code = $rooms;
									$room_code = str_replace("N/A","",$room_code);
									//$Output .= $room_code."</br>";
									
									$Output .= 
										'
										<div class="container-fluid">
										<div class="row">
										
										
										';
										
										
										$Output .= 
										'
										<div class="col-sm-12">
										'.$room_code.'
										</div>
										
										';
										$Output .= 
										'
										</div>
										</div>
										
										';
									
									}
								$Output .= "</td>";
								
								$Output .= "</tr>";
							}
							
								
						}
						else
						{
								$Output .= "<tr>";
								$Output .= "<td>-</td>";
								$Output .= "<td>-</td>";
								$Output .= "<td>-</td>";
								$Output .= "<td>-</td>";
								$Output .= "<td>-</td>";
								$Output .= "</tr>";
								
						}
					
					}
				
				//Table End
				$Output .= '
					</tbody>
					</table>
					</div>
				';
					
			}
			//No result
			else{
				$Output .= "<h3>You have no records yet.</h3></br>";
				$Output .= "Please visit the SDCA <a style='color:#00F' href='#'> Helpdesk </a> if there are any concerns, Thank you!";
				}
			
		}
		//Default: if there is no choice yet
		else
		{
			$get_latest = "
			
			SELECT * FROM EnrolledStudent_Subjects 
			WHERE Reference_Number = '$Reference_Number' 
			ORDER BY Semester DESC, School_Year DESC
			
			";
			$res = $this->db->query($get_latest);
			
			if($res->num_rows() > 0){
				
				$row = $res->row();
				
				$sem = $row->Semester;
				$sy = $row->School_Year;
				
				$sql = "
				
				SELECT * FROM EnrolledStudent_Subjects 
				WHERE Reference_Number = '$Reference_Number' 
				AND Semester = '$sem' 
				AND School_Year = '$sy'
				
				";
				$result = $this->db->query($sql);
				
				$Output .= '
				
						   <div style="text-align:center; margin-bottom:40px;">
							<h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;">
							  School year:
							  '.$sy.'
							  </br>
							  </br>
							  Semester:
							  '.$sem.'
							</h4>
						  </div>
					  	  <div id="list_table" style="max-height:400px; overflow-y:auto; margin-top:20px; border-top:solid thin #ccc; border-bottom:solid thin #ccc;">
					  ';	
			
				//Checker
				if($result->num_rows() > 0){
					
					//Table Head
					$Output .= '
					  <table class="table table-striped" style="color:#666">
						<thead>
						  <tr>
							<th>Title</th>
							<th>Day</th>
							<th>Start</th>
							<th>End</th>
							<th>Room</th>
						  </tr>
						</thead>
						<tbody>	
					';
					//Table Boddy
					foreach($result->result_array() as $row1){
						
						$sc = $row1['Sched_Code'];
						
						$sql2 = "
						
						SELECT A.schedcode,A.subjectcode,A.day1,A.day2,A.day3,A.day4,A.day5,A.day6,
	A.from1,A.from2,A.from3,A.from4,A.from5,A.from6,A.to1,A.to2,A.to3,A.to4,A.to5,A.to6,
	A.room1,A.room2,A.room3,A.room4,A.room5,A.room6,B.Course_Title 
						FROM SchedOld AS A 
						JOIN `Subject` AS B 
						ON A.subjectcode = B.Course_Code
						WHERE A.schedcode = '$sc'
						
						
						";
						
						$result2 = $this->db->query($sql2);
						
							if($result2->num_rows() > 0){
								
								foreach($result2->result_array() as $row2){
									
									$days = array(
									
									'day1' => $row2['day1'],
									'day2' => $row2['day2'],
									'day3' => $row2['day3'],
									'day4' => $row2['day4'],
									'day5' => $row2['day5'],
									'day6' => $row2['day6'],
									
									);
									
									$start_time = array(
									
									'from1' => $row2['from1'],
									'from2' => $row2['from2'],
									'from3' => $row2['from3'],
									'from4' => $row2['from4'],
									'from5' => $row2['from5'],
									'from6' => $row2['from6'],
									
									);
									
									$end_time = array(
									
									'to1' => $row2['to1'],
									'to2' => $row2['to2'],
									'to3' => $row2['to3'],
									'to4' => $row2['to4'],
									'to5' => $row2['to5'],
									'to6' => $row2['to6'],
									
									);
									
									$room = array(
									
									'room1' => $row2['room1'],
									'room2' => $row2['room2'],
									'room3' => $row2['room3'],
									'room4' => $row2['room4'],
									'room5' => $row2['room5'],
									'room6' => $row2['room6'],
									
									);
									
									$Output .= "<tr>";
									$Output .= "<td>".$row2['Course_Title']."</td>";
									
								
									//DAY
									$Output .= "<td>";
									foreach($days as $dayrow){
										
										$day_code = $dayrow;
										$day_code = str_replace("N/A","",$day_code);
										//$Output .= $day_code."</br>";
										
											$Output .= 
											'
											<div class="container-fluid">
											<div class="row">
											
											
											';
											
											
											$Output .= 
											'
											<div class="col-sm-12">
											'.$day_code.'
											</div>
											
											';
											$Output .= 
											'
											</div>
											</div>
											
											';
											
										}
									$Output .= "</td>";	
									
									//Start
									$Output .= "<td>";
									foreach($start_time as $s_time){
										
										$start_code = $s_time;
										$start_code = str_replace("N/A","",$start_code);
										
											$Output .= 
											'
											<div class="container-fluid">
											<div class="row">
											
											
											';
											
											
											$Output .= 
											'
											<div class="col-sm-12">
											'.$start_code.'
											</div>
											
											';
											$Output .= 
											'
											</div>
											</div>
											
											';
											
										}
									$Output .= "</td>";
									
									//END
									$Output .= "<td>";
									foreach($end_time as $e_time){
										
										$end_code = $e_time;
										$end_code = str_replace("N/A","",$end_code);
										//$Output .= $end_code."</br>";
										
											$Output .= 
											'
											<div class="container-fluid">
											<div class="row">
											
											
											';
											
											
											$Output .= 
											'
											<div class="col-sm-12">
											'.$end_code.'
											</div>
											
											';
											$Output .= 
											'
											</div>
											</div>
											
											';
										
										}
									$Output .= "</td>";
									
									//Room
									$Output .= "<td>";
									foreach($room as $rooms){
										
										$room_code = $rooms;
										$room_code = str_replace("N/A","",$room_code);
										//$Output .= $room_code."</br>";
										
										$Output .= 
											'
											<div class="container-fluid">
											<div class="row">
											
											
											';
											
											
											$Output .= 
											'
											<div class="col-sm-12">
											'.$room_code.'
											</div>
											
											';
											$Output .= 
											'
											</div>
											</div>
											
											';
										
										}
									$Output .= "</td>";
									
									$Output .= "</tr>";
								}
								
									
							}
							else
							{
									$Output .= "<tr>";
									$Output .= "<td>-</td>";
									$Output .= "<td>-</td>";
									$Output .= "<td>-</td>";
									$Output .= "<td>-</td>";
									$Output .= "<td>-</td>";
									$Output .= "</tr>";
									
							}
						
						}
					
					//Table End
					$Output .= '
						</tbody>
						</table>
						</div>
					';
						
				}
				//No result
				else{
					$Output .= "<h3>You have no records yet.</h3></br>";
					$Output .= "Please visit the SDCA <a style='color:#00F' href='#'> Helpdesk </a> if there are any concerns, Thank you!";
					}
			}
			
			
		}
		
		return $Output;
		
		
		}
	public function SYchoice(){
		
		
		$Student_Number = $this->session->userdata('Student_Number');
		
		$SY_sql = "SELECT School_Year FROM EnrolledStudent_Subjects WHERE Student_Number = '$Student_Number' GROUP BY School_Year";
		$SY_result = $this->db->query($SY_sql);
		
		if($SY_result->num_rows() != 0){
		
		$Output = '<option style="color:#CCC">Select Academic Year:</option>'; 
			
		foreach($SY_result->result_array() as $SY_row)
		  {

		  $Output .= '<option>'.$SY_row['School_Year'].'</option>';
		
		  }
		}else{
			
			$Output = '<option style="color:#CCC">You have no data yet. Proceed to Helpdesk if there are concerns</option>';
			
			}
		
		return $Output;
		}
	
	public function Sem_ajax(){
		
		$q = $_REQUEST["q"];
		$SN = $this->session->userdata('Student_Number');
		$sql = "SELECT Semester FROM EnrolledStudent_Subjects WHERE Student_Number='$SN' AND School_Year = '$q' GROUP BY Semester DESC";
		$result = $this->db->query($sql);
		
		echo '<select class="form-control" name="schedSEM" id="sel2">';
		foreach($result->result_array() as $row){
		echo "<option>".$row['Semester']."</option>";
		}
		echo "</select>";
		
		}
	private function convertSTART($S){
		
		if($S == 700){
			$t = '7:00am';
		}
		else if($S == 730){
			$t = '7:30am';
		}
		else if($S == 800){
			$t = '8:00am';
		}
		else if($S == 830){
			$t = '8:30am';
		}
		else if($S == 900){
			$t = '9:00am';
		}
		else if($S == 930){
			$t = '9:30am';
		}
		else if($S == 1000){
			$t = '10:00am';
		}
		else if($S == 1000){
			$t = '10:00am';
		}
		else if($S == 1030){
			$t = '10:30am';
		}
		else if($S == 1100){
			$t = '11:00am';
		}
		else if($S == 1130){
			$t = '11:30am';
		}
		else if($S == 1200){
			$t = '12:00pm';
		}
		else if($S == 1300){
			$t = '1:00pm';
		}
		else if($S == 1330){
			$t = '1:30pm';
		}
		else if($S == 1400){
			$t = '2:00pm';
		}
		else if($S == 1430){
			$t = '2:30pm';
		}
		else if($S == 1500){
			$t = '3:00pm';
		}
		else if($S == 1530){
			$t = '3:30pm';
		}
		else if($S == 1600){
			$t = '4:00pm';
		}
		else if($S == 1630){
			$t = '4:30pm';
		}
		else if($S == 1700){
			$t = '5:00pm';
		}
		else if($S == 1730){
			$t = '5:30pm';
		}
		else if($S == 1800){
			$t = '6:00pm';
		}
		else if($S == 1830){
			$t = '6:30pm';
		}
		else if($S == 1900){
			$t = '7:00pm';
		}
		else if($S == 1930){
			$t = '7:30pm';
		}
		else if($S == 2000){
			$t = '8:00pm';
		}
		else if($S == 2030){
			$t = '8:30pm';
		}
		else if($S == 2100){
			$t = '9:00pm';
		}
		else if($S == 2130){
			$t = '9:30pm';
		}
		else if($S == 2200){
			$t = '10:00pm';
		}
		else if($S == 2230){
			$t = '10:30pm';
		}
		else{
			$t = " ";
			}
			
			return $t;
			
			
		}
	
	private function convertEND($E){
		
		if($E == 700){
			$t = '7:00am';
		}
		else if($E == 730){
			$t = '7:30am';
		}
		else if($E == 800){
			$t = '8:00am';
		}
		else if($E == 830){
			$t = '8:30am';
		}
		else if($E == 900){
			$t = '9:00am';
		}
		else if($E == 930){
			$t = '9:30am';
		}
		else if($E == 1000){
			$t = '10:00am';
		}
		else if($E == 1000){
			$t = '10:00am';
		}
		else if($E == 1030){
			$t = '10:30am';
		}
		else if($E == 1100){
			$t = '11:00am';
		}
		else if($E == 1130){
			$t = '11:30am';
		}
		else if($E == 1200){
			$t = '12:00pm';
		}
		else if($E == 1300){
			$t = '1:00pm';
		}
		else if($E == 1330){
			$t = '1:30pm';
		}
		else if($E == 1400){
			$t = '2:00pm';
		}
		else if($E == 1430){
			$t = '2:30pm';
		}
		else if($E == 1500){
			$t = '3:00pm';
		}
		else if($E == 1530){
			$t = '3:30pm';
		}
		else if($E == 1600){
			$t = '4:00pm';
		}
		else if($E == 1630){
			$t = '4:30pm';
		}
		else if($E == 1700){
			$t = '5:00pm';
		}
		else if($E == 1730){
			$t = '5:30pm';
		}
		else if($E == 1800){
			$t = '6:00pm';
		}
		else if($E == 1830){
			$t = '6:30pm';
		}
		else if($E == 1900){
			$t = '7:00pm';
		}
		else if($E == 1930){
			$t = '7:30pm';
		}
		else if($E == 2000){
			$t = '8:00pm';
		}
		else if($E == 2030){
			$t = '8:30pm';
		}
		else if($E == 2100){
			$t = '9:00pm';
		}
		else if($E == 2130){
			$t = '9:30pm';
		}
		else if($E == 2200){
			$t = '10:00pm';
		}
		else if($E == 2230){
			$t = '10:30pm';
		}
		else{
			$t = " ";
			}
			
			return $t;
			
			
		}
	
	
}

?>