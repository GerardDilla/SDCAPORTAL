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
    <h3 style="margin-bottom:20px; color:#666;"><!--Message--!-->
      <?php 
			$msg = $this->session->userdata('aw_msg'); 
			echo $msg; 
			$this->session->unset_userdata('aw_msg');
	   ?>
    </h3>
    </label>
    <!--NAVTAB--!-->
    <ul class="nav nav-tabs" style="margin-top:50px">
      <li class="active" ><a data-toggle="tab" href="#home">Register award</a></li>
      <li ><a data-toggle="tab" href="#menu1">Give award</a></li>
    </ul>
    <!--NAVTAB--!-->
    
    
    <!--NAVTAB1--!-->
    <div class="tab-content">
      
      <div id ="home" class="tab-pane fade in active">
        <div class="form-group"> </br>
          </br>
          <?php echo form_open_multipart('index.php/administrator/submit_award');?>
              <label for="event">Award Title:</label>
              <input type="text" class="form-control" id="event" name="aw_title">
              <label for="date">Location:</label>
              <input type="text" class="form-control" id="event" name="aw_location">
              <label for="loc">Role:</label>
              <input type="text" class="form-control" id="loc" name="aw_role">
              <label class="btn btn-info" for="my-file-selector" style="margin-top:10px;">
              <input id="my-file-selector" name="userfile" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                Choose image </label>
              <span class='label label-info' id="upload-file-info"></span> </br>
              <button style="margin-top:10px; width:150px;" class="btn btn-success center-block" name="submit" value="upload image" type="submit">Submit</button>
          </form>
        </div>
      </div>
      <!--NAVTAB1--!-->
      
      <div id ="menu1" class="tab-pane fade"><!--NAVTAB2--!--> 
        </br>
        <div class="form-group">
          <form class="form-inline" action="" method="post">
            <input type="text" class="form-control"  placeholder="Search Student" onkeyup="student_search(this.value)"/>
            <div style="float:right" >
              <button type="button" class="btn btn-info glyphicon glyphicon-check inline" onclick="check()"></button>
              <button type="button" class="btn btn-info glyphicon glyphicon-unchecked" onclick="uncheck()"></button>
            </div>
          </form>
        </div>
        
        </br>
        </br>
        <form action="<?php site_url(); ?>award_give" method="post">
          <label for="dept">Select Award:</label>
          <select class="form-control" id="awd_give" name="awd_give">
            <?php 
				
					echo $awards_options;
				
				?>
          </select>
          <div id="students" style="max-height:300px; overflow-y:auto;"> </div>
          <button style="margin-top:10px; width:150px;" onclick="confirm()" class="btn btn-success center-block" name="submit" type="submit"> Submit </button>
        </form>
        
      </div>
      <!--NAVTAB2--!--> 
      
    </div>
  </div>
</div>
<!--BODY--!--> 

<script>
function student_search(str) {
  var xhttp;
 
  if (str == "") {
    document.getElementById("students").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("students").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Administrator/search_student?q="+str, true);
  xhttp.send();

  
}
</script> 
<script>
			function check(){
            var chk = document.getElementsByClassName('chk');
			var i;
			for (i = 0; i < chk.length; i++) {
       				 chk[i].checked = true;
   				 }
			}
			function uncheck(){
            var chk = document.getElementsByClassName('chk');
			var u;
			for (u = 0; u < chk.length; u++) {
       				 chk[u].checked = false;
   				 }
				}
</script> 
<script>
			function confirm(){
				var txt;
   			    var r = confirm("Delete Entry?");
   				 if (r == true) {
					var id_load = $( "#id_load" ).val();
					$('#id_del').val(id_load);
		
       
   				 } else {
		
        
   				 }
						 
						 }
</script> 