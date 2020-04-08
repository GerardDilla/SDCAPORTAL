<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
        
	<div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Accounts</div>
          
</div><!--HEADER--!-->
        
<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
	<div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; height:500px; overflow-y:auto;">
			
            <div class="form-group" style="margin-top:30px;">
            
            <form method="post" action="account_search">
  				<label for="search">Student Number/Email:</label>
 				 <input type="text" class="form-control" id="search" name="query">
                 
                 
                 
            <button class="btn" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Search</button>
            <form action="admin_account_list" method="post">
            <button class="btn" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Refresh</button></form>
            </form>
            
			</div>
            
            
            
            
	</div>
</div><!--BODY--!-->
	