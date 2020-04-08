
<style>
.acad_year{
  font-weight: 700;
  font-size: 20px;

}
.acad_label{
  color: green;
}

.sem{
   font-weight: 700;
  font-size: 20px;
  text-align: right;
}

#no_evaluator{
    font-weight: 700;
  font-size: 20px;
}

.result_label{
   color: red;
}

.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #800;
    font-size: 16px;
    text-align: center;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #800;
    font-size: 16px;
    text-align: center;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #800;
    font-size: 16px;
    text-align: center;
}
.number{
  color: #800;
  font-weight: 700;
}




</style>
<!--content--!-->









<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Results</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer">
<!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:20px; margin-bottom:30px; min-width:100%; overflow:auto;">
 
<form action="<?php echo site_url();?>index.php/Administrator/hr_student_results" method="post" style="margin-top:30px;">
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

          
         
           
        <button id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; margin-top:20px; width:100px; display:none;	" name="submit" id="submitD" type="submit">Select</button>
       </div>
      </div>

      </form>


<div id="hidden">


 <table id="myTable" class="table table-striped table-bordered">
            <thead class="red lighten-1">
              <tr>
                <th>#</th>
                <th>Faculty Name</th>
                <th>Number of Evaluators</th>
                <th></th>
              </tr>
            </thead>
    		<tbody>
            
        <?php 
	
  echo $getResult

?> 

            
            </tbody>
            </table>
 
          </div>
        </div>
      </div>
      </div>
      </div>
      <!-- Row End--> 



<!-- Central Modal Large Info-->
<div class="modal fade" id="EvaluationResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Evaluation Result</p>
                      <button id="btnPrint" class="btn btn-primary pull-right">PRINT RESULT</button>
                        
                    </div>
                  
      
                     
                    <!--Body-->
                 
                   <div class="modal-body"  id="get_evaluationresult_modal_content">
               
                   </div>
                    </div>
                  
                    <!--Footer-->
                 
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Large Info--> 





         <!-- Central Modal Large Info-->
         <div class="modal fade" id="Evaluationcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Evaluation Comments</p>

                    </div>

                    <!--Body-->
                   <div class="modal-body"  id="get_evaluationcomment_modal_content">
                   
 
                    </div>
                    <!--Footer-->
                 
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Large Info-->









   

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

    </script>



    <script>
function EvaluationresultModal(str) {
  var xhttp;
  var w = document.getElementById("Sy").value;
  var e = document.getElementById("Sm").value;

  $('#evaluationresult_edit_button').val(str);
    if (str == "") {
    document.getElementById("get_evaluationresult_modal_content").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("get_evaluationresult_modal_content").innerHTML = this.responseText;
	    }
  };
   xhttp.open("GET", "<?php echo base_url(); ?>index.php/Administrator/evalatuationresult_modal?q="+str+"&w="+w+"&e="+e, true);
  xhttp.send();

  }
</script>


<script>
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>



<script>
function EvaluationcommentModal(str) {
  var xhttp;
  var w = document.getElementById("Sy").value;
  var e = document.getElementById("Sm").value;
  $('#evaluationcomments_edit_button').val(str);
    if (str == "") {
    document.getElementById("get_evaluationcomment_modal_content").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("get_evaluationcomment_modal_content").innerHTML = this.responseText;
	    }
  };
   xhttp.open("GET", "<?php echo base_url(); ?>index.php/Administrator/evalatuationcomment_modal?q="+str+"&w="+w+"&e="+e,true);
  xhttp.send();

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
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Administrator/getSEM1?q="+str, true);
  xhttp.send();
  cont_appear.style.display="block";	
  btn_appear.style.display="block";	
}
</script>