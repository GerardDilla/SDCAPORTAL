
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
        <div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Accounts</div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; height:500px; overflow-y:auto;">
			
            <div class="form-group" style="margin-top:30px;">
            <form method="post" action="account_search">
  				<label for="search">Student Number:</label>
 				 <input type="text" class="form-control" id="search" name="query">
                 
                 
                 
          <button class="btn" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Search</button>
          <form action="admin_account_list" method="post">
          <button class="btn" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Refresh</button></form>
            </form>
			</div>
            
            

  
        
        
        
        
           <table class="table table-striped" style="color:#666;">
          <thead>
      <tr>
        <th>Student Number</th>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Last Time-In</th>
        <th>Last Time-out</th>
        <th>Active</th>
      </tr>
    </thead>
    <tbody>
    <?php 
	$result = $this->db->query($list);
	 foreach($result->result_array() as $row){
		$SN = $row['Student_Number'];
		
		$sql = "SELECT * FROM student_info WHERE Student_Number='$SN' GROUP BY Reference_Number";
		$result2 = $this->db->query($sql);
	
	 echo '<tr>';
	  echo '<td id="'.$SN.'" >'.$row['Student_Number'].'</td>';
	  foreach($result2->result_array() as $row2){
	  echo '<td>'.$row2['First_Name'].'</td>';
	  echo '<td>'.$row2['Last_Name'].'</td>';
	  }
	  echo '<td>'.$row['Email'].'</td>';
	  echo '<td>'.$row['Time_In'].'</td>';
	  echo '<td>'.$row['Time_Out'].'</td>';
	  echo '<td>'.$row['Active'].'</td>';
	  //echo '<td><button class="btn" style="width:150px">Reset Password</button></td>';
	 // echo '<td><button class="btn" style="width:120px">Lock Account</button></td>';
	  //echo '<td><button class="btn btn-success" style="width:135px">Unlock Account</button></td>';
	 echo '</tr>';
	

	 }
	
	?>
 
    </tbody>
            </table>
            
          </div>
         
        </div><!--BODY--!-->
 