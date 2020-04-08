<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-thumbs-up"></span> Awards</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
  <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; max-height:auto; overflow-y:auto;">
    <h3 style="margin-bottom:20px; color:#666;">
        <?php 
			$update = $this->session->userdata('u_aw_msg');
			echo $update;
			$this->session->unset_userdata('u_aw_msg');
	  	?>
    </h3>
    <form class="form-inline" action="#" method="post" style="margin-top:20px; display:inline-block;" >
      <label for="awd_src">Search Name:</label>
      <input type="text" id="awd_src" name="awd_src" placeholder=" Search..." />
      <button class="btn btn-info" type="submit">Search <span class="glyphicon glyphicon-search"></span></button>
    </form>
    <table class="table table-striped" style="color:#666">
      <thead>
        <tr>
          <th>Award ID</th>
          <th>Title</th>
          <th>Location</th>
          <th>Date uploaded</th>
          <th>Role</th>
          <th>Certificate</th>
          <th>Admin ID</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
	  
	 		echo $Awards_list;

      	?>
      </tbody>
    </table>
  </div>
</div>
<!--BODY--!--> 

<!--Modal--!-->
<div id="awardModal" class="modal imgmodal" tabindex="-1"> <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span> <img class="modal-content imgmodal-content" id="img01">
  <div id="caption"></div>
</div>

<!-- Modal -->

<div id="editModal" class="modal fade container-fluid" role="dialog" tabindex="-1">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px;font-family:Verdana, Geneva, sans-serif;">
      <div class="modal-header">
        <button type="button" style="color:#666; float:right; border:0; background-color:#FFF; font-size:18px;" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="modal_award_content"> 
	  
	  	
        
      </div>
    </div>
  </div>
</div>
<!--modalend--!--> 
<script>
var awardselect = getElementByID("my-file-selector");
awardselect.onchange = function(){
	
	$('#upload-file-info').html($(this).val());
	
	};



function awardmodal(str) {
  var xhttp;
  $("#editModal").modal('show');
  $('#award_edit_button').val(str);
  
  if (str == "") {
    document.getElementById("modal_award_content").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("modal_award_content").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/administrator/award_manage?q="+str, true);
  xhttp.send();
  
  
}
</script> 

