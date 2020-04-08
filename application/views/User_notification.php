

<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
        <div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-bell"></span> Notifications</div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
        
        
       
		
  		<!--Content--!-->
        
        
        
        
        <?php 
		
		echo $Notif_list;
		
		?>
        
        <!--/Content--!-->
        
       </div>
        
        
       
        </div><!--BODY--!-->
        
 
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