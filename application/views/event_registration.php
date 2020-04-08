
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
        
	<div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Events</div>
          
</div><!--HEADER--!-->
        
<div class="col-md-12" id="ContentContainer"><!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:50px; margin-bottom:10px; height:500px; overflow-y:auto;">
			 <?php echo $msg ?>
            <div class="form-group" style="margin-top:30px;">
            <form method="post" action="event_registration">
  				<label for="event">Event Name:</label>
 				<input type="text" class="form-control" id="event" name="event">
                <label for="date">Date:</label>
 				<input type="date" class="form-control" name="date">
                <label for="loc">Location:</label>
 				<input type="text" class="form-control" id="loc" name="loc">
                
                <label for="dept">Department:</label>
 				<select class="form-control" id="dept" name="dept">
                    <option>All</option>
                    <option>SIHTM</option>
                    <option>SASE</option>
                    <option>SHSP</option>
                    <option>SBCS</option>
                </select>
                
                <label for="course">Description:</label>
 				<input type="text" class="form-control" id="course" name="desc">
     
          <button class="btn btn-success" style="margin:auto; margin-bottom:10px; margin-top:20px;" name="submit" type="submit">Submit</button>
        
            </form>
			</div>
            
         
</div>  
</div><!--BODY--!-->
