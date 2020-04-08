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
      
          <?php
  
	 
			  echo $awards;
			 
		
		  ?>
       
    </div>
  </div>
</div>
<!--BODY--!--> 

<!-- The Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="100%" frameborder="0" style="border:0; text-align:center" src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY
    &q=Space+Needle,Seattle+WA" allowfullscreen name="imagemodal" align="middle"> 
        </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

$('#myModal').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css({width:'auto', 'max-width':'100%', height:'auto','max-height':'100%'});
});

</script>