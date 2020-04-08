<?php


class Notif extends CI_Model{
	

	public function getList(){
		
		$Student_Number = $this->session->userdata('Student_Number');
		$Output = "";
		$sql = "SELECT * FROM notification_archive WHERE Student_Number='$Student_Number' AND active='1' ORDER BY Notif_Date ASC";
		$result = $this->db->query($sql);
		
		
		if($result->num_rows() > 0){
			
			$Output .= '
				
				<button class="btn btn-info glyphicon glyphicon-check inline" onclick="check()"></button>
				<button class="btn btn-info glyphicon glyphicon-unchecked" onclick="uncheck()"></button>
				</br></br>
        		<div style="max-height:300px; overflow-y:auto;">
				<form action="delete_selected" method="post">
				<table class="table table-striped" style="color:#666">
				<thead>
				<tr>
				<th>Notfication</th>
				</tr>
				</thead>
				
				<tbody>
			
			';
				
			foreach($result->result_array() as $row){
				
				$Output .= "<tr>";
				$Output .= "<td style='color:#f00'><strong>".$row['Notif_content']."</strong></td>";
				$Output .= "<td>";
				$Output .= "<label><input class='chk' type='checkbox' name='getval[]' value='".$row['notif_archive_ID']."'></label>";
				$Output .= "</td>";
				$Output .= "</tr>";
				
				
				}
				
				
			$Output .= '
			
				</tbody>
				</table>
				</div> 
				<button class="btn btn-info">Delete Selected</button>
				</form>
				</br></br>
				<form action="delete_all" method="post">
				<button class="btn btn-info">Delete All</button>
				</form>
				</div>
			
			';
				
				
		}else{
			
				$Output .= '<h3 style="color:#666">No Notifications</h3>';
			
			}
			
			
			return $Output;
		
		}
	public function delete_selected(){
		
		$val = $this->input->post('getval');
		$Student_Number = $this->session->userdata('Student_Number');
		if($val != ""){
			foreach($val as $value){
			
			echo $value;
			$sql = "UPDATE notification_archive SET active = '0' WHERE Student_Number='$Student_Number' AND notif_archive_ID='$value'";
			$result = $this->db->query($sql);
			}
			
		}else{
			
			}
		
		}
	public function delete_all(){
		
		
		$Student_Number = $this->session->userdata('Student_Number');
		
		$sql = "UPDATE notification_archive SET active = '0' WHERE Student_Number='$Student_Number'";
		$result = $this->db->query($sql);
		
		}
		
	public function read(){
		
		$SN = $this->session->userdata('Student_Number');
		$getnotif = "SELECT * FROM notification_archive WHERE Student_Number = '$SN'" ;
		$notifresult = $this->db->query($getnotif);
		$notifno = $notifresult->num_rows();
		$upd_notif= "UPDATE student_notifications SET Notif_no='$notifno' WHERE Student_Number='$SN'";
		$upd_notif_query = $this->db->query($upd_notif);
		
		}
	public function notif_bell2(){
		
		$SN = $this->session->userdata('Student_Number');
		$getNotif = "SELECT * FROM notification_archive WHERE Student_Number = '$SN'" ;
		$Notifresult = $this->db->query($getNotif);
		$Notifno = $Notifresult->num_rows();
		
		$compare_Notif = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Notif_no = '$Notifno'";
		$compare_Notif_result = $this->db->query($compare_Notif);
		
		if($compare_Notif_result->num_rows() != 1){
				
				echo "<a href='".base_url()."index.php/Student/Notif_read' class='glyphicon glyphicon-bell Notifbell glow' style='color:#fff'></a>";
				//$upd_award = "UPDATE student_Notifications SET Notif_no='$Notifno' WHERE Student_Number='$SN'";
				//$upd_award_query = $this->db->query($upd_award);
							
		}else{
			echo "<a href='".base_url()."index.php/Student/Notification' class='glyphicon glyphicon-bell Notifbell' style='color:#fff'></a>";
			}
		
		}	
	public function Notif(){
		
		//AJAX 
		$SN = $this->session->userdata('Student_Number');
		$check_sql = "SELECT * FROM student_notifications WHERE Student_Number = '$SN'";
		$result = $this->db->query($check_sql);
		
		//get total number of grades
			$getgrade = "SELECT * FROM Grading WHERE Student_Number = '$SN'" ;
			$graderesult = $this->db->query($getgrade);
			$gradeno = $graderesult->num_rows();
			
			//get total number of balance
			$getbal = "SELECT * FROM EnrolledStudent_Fees WHERE studentnumber = '$SN'" ;
			$balresult = $this->db->query($getbal);
			$balno = $balresult->num_rows();
			
			//get total number of balance
			$getevent = "SELECT * FROM event_calendar" ;
			$eventresult = $this->db->query($getevent);
			$eventno = $eventresult->num_rows();
			
			//get total number of balance
			//$getvio = "SELECT * FROM violations_table WHERE violations_student_number = '$SN'" ;
			//$vioresult = $this->db->query($getvio);
			//$viono = $vioresult->num_rows();
			
			$getawards = "SELECT * FROM student_awards WHERE Student_Number = '$SN'" ;
			$awardresult = $this->db->query($getawards);
			$awardno = $awardresult->num_rows();
			
			$getnotif = "SELECT * FROM notification_archive WHERE Student_Number = '$SN'" ;
			$notifresult = $this->db->query($getnotif);
			$notifno = $notifresult->num_rows();
			
			$sample = "sample";
			
		if($result->num_rows() != 0){
			
			$compare_grade = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Grade_no = '$gradeno'";
			$compare_grade_result = $this->db->query($compare_grade);
			
			$compare_bal = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Balance_no = '$balno'";
			$compare_bal_result = $this->db->query($compare_bal);
			
			$compare_event = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Event_no = '$eventno'";
			$compare_event_result = $this->db->query($compare_event);
			
			//$compare_vio = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Violation_no = '$viono'";
			//$compare_vio_result = $this->db->query($compare_vio);
			
			$compare_award = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Awards_no = '$awardno'";
			$compare_award_result = $this->db->query($compare_award);
			
			$compare_notif = "SELECT * FROM student_notifications WHERE Student_Number = '$SN' AND Notif_no = '$notifno'";
			$compare_notif_result = $this->db->query($compare_notif);
			
			
			if($compare_grade_result->num_rows() != 1){
				
				$grade_notif = "<a href=''grades''>Grade Update</a>";
				echo "<div class='msg' >";
				echo "<span class='glyphicon glyphicon-exclamation-sign'></span> New set of grades has been added! Check it <a href='grades'>Here</a> &nbsp <a style='float:right' onclick='dismiss(this)'>&times</a>";
				echo "</div>";
				
				$upd_grade = "UPDATE student_notifications SET Grade_no='$gradeno' WHERE Student_Number='$SN'";
				$upd_grade_query = $this->db->query($upd_grade);
				
				$insert_grade = "INSERT INTO notification_archive(Student_Number,Notif_content,active) VALUES	('$SN','$grade_notif','1')";
				$insert_grade_query = $this->db->query($insert_grade);
				
				}
			else if($compare_bal_result->num_rows() != 1){
				
				$bal_notif = "<a href=''balance''>Balance Update</a>";
				echo "<div class='msg' >";
				echo "<span class='glyphicon glyphicon-exclamation-sign'></span> New set of Balance has been added! Check it <a href='balance'>Here</a> &nbsp <a style='float:right' onclick='dismiss(this)'>&times</a>";
				echo "</div>";
				
				$upd_bal = "UPDATE student_notifications SET Balance_no='$balno' WHERE Student_Number='$SN'";
				$upd_bal_query = $this->db->query($upd_bal);
				
				$insert_bal = "INSERT INTO notification_archive(Student_Number,Notif_content,active) VALUES	('$SN','$bal_notif','1')";
				$insert_bal_query = $this->db->query($insert_bal);
				
				}
			else if($compare_event_result->num_rows() != 1){
				
				$event_notif = "<a href=''event''>New Event</a>";
				echo "<div class='msg' >";
				echo "<span class='glyphicon glyphicon-exclamation-sign'></span> There's a new Event! Check it <a href='event'>Here</a> &nbsp <a style='float:right' onclick='dismiss(this)'>&times</a>";
				echo "</div>";
				
				$upd_event = "UPDATE student_notifications SET Event_no='$eventno' WHERE Student_Number='$SN'";
				$upd_event_query = $this->db->query($upd_event);
				
				$insert_event = "INSERT INTO notification_archive(Student_Number,Notif_content,active) VALUES	('$SN','$event_notif','1')";
				$insert_event_query = $this->db->query($insert_event);
				
				}
			//else if($compare_vio_result->num_rows() != 1){
				
				//$vio_notif = "<a href=''Sanctions''>Received a Violation</a>";
				
				//echo "<div class='msg' >";
				//echo "<span class='glyphicon glyphicon-exclamation-sign'></span> There's an update in your Violation page. Check it <a href='Sanctions'>Here</a> &nbsp <a style='float:right' onclick='dismiss(this)'>&times</a>";
				//echo "</div>";
				
				//$upd_vio = "UPDATE student_notifications SET Violation_no='$viono' WHERE Student_Number='$SN'";
				//$upd_vio_query = $this->db->query($upd_vio);
				
				//$insert_vio = "INSERT INTO notification_archive(Student_Number,Notif_content,active) VALUES	('$SN','$vio_notif','1')";
				//$insert_vio_query = $this->db->query($insert_vio);
				
				//}
			else if($compare_award_result->num_rows() != 1){
				
				$award_notif = "<a href=''awards''>Received an Award</a>";
				
			    echo "<div class='msg' >";
			    echo "<span class='glyphicon glyphicon-exclamation-sign'></span> You've received an Award! Check it <a href='awards'>Here</a> &nbsp <a style='float:right' onclick='dismiss(this)'>&times</a>";
			    echo "</div>";
			   
				$upd_award = "UPDATE student_notifications SET Awards_no='$awardno' WHERE Student_Number='$SN'";
				$upd_award_query = $this->db->query($upd_award);
				
				$insert_award = "INSERT INTO notification_archive(Student_Number,Notif_content,active) VALUES	('$SN','$award_notif','1')";
				$insert_award_query = $this->db->query($insert_award);
				
				}
			
			//else if($compare_notif_result->num_rows() != 1){
				
				//$ses = array('notify' => );
				//$upd_award = "UPDATE student_notifications SET Notif_no='$notifno' WHERE Student_Number='$SN'";
				//$upd_award_query = $this->db->query($upd_award);
							
				//}
		
			//echo "test123";
			//echo $gradeno.", ";
			//echo $balno.", ";
			//echo $eventno.", ";
			//echo $viono.", ";
			//echo $awardno.", ";
			//echo $notifno.", ";
			//echo "normal process";
			
			
			
		}else{
		
			$addnewsql = "INSERT INTO student_notifications (Student_Number,Grade_no,Balance_no,Event_no,Violation_no,Awards_no,Notif_no) VALUES	('$SN','$gradeno','$balno','$eventno','0','$awardno','$notifno')";
			$addnewresult = $this->db->query($addnewsql);
	
		}
		
		
		
		}
		


}
?>