
<!--content--!-->
<style>
.border-label{
  background-color: #800;
  color: #fff; 
}
h4{
  padding-top:  20px;
  padding-left: 20px;
}

h5{
  font-size: 24px;
  font-weight: 600;
}

.label-data{
  color: green;
}
</style>

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> RESULT</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer">
<!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:20px; margin-bottom:30px; min-width:100%; overflow:auto;">
<h1></h1><br>



<form action="<?php echo site_url();?>index.php/Administrator/eval_results" method="post" style="margin-top:30px;">
<input type="hidden" id="custId" name="sample" value="">
  <div class="col-md-12">
     <div class="form-group">
          <label for="sel1" style="font-size: 20px; font-weight: 700; color: #800; display:;">
                         Academic Year:
           </label>
               <select class="form-control" name="getSY" id="sel1" onchange="showcont(this.value)">
                      <?php
	                          echo $resultSY;	
	                     ?>
                 </select> 

     
       
       <div id="cont_appear" class="form-group" style="display:none;">
             <label for="sel1" style="font-size: 20px; font-weight: 700; color: #800;">Semester:</label>
                  <div id="acad_sem">
                      <select class="form-control" name="getSEM" id="sel2">
                      </select> 
                    </div>
        </div>

          <div id="cont_appear1" class="form-group" style="display:none;">
             <label for="sel1" style="font-size: 20px; font-weight: 700; color: #800;">Evaluation:</label>
                  <div id="acad_sem1">
                      <select class="form-control" name="getEval" id="sel2">
                      <?php
	                          echo $resultEval;	
	                     ?>
                      </select> 
                    </div>
        </div>
         
           
        <button id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; margin-top:20px; width:100px; display:none;	" name="submit" id="submitD" type="submit">Select</button>
         <br> <button id="btn_appear1" class="btn btn-primary" onclick="printDiv('printMe')">PRINT RESULT</button>
       </div>
      </div>

      </form>

 <div id="hidden">
<div id='printMe'>
         <?php echo $results_eval; ?>

</div>
</div>




      







         </div>

 
          </div>
        </div>
      </div>
      <!-- Row End--> 
   

	<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>


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
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Administrator/getSEM?q="+str, true);
  xhttp.send();
  cont_appear.style.display="block";
  cont_appear1.style.display="block";		
  btn_appear.style.display="block";	
}
</script>