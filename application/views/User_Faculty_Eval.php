<?php
$modalevaldata = $this->session->userdata('evalmodal');

?>
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
  <div class="container-fluid">
    <div class="row" style="margin-top:auto; margin-bottom:auto;">
    
      <div class="col-md-12"><!--HEADER--!-->
          <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-education" > </span> Faculty Evaluation
          </div>
      </div>
      <!--HEADER--!-->
      
      
          
         
         
        <!--Content--!--> 
          
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
  		
        <!--Content--!-->
          <?php echo $geti ?>
        <!--Content--!-->
        
        </div>
        </div><!--BODY--!-->
        </div>
     
           
         <?php echo $modalevaldata;  
		 $this->session->unset_userdata('evalmodal');
		 ?>
         
   
      
<script type="text/javascript">
    $(window).on('load',function(){
        $('#Eval_modal').modal('show');
    });
</script>
 
     

<!--BODY--!-->