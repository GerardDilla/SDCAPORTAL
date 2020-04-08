<?php 
$subject = $this->input->post('subj');
echo $subject;
$en_date = $this->input->post('en_date');
$en_cont = $this->input->post('en_cont');
echo $en_date;
echo $en_cont; 


$First_Name = $this->session->userdata('First_Name');
$Middle_Name = $this->session->userdata('Middle_Name');
$Last_Name = $this->session->userdata('Last_Name');
$Course = $this->session->userdata('Course');
$YearLevel = $this->session->userdata('YearLevel');
$Address_No = $this->session->userdata('Address_No');
$Address_Street = $this->session->userdata('Address_Street');
$Address_Subdivision = $this->session->userdata('Address_Subdivision');
$Address_Barangay = $this->session->userdata('Address_Barangay');
$Address_City = $this->session->userdata('Address_City');
$Address_Province = $this->session->userdata('Address_Province');
$Email = $this->session->userdata('Email');
$Cp_No = $this->session->userdata('Cp_No');
$Tel_No = $this->session->userdata('Tel_No');
$Student_Number = $this->session->userdata('Student_Number');
$logged_in = $this->session->userdata('logged_in');
$en_msg = $this->session->userdata('en_msg');



		
?>
<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
  <div class="col-md-12"><!--HEADER--!-->
    
    <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-book"></span> My Diary</div>
  </div>
  <!--HEADER--!-->
  
  <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
    <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
      <h3><?php echo $en_msg; $this->session->unset_userdata('en_msg'); ?></h3>
      <h3><?php echo validation_errors(); ?></h3>
      </br>
      <button class="btn btn-info" id="new" onClick="showEditor()">Write New Entry</button>
      </br>
      </br>
      <form action="Diary" method="post">
        <div class="form-group">
          <div class="input-group add-on">
            <input type="text" class="form-control" placeholder="Search Entry.." name="en_search" >
            <div class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              <button class="btn btn-info" name="en_search" value=" " type="submit"><i class="glyphicon glyphicon-refresh"></i></button>
            </div>
          </div>
          <div class="notebook">
            <ul class='list'>
              <li><strong>- Saved Entries:</strong></li>
              <?php
				
				echo $Diary_Output;
				
			  ?>
            </ul>
          </div>
        </div>
      </form>
    </div>
    
    
    <!------------------------ DIARY NEW ENTRY ------------------------>
    <!-- Modal -->
    <div id="NewEntry" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:#FFF; opacity:1;">&times;</button>
          </br>
          </br>
        </div>
        
        <!-- Modal content-->
        <div class="modal-content" id="login" style="display:block">
          <div class="modal-body form-group">
            <form action="Diary_entry" method="post" id="entryform" onsubmit = "return checkForm( this )">
              <hr/>
              <label for="subj">Subject: </label>
              <input type="text" class="form-control" name="subj" required>
              <label for="en_date">Date: </label>
              <input type="date" class="form-control" name="en_date" value="<?php echo date("Y/m/d"); ?>" required>
              </br>
              </br>
              <textarea class="ckeditor" id="editor" name="en_cont" form="entryform" required></textarea>
              </br>
              <button class="center-block btn btn-success" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
     <!-- Modal -->
    <!------------------------ DIARY NEW ENTRY ------------------------>
    
    
    
    <!------------------------ DIARY VIEW ENTRY ------------------------>
    <!-- Modal -->
    <div id="ReadEntry" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-header">
          <form action="Diary_delete" method="post">
            <input type='hidden' id='id_del' name="id_del" readonly>
            <button type="submit" class="btn btn-danger" onclick="Delete()"><span class="glyphicon glyphicon-remove"></span></button>
            <span class="btn btn-info" onclick="Edit()"><span class="glyphicon glyphicon-pencil"></span></span>
          </form>
          <button type="button" class="close" data-dismiss="modal" style="color:#FFF; opacity:1;">&times;</button>
        </div>
        
        <!-- Modal content-->
        <div class="modal-content" id="login" style="display:block">
          <div class="modal-body form-group" style="overflow-y:auto; max-height:500px;">
            <hr/>
            <div id="Diary"></div>
            </br>
          </div>
        </div>
        <div class="modal-footer"> </div>
      </div>
    </div>
    
    <!-- Modal --> 
    <!------------------------ DIARY VIEW ENTRY ------------------------>
    
    
    <!------------------------ DIARY EDIT ENTRY ------------------------>
    <!-- Modal -->
    <div id="EditEntry" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-header">
          <h3 style="color:#FFF; font-family:Verdana, Geneva, sans-serif;">Edit Entry</h3>
          <button type="button" class="close" data-dismiss="modal" style="color:#FFF; opacity:1;">&times;</button>
        </div>
        
        <!-- Modal content-->
        <div class="modal-content" id="login" style="display:block">
        <div class="modal-body form-group" style="overflow-y:auto; max-height:500px;">
        <form action="Diary_edit" method="post" id="editform" onsubmit = "return checkForm( this )">
          <hr/>
          <label for="subj">Subject: </label>
          <input type="text" class="form-control" id="subj_edit" name="subj_edit" required>
          <label for="en_date">Date: </label>
          <input type="date" class="form-control" id="en_date_edit" name="en_date_edit" required>
          <input type="hidden" class="form-control" id="id_edit" name="id_edit">
          </br>
          </br>
          <textarea class="ckeditor" id="entry_edit" name="entry_edit" form="editform" required>
         
         
         
         </textarea>
          </br>
          </br>
          </div>
          </div>
          <div class="modal-footer">
          <button class="btn btn-success" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Modal --> 
  <!------------------------ DIARY EDIT ENTRY ------------------------>
  
  
  
</div>
<!--BODY--!--> 

<script>

function showEditor(){
	

        $("#NewEntry").modal('show');

}
function Edit(){
	
		
        $("#EditEntry").modal('show');
		$("#ReadEntry").modal('hide');
		var subj_load = $( "#subj_load" ).val();
		var date_load = $( "#date_load" ).val();
		var cont_load = $( "#cont_load" ).val();
		var id_load = $( "#id_load" ).val();
		
		$('#subj_edit').val(subj_load);
		$('#en_date_edit').val(date_load);
		$('#entry_edit').val(cont_load);
		$('#id_edit').val(id_load);
		$('#E_area').html(cont_load);
		
		CKEDITOR.instances.entry_edit.insertHtml(cont_load);
		


}
function Delete(){
	
	
	var txt;
    var r = confirm("Delete Entry?");
    if (r == true) {
		var id_load = $( "#id_load" ).val();
	$('#id_del').val(id_load);
		
       
    } else {
		
        
    }
    
	
}
</script> 
<script>
function showCustomer(str) {
  var xhttp;
 
  if (str == "") {
    document.getElementById("Diary").innerHTML = "";
	$("#ReadEntry").modal('hide');
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("Diary").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/Diary_load?q="+str, true);
  xhttp.send();
  $("#ReadEntry").modal('show');
  CKEDITOR.instances.entry_edit.setData("");
  
}


function checkForm( theForm )
{
  var result = /[^a-z0-9\\,\\.\\;]/g( theForm.data.value );

  if( result )
  {
    alert('One or more illegal characters were found, the first being character ' + ( result.index + 1 ) + ' "' + result +'".\
\
Please edit your input.');
  }

  return !result;
}
</script> 
