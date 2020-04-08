<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
        
<div class="row content-title">
<span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-th-list"></span>
 Curriculum
</div>
          
</div><!--HEADER--!-->
        
<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; max-height:auto; overflow-y:auto;">
  		
  		<form action="#" method="post" style="margin-top:30px;">
    	<div class="form-group">
      	<label for="get_c">Course:</label>
      	<select class="form-control" name="get_c" id="get_c" onchange="show_c(this.value)">
     	 <option style="color:#CCC">Select Course:</option>
      
     	 <?php
	  
			echo $Cur_list;
		  ?>
      
     	 </select> 
         </div>
         </form>
         
         <div id="curriculum" style="max-height:400px; overflow-y:auto;">
         
         </div>
         
         
     </div>    
    </div>
           
</div>
</div><!--BODY--!-->

<script>

 function printpage(){
				window.print();
				}

function show_c(str) {
  var xhttp;
 
  if (str == "") {
    document.getElementById("curriculum").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("curriculum").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/get_curriculum?q="+str, true);
  xhttp.send();
  
  
}
</script>
