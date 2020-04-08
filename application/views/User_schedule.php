<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-dashboard"></span> Schedule</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
  <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;"> </br>
    <div class="panel-group" id="accordion" style="min-width:250px;"><!--accordion1--!-->
      <div class="panel panel-default" ><!--panel1--!-->
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <div class="panel-heading" style="background-color:#666; color:#FFF;">
              <h4 class="panel-title"> 
              Choose Year and Semester:  
              </h4>
            </div>
            </a>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
            <form action="" method="post" style="margin-top:30px;">
              <div class="form-group">
                <label for="sel1">Academic Year:</label>
                <select class="form-control" name="schedSY" id="sel1" onchange="showcont(this.value)">
                  <!--School Year--!-->
                  <?php
	  			  
				  echo $SYlist;
					
	  			  ?>
                  <!--School Year--!-->
                </select>
              </div>
              <div id="cont_appear" class="form-group" style="display:none;">
                <label for="sel1">Semester:</label>
                <div id="acad_sem">
                  <select class="form-control" name="getSEM" id="sel2">
                    <!--AJAX--!--> 
                    
                    <!--AJAX--!-->
                  </select>
                </div>
              </div>
              <button id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; margin-top:20px; width:100px; display:none;	" name="submit" id="submitD" type="submit">
              Select
              </button>
            </form>
          </div>
        </div>
      </div>
      <!--panel1--!--> 
    </div>
    <!--accordion--!--> 
    
    <!--CONTENT--!-->
    
    <?php
	
		echo $Schedule_Output;
		
	?>
    
    <button class="btn btn-success center-block" style="margin:auto; margin-bottom:30px; margin-top:50px; display:none;" 
	data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-print"> </span> </button>
    <!--CONTENT--!--> 
    
    <script type="text/javascript">
			
            function printpage(){
				window.print();
				}
    </script>
    
  </div>
  
  
</div>
<!--BODY--!--> 
<script>
function showcont(str) {
  var xhttp;
 
  if (str == "") {
    document.getElementById("acad_sem").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("acad_sem").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/sched_sem?q="+str, true);
  xhttp.send();
  cont_appear.style.display="block";	
  btn_appear.style.display="block";	
  
}
</script> 
