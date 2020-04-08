<?php $admin_ID = $this->session->userdata('ID'); 

		$msg_event = $this->session->userdata('message');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('<?php echo $modal; ?>');
    });
</script>

<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-calendar"></span> Events</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
  <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
    <?php 
		echo $msg_event;
		$this->session->unset_userdata('message');	
		?>
    <form class="form-inline" action="#" method="post" style="margin-top:20px; display:inline-block;" >
      <label for="event_src">Search Name:</label>
      <input type="text" id="event_src" name="event_src" />
      <button class="btn btn-info" type="submit">Search <span class="glyphicon glyphicon-search"></span></button>
    </form>
    </br>
    <form class="form-inline" style="margin-top:20px; display:inline-block;" action="event_category" method="post">
      <label for="cate">Department:</label>
      <select style="width:250px;" class="form-control" id="cate" name="cate">
        <option>All</option>
        <option>SIHTM</option>
        <option>SASE</option>
        <option>SHSP</option>
        <option>SBCS</option>
      </select>
      <button class="btn btn-info" type="submit">Sort</button>
    </form>
    <form class="form-inline" style="margin-top:20px; display:inline-block;" action="event" method="post">
      <button class="btn btn-info" type="submit">Refresh</button>
    </form>
    <div style="max-height:300px; overflow-y:auto;">
      <table class="table table-striped" style="color:#666">
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            <th>Department</th>
          </tr>
        </thead>
        <tbody>
          <?php 
	
		echo $events_list
	
	?>
        </tbody>
      </table>
    </div>
  </div>
  <?php 
              
            
    ?>
</div>
<!--BODY--!--> 

<!-- Modal -->

<div id="myModal" class="modal fade container-fluid" role="dialog" tabindex="-1">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px;font-family:Verdana, Geneva, sans-serif;">
      <div class="modal-header">
        <button type="button" style="color:#666;" class="close" data-dismiss="modal">&times;</button>
        <br /><br />
      </div>
      <div class="modal-body" id="modal-event-cont">
        
      </div>
    </div>
  </div>
</div>
<!--modalend--!-->
<script>
function eventmodal(str) {
  var xhttp;
  $("#myModal").modal('show');
  $('#event_edit_button').val(str);
  
  if (str == "") {
    document.getElementById("modal-event-cont").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("modal-event-cont").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/administrator/event_manage?q="+str, true);
  xhttp.send();
  
  
}
</script> 
