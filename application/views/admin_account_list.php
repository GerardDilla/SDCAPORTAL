<script type="text/javascript">
  $(document).ready(function(){
        document.getElementById("btn1").disabled = true;
		document.getElementById("btn2").disabled = true;
		document.getElementById("btn3").disabled = true;
    });

</script>

<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Accounts</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer">
<!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:20px; margin-bottom:30px; min-width:100%; overflow:auto;">
  <h3 style="color:#666"> <!--Message--!-->
    <?php 
			$msg = $this->session->userdata('msg'); 
			echo $msg; 
      $this->session->unset_userdata('msg');
      echo $this->session->flashdata('Admin_Reg_message');
      $this->session->set_flashdata('Admin_Reg_message','');
			?>
  </h3>
  <div class="form-group" style="margin-top:30px;"> <!--Search--!-->
    
    <form method="get" action="<?php echo site_url(); ?>index.php/administrator/account_search" class="inline">
      <input type="text" class="form-control" id="search" name="query" placeholder="Search..">
      <button class="btn btn-info inline" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Search</button>
      <button class="btn btn-info inline" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="button" data-toggle="modal" data-target="#printmodal" >Print Account List</button>
    </form>
  </div>
  <div id="list_table" style="max-height:400px; overflow-y:auto; ">
    <table class="table table-striped" style="color:#666; font-size:16px; max-height:400px; overflow-y:auto;">
      <thead>
        <tr>
          <th>Student Number</th>
          <th>FirstName</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Student Portal</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		
			echo $Account_list;
			
		?>
      </tbody>
    </table>
  </div>
  <?php
	echo "<div class='pagination' id='pagination'>".$this->pagination->create_links()."</div>";
	?>
</div>
<!--BODY--!--> 

<!-- Modal -->
<div id="editmodal" class="modal fade container-fluid" role="dialog" >
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px;font-family:Verdana, Geneva, sans-serif;">
      <div class="modal-header"> <!-- Modal Header-->
        
        <input type='text' class='firstname' value="" readonly style='border:none; font-size:24px; color:#666'>
        <button type="button" style="color:#666;" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal Header End-->
      
      <div class="modal-body"> <!-- Modal Body-->
        
        <div class="row"><!-- Row-->
          
          <div id="accountpic" class="img-thumbnail img-responsive">AJAX</div>
          <button class="btn btn-info center-block" style="margin-bottom:10px;" type="submit" onclick="enable()">Enable options <span class="glyphicon glyphicon-pencil"></span></button>
          <script>
				function enable() {
					
   			document.getElementById("btn1").disabled = false;
				document.getElementById("btn2").disabled = false;
				document.getElementById("btn3").disabled = false;
				
									   }
			 </script>
          <div class="col-md-4">
            <form action="<?php echo site_url(); ?>index.php/administrator/reset_password" method="post">
              <input type='hidden' class='SN_ID' name="R_PASS" value="" readonly>
              <button style="width:100%;" class="btn btn-success center-block" type="submit" id="btn1">Reset Password</button>
            </form>
          </div>
          <div class="col-md-4">
            <form action="<?php echo site_url(); ?>index.php/administrator/reset_email" method="post">
              <input style="width:100%;" type='email' name="R_EML" value="" required placeholder="Enter SDCA Email">
              <input type='hidden' class='SN_ID' name="R_EML_ID" value="" readonly>
              <button style="width:100%;" class="btn btn-success center-block" type="submit" id="btn2">Change Email</button>
            </form>
          </div>
          <div class="col-md-4">
            <form action="<?php echo site_url(); ?>index.php/administrator/reset_picture" method="post">
              <input type='hidden' class='SN_ID' name="R_PIC" value="" readonly>
              <button style="width:100%;" class="btn btn-success center-block" type="submit" id="btn3">Reset Picture</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Row End--> 
      
    </div>
    <!-- Modal Body End--> 
    
  </div>
  <!--modalend--!--> 
</div>

<!-- Modal -->
<div id="printmodal" class="modal fade container-fluid" role="dialog" >
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px;font-family:Verdana, Geneva, sans-serif;">
      <div class="modal-header"> <!-- Modal Header-->
        <h4>Print Account List</h4>
        <button type="button" style="color:#666;" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal Header End-->
      
      <div class="modal-body"> <!-- Modal Body-->

            <div class="container" style="width:100%">
              <form action="<?php echo base_url(); ?>index.php/Administrator/account_list_print" method="post" >
              <div class="row">
                <div class="col-md-6">
                  <label>Select Range (Year):</label><br>
                  <table>
                    <tbody>
                      <tr>
                        <td><span>From:</span></td>
                        <td><input type="number" name="range1" placeholder="Ex: 2012"></td>
                      <tr>
                      <tr>
                        <td><span>To:</span></td>
                        <td><input type="number" name="range2" placeholder="Ex: 2015"></td>
                      <tr>
                    <tbody>
                  </table>
                  <br>
                  <button class="btn btn-success" name="rangeselect">Print Specified Range</button>
                </div>

                <div class="col-md-6">
                  <label>Specific Year:</label><br>
                  <input type="number" name="specific" placeholder="Ex: 2015">
                  <br><br><br>
                  <button class="btn btn-success" name="dateselect">Print Specified Date</button>
                </div>

              </div>
              <br><br>
              <div style="text-align:center">
              <button class="btn btn-info" name="allselect">Print Complete List</button>
              </div>
            </div>

        </div>
      </div>
      <!-- Row End--> 
      
    </div>
    <!-- Modal Body End--> 
    
  </div>
  <!--modalend--!--> 
</div>

<script>

function openmodal(){

}
</script> 
<script>
function showpic(str) {
  var xhttp;
  $("#editmodal").modal('show');
  $('.firstname').val(str);
  $('.SN_ID').val(str);
  
  if (str == "") {
    document.getElementById("accountpic").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("accountpic").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/administrator/account_manage?q="+str, true);
  xhttp.send();
  
  
}
</script> 
